<?php
/* @var $model Course
 * @var $scenario string
 */
?>
<br>
<div class="formMargin">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'title_ru'); ?>
        <?php echo $form->textField($model, 'title_ru', array('size' => 45, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title_ru'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'for_whom_ru'); ?>
        <?php echo $form->textArea($model, 'for_whom_ru', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'for_whom_ru'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'what_you_learn_ru'); ?>
        <?php echo $form->textArea($model, 'what_you_learn_ru', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'what_you_learn_ru'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'what_you_get_ru'); ?>
        <?php echo $form->textArea($model, 'what_you_get_ru', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'what_you_get_ru'); ?>
    </div>
</div>