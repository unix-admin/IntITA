<?php
class ServiceSchemesRequest extends Request implements IRequest
{
    protected $template = 'accountant'. DIRECTORY_SEPARATOR . '_newSchemesTemplateRequest';
    protected $approveTemplate = 'accountant'. DIRECTORY_SEPARATOR . '_approveSchemesTemplateRequest';
    protected $rejectTemplate = 'accountant'. DIRECTORY_SEPARATOR . '_cancelSchemesTemplateRequest';
    protected $cancelTemplate = 'accountant'. DIRECTORY_SEPARATOR . '_cancelSchemesTemplate';
    protected $requestType = 8;
    private $schema_template;

  public function getTableSchema()
   {
    $table = parent::getTableSchema();

    $table->columns['request_model_id']->isForeignKey = true;
    $table->foreignKeys['request_model_id'] = array('Service', 'service_id');
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    $table->columns['comment']->isForeignKey = true;
    $table->foreignKeys['comment'] = array('PaymentSchemeTemplate', 'id');

    return $table;
   }
  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'service' => array(self::BELONGS_TO, 'Service', ['request_model_id' => 'service_id']),
            'coworkerChecked' => array(self::BELONGS_TO, 'StudentReg', ['action_user'=>'id']),
            'user' => array(self::BELONGS_TO, 'StudentReg', ['request_user'=>'id']),
            'schemesTemplate' => array(self::BELONGS_TO, 'PaymentSchemeTemplate', ['comment'=>'id']),
        );
    }

    public function approve()
    {

        date_default_timezone_set(Config::getServerTimezone());
        $this->action_user = Yii::app()->user->getId();
        $this->action_date = date("Y-m-d H:i:s");
        $this->action = self::STATUS_APPROVE;
        $this->notify($this->approveTemplate,[StudentReg::model()->findByPk($this->request_user)]);
        return $this->save();
    }

    public function title()
    {
        return "Запит на застосування акційної схеми проплат";
    }

    public function service()
    {
        return $this->id_service;
    }

    public function subject()
    {
        return "Запит на застосування акційної схеми проплат";
    }

    public function cancel()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->action_user = Yii::app()->user->getId();
        $this->action_date = date("Y-m-d H:i:s");
        $this->action = self::STATUS_CANCEL;
        if ($this->save()) {
            return "Операцію успішно виконано.";
        } else {
            return "Операцію не вдалося виконати.";
        }
    }

  public function newRequest($requestedModel)
   {
    $this->request_model_id = $requestedModel;
    $this->action = Request::STATUS_NEW;
    if ($this->save()){
     $this->notify($this->template,[$this->service,$this->user,$this->schemesTemplate],true);
    }
    return false;
   }

}