<?php

/**
 * This is the model class for table "user_messages".
 *
 * The followings are the available columns in table 'user_messages':
 * @property integer $id_message
 * @property string $text
 * @property string $subject
 *
 * The followings are the available model relations:
 * @property StudentReg $sender
 * @property Messages $message0
 */
class UserMessages extends Messages implements IMessage
{
    private $receivers;
    public $message;
    public $mailto;
    public $parent;

    public function build($subject, $text, $receivers, StudentReg $sender, $chained = null, $original = null)
    {
        //create and init parent model
        $this->message = new Messages();
        $this->message->build($sender->id, 1, $chained, $original);

        $this->subject = $subject;
        $this->text = $text;
        $this->receivers = $receivers;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user_messages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_message', 'required'),
            array('id_message', 'numerical', 'integerOnly' => true),
            array('text', 'length', 'max' => 255),
            // The following rule is used by search().
            array('id_message, text, subject', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'message0' => array(self::BELONGS_TO, 'Messages', 'id_message'),
            'sender' => array(self::BELONGS_TO, 'StudentReg', 'sender'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_message' => 'Id Message',
            'text' => 'Text',
            'subject' => 'Subject',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id_message', $this->id_message, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('subject', $this->subject, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function primaryKey()
    {
        return 'id_message';
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserMessages the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function create()
    {
        $this->message->save();
        $this->id_message = $this->message->id;
        $this->id_message;

        $this->save();
        return $this;
    }

    public function send(IMailSender $sender)
    {
        //foreach($this->receivers as $receiver){
        if ($this->addReceiver($this->receivers)) {
            $sender->send($this->receivers->email, "Name", $this->subject, $this->text);
        }
        //}

        $this->message->draft = 0;
        $this->message->save();
        return true;
    }

    public function read(StudentReg $receiver)
    {
        if (Yii::app()->db->createCommand()->update('message_receiver', array('read' => date("Y-m-d H:i:s")),
                'id_message=:message and id_receiver=:receiver',
                array(':message' => $this->id_message, ':receiver' => $receiver->id)) == 1
        )
            return true;
        else {
            return false;
        }
    }

    public function deleteMessage(StudentReg $receiver)
    {
        if (Yii::app()->db->createCommand()->update('message_receiver', array('deleted' => date("Y-m-d H:i:s")),
                'id_message=:message and id_receiver=:receiver',
                array(':message' => $this->message()->id, ':receiver' => $receiver->id)) == 1
        )
            return true;
        else {
            return false;
        }
    }

    public function deleteDialog(StudentReg $receiver)
    {
        $dialog = $this->dialog($receiver);
        foreach($dialog as $message){
            if($message->deleteMessage($receiver) == false)
                return false;
        }
        return true;
    }

    public function reply(StudentReg $receiver)
    {
        if (Yii::app()->db->createCommand()->insert('messages_reply', array(
                'id_message' => $this->parent,
                'reply' => $this->message()->id,
            )) == 1
        )
            return true;
        else return false;
    }

    public function forward(StudentReg $receiver)
    {
        if (Yii::app()->db->createCommand()->insert('messages_forward', array(
                'id_message' => $this,
                'forward' => $this->message()->id,
            )) == 1
        )
            return true;
        else return false;
    }

    /**
     * @param $receiverString string, that we got from user message form (formatted as "lastName firstName middleName email")
     * @return StudentReg model for receiver
     */
    public function parseReceiverEmail($receiverString)
    {
        $email = explode(' ', $receiverString);
        return StudentReg::model()->findByAttributes(array('email' => $email[count($email) - 1]));
    }

    public function sender()
    {
        return $this->message->sender;
    }

    public function createDate()
    {
        return $this->message->create_date;
    }

    public function message()
    {
        return $this->message0;
    }

    public function receivers()
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 's';
        $criteria->join = 'LEFT JOIN message_receiver as r ON s.id = r.id_receiver';
        $criteria->addCondition ('r.id_message = '.$this->id_message);

        //return $this->message0->receivers0;
        return StudentReg::model()->findAll($criteria);
    }

    public function receiversString()
    {
        $receivers = $this->receivers();
        $result = '';
        foreach ($receivers as $user) {
            $result .= $user->userName() . ", " . $user->email . "; ";
        }

        return $result;
    }

    public function getIdMessage()
    {
        return $this->id_message;
    }

    public function dialog(StudentReg $receiver)
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'um';
        $criteria->join = 'LEFT JOIN messages as m ON um.id_message = m.id';
        $criteria->join.= ' LEFT JOIN message_receiver as r ON um.id_message = r.id_message';
        $criteria->order = 'm.create_date DESC';
        $criteria->addCondition ('m.sender = '.$this->id.' and r.id_receiver='.$receiver->id, 'OR');
        $criteria->addCondition ('m.sender = '.$receiver->id.' and r.id_receiver='.$this->id, 'OR');

        return UserMessages::model()->findAll($criteria);
    }

    // return true if message read by $receiver (param "read" is NULL)
    public function isRead(StudentReg $receiver)
    {
        $read = Yii::app()->db->createCommand()
            ->select('read')
            ->from('message_receiver')
            ->where('id_message=:message and id_receiver=:receiver',
                array(':message' => $this->id_message, ':receiver' => $receiver->id)
            )->queryRow();

        if ($read["read"])
            return true;
        else return false;
    }

    public function isDeleted(StudentReg $receiver)
    {
        $read = Yii::app()->db->createCommand()
            ->select('deleted')
            ->from('message_receiver')
            ->where('id_message=:message and id_receiver=:receiver',
                array(':message' => $this->id_message, ':receiver' => $receiver->id)
            )->queryRow();

        if ($read["deleted"])
            return true;
        else return false;
    }

    public function replyMessage(){
        $criteria = new CDbCriteria();
        $criteria->alias = 'u';
        $criteria->join = 'LEFT JOIN messages_reply as r ON u.id_message = r.reply';
        $criteria->addCondition('r.id_message = '.$this->id_message);

        return UserMessages::model()->find($criteria);
    }
}
