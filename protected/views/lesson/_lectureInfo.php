<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 09.04.2015
 * Time: 15:27
 */
?>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lessonsStyle.css" />


<div class="lectureImageMain">
        <img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', $lecture->image); ?>">
</div>

<div class="titlesBlock" id="titlesBlock">
        <ul>
            <li>
                <?php echo Yii::t('lecture','0070'); ?>
<span><?php echo $lecture->getCourseInfoById($idCourse)['courseTitle'];?></span>(<?php echo Yii::t('lecture','0071').strtoupper($lecture->getCourseInfoById($idCourse)['courseLang']); ?>)
</li>
<li>
    <?php echo Yii::t('lecture','0072'); ?>
    <span><?php echo $lecture->getModuleInfoById($idCourse)['moduleTitle']; ?></span>
</li>
<li><?php echo Yii::t('lecture','0073')." ".$lecture->order.': ';?>
    <?php
    if (TeacherHelper::isTeacherAuthorModule(Yii::app()->user->getId(),$lecture->idModule)){
        $title = LectureHelper::getTypeTitleParam();
        $this->widget('editable.EditableField', array(
            'type'      => 'text',
            'model'     => $lecture,
            'attribute' => $title,
            'emptytext' => Yii::t('config','0575'),
            'url'       => $this->createUrl('lesson/updateLectureAttribute'),
            'title'     => Yii::t('lecture','0567'),
            'placement' => 'right',
        ));
    }
    else  {?>
    <span><?php echo LectureHelper::getLectureTitle($lecture->id); ?></span>
    <?php }
    ?>
</li>
<li><?php echo Yii::t('lecture','0074'); ?>
    <div id="lectionTypeText">
        <?php
        if (TeacherHelper::isTeacherAuthorModule(Yii::app()->user->getId(),$lecture->idModule)){
            $this->widget('editable.EditableField', array(
                'type'      => 'select',
                'model'     => $lecture,
                'attribute' => 'idType',
                'title'     => Yii::t('lecture','0572'),
                'url'       => $this->createUrl('lesson/updateLectureAttribute'),
                //    'source'    => Editable::source(Status::model()->findAll(), 'status_id', 'status_text'),
                //or you can use plain arrays:
                'source'    => Editable::source(array('1'=> Yii::t('lecture','0568'), '2' => Yii::t('lecture','0569'),'3' => Yii::t('lecture','0570'), '4' => Yii::t('lecture','0571'))),
                'placement' => 'right',
            ));
        }
        else echo $lecture-> getTypeInfo()['text'];
        ?>
    </div>
    <div id="lectionTypeImage"><img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', $lecture-> getTypeInfo()['image']); ?>"></div>
</li>
<li><div id="subTitle"><?php echo Yii::t('lecture','0075'); ?></div>
    <div id="lectureTimeText">
        <?php
        if (TeacherHelper::isTeacherAuthorModule(Yii::app()->user->getId(),$lecture->idModule)){
            $this->widget('editable.EditableField', array(
                'type'      => 'text',
                'model'     => $lecture,
                'attribute' => 'durationInMinutes',
                'emptytext' => Yii::t('config','0575'),
                'url'       => $this->createUrl('lesson/updateLectureAttribute'),
                'title'     => Yii::t('lecture','0573'),
                'placement' => 'right',
            ));
            echo ' '.Yii::t('lecture','0076');
        }
        else echo $lecture->durationInMinutes.' '.Yii::t('lecture','0076'); ?>
    </div>
    <div id="lectureTimeImage"><img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'timeIco.png'); ?>"></div>
</li>
</br>
<li>
    <?php echo '('.$lecture->order.' / '.$lecture->getModuleInfoById($idCourse)['countLessons'].' '.Yii::t('lecture','0574').')'; ?>
</li>
<div id="counter">
    <?php
    for ($i=0; $i<$lecture->order;$i++){ ?>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'ratIco1.png');?>">
    <?php }
    for ($i=0; $i<$lecture->getModuleInfoById($idCourse)['countLessons']-$lecture->order;$i++){ ?>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'ratIco0.png');?>">
    <?php } ?>
    <div id="iconImage">
        <img src="<?php
        if (LectureHelper::isLectureAvailable($user, $lecture->id, false))
        {
            echo StaticFilesHelper::createPath('image', 'lecture', 'medalIco.png');
        } else {
            echo StaticFilesHelper::createPath('image', 'lecture', 'medalIcoFalse.png');
        }
        ?> ">
    </div>
</div>
</ul>

</div>