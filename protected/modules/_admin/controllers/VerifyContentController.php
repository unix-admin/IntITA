<?php

class VerifyContentController extends AdminController {

    public function actionIndex(){
        $this->render('index');
    }

    public function actionInitializeDir(){
        if(!file_exists(Yii::app()->basePath . "/../content")){
            mkdir(Yii::app()->basePath . "/../content");
        }
        $this->initializeModules();
        $this->initializeLectures();

        $this->actionIndex();
    }

    public function initializeModules(){
        $modules = Module::model()->findAll();
        foreach($modules as $record){
            if(!file_exists(Yii::app()->basePath . "/../content/module_".$record->module_ID)){
                mkdir(Yii::app()->basePath . "/../content/module_".$record->module_ID);
            }
        }
    }

    public function initializeLectures(){
        $criteria = new CDbCriteria();
        $criteria->addCondition('idModule>0');
        $lectures = Lecture::model()->findAll($criteria);

        foreach($lectures as $record){
            if(!file_exists(Yii::app()->basePath . "/../content/module_".$record->idModule."/lecture_".$record->id)){
                mkdir(Yii::app()->basePath . "/../content/module_".$record->idModule."/lecture_".$record->id);
            }
        }
    }

    public function actionConfirm($id){
        $model = Lecture::model()->findByPk($id);

        if ($model){
            $model->verified = 1;
            $model->save();
            $this->generateLecturePages($model);
        } else {
            throw new CException("Такої лекції немає!");
        }

        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function generateLecturePages(Lecture $model){
        if ($model->isVerified()) {
            $this->redirect(Config::getBaseUrl().'/lesson/saveLectureContent/?idLecture='.$model->id);
        }
        else {
                throw new CException('Лекція не затверджена адміністратором і не може бути збережена! Lecture::generateLectureHtml()');
            }
    }


}