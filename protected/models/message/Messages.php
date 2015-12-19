<?php

/**
 * This is the model class for table "messages".
 *
 * The followings are the available columns in table 'messages':
 * @property integer $id
 * @property string $create_date
 * @property integer $sender
 * @property integer $type
 * @property integer $draft
 * @property integer $chained_message_id
 * @property integer $original_message_id
 *
 * The followings are the available model relations:
 * @property MessageReceiver[] $messageReceivers
 * @property MessageReceiver[] $messageReceivers1
 * @property StudentReg $sender0
 * @property UserMessages[] $userMessages
 */
class Messages extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'messages';
    }

    public function __construct($scenario, $sender, $type, $chained = null, $original = null)
    {
        parent::__construct($scenario);
        $this->sender = (int) $sender;
        $this->type = (int) $type;
        $this->draft = 1;
        $this->chained_message_id = $chained;
        $this->original_message_id = $original;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sender, type, draft', 'required'),
            array('sender, type, draft, chained_message_id, original_message_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
              array('id, create_date, sender, type, draft, chained_message_id, original_message_id', 'safe', 'on' => 'search'),
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
            'messageReceivers' => array(self::HAS_MANY, 'MessageReceiver', 'reply'),
            'messageReceivers1' => array(self::HAS_MANY, 'MessageReceiver', 'forward'),
//            'type0' => array(self::BELONGS_TO, 'MessagesType', 'type'),
            'sender0' => array(self::BELONGS_TO, 'User', 'sender'),
            'userMessages' => array(self::HAS_MANY, 'UserMessages', 'id_message'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'create_date' => 'Create Date',
            'sender' => 'Sender',
            'type' => 'Type',
            'draft' => 'Draft',
            'chained_message_id' => 'Chained Message',
            'original_message_id' => 'Original Message',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('sender', $this->sender);
        $criteria->compare('type', $this->type);
        $criteria->compare('draft', $this->draft);
        $criteria->compare('chained_message_id', $this->chained_message_id);
        $criteria->compare('original_message_id', $this->original_message_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Messages the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}