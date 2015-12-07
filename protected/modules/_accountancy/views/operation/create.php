<?php
/* @var $this OperationController */
/* @var $model Operation */
/* @var $type OperationType*/
/* @var $form CActiveForm */
?>
<h1>Додати проплату</h1>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/operation.css"/>
<div class="mainOperation">
<ul class="operationCreate">
    <li role="presentation" class="operationPanel" ><button onclick="showOperation(0)">Пошук по договору</button></li>
    <li role="presentation" class="operationPanel" ><button onclick="showOperation(1)">Пошук по номеру рахунка</button></li>
    <li role="presentation" class="operationPanel" ><button onclick="showOperation(2)">Пошук по користувачу</button></li>
</ul>
    <div class="findOffer" id="findOffer" >
        <?php echo $this->renderPartial('_operationForm1', array('agreementsList' => ''));?>
    </div>
    <div class="findOperation" id="findOperation">
        <?php echo $this->renderPartial('_operationForm2', array('invoicesList'=>''));?>
    </div>
    <div class="findOperation" id="findUser">
        <?php echo $this->renderPartial('_operationForm3', array('invoicesList'=>''));?>
    </div>

    <!--</div>-->
<br>
<br>
</div>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_accountancy/agreement.js'); ?>"></script>

