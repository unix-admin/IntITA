<?php
/* @var $course Course*/
?>
<br>
    <a href="<?php echo Yii::app()->createUrl('/_admin/module/index'); ?>">Список модулів</a>
<br>
<div class="page-header">
    <h2>Модуль #<?php echo $id . " " . Module::getModuleName($id); ?></h2>
</div>
<br>
<form action="<?php echo Yii::app()->createUrl('/_admin/module/addMandatoryModule'); ?>"
      onsubmit="return checkMandatory()" method="POST"
      name="add-accessModule">
    <fieldset>
        <div class="col-md-4">
            <legend id="label">Задати попередній модуль у курсі:</legend>
            <div class="form-group">
                Виберіть курс:<br>
                <input type="hidden" value="<?php echo $id; ?>" name="module">
                <select name="course" class="form-control" id="courseList"
                        onchange="selectModule('<?php echo Yii::app()->createUrl('/_admin/module/getModuleByCourse');?>')">
                    <option value="">Виберіть курс</option>
                    <optgroup label="Курси">
                        <?php $courses = Course::generateModuleCoursesList($id);
                        foreach ($courses as $course) {
                            ?>
                            <option value="<?php echo $course->course_ID;?>"><?php echo $course->getTitle();
                            $mandatory = $course->mandatoryModule($id);
                            if ($mandatory != 0) {
                                ?>
                                - попередній модуль
                                #<?php echo Module::getModuleName($mandatory); ?></option>
                            <?php
                            }
                        }
                        ?>
                </select>
            </div>
            <br>
            <br>

            <div class="form-group">
                Попередній модуль:<br>

                <div name="selectModule" style="float:left;">
                    <?php $this->renderPartial('_ajaxModule', array('modules' => '')); ?>
                </div>
            </div>
            <br>
            <br>
            <input class="btn btn-default" type="submit" value="Задати попередній модуль">

        </div>
        <br>
        <br>
</form>

<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'ajaxModule.js'); ?>"></script>
