<?php

class AddressController extends TeacherCabinetController
{
    public function hasRole(){
        return Yii::app()->user->model->isAdmin();
    }

    public function actionIndex()
    {
        $this->renderPartial('index', array(), false, true);
    }

    public function actionGetCountriesList(){
        echo AddressCountry::countriesList();
    }

    public function actionGetCitiesList(){
        echo AddressCity::citiesList();
    }

    public function actionAddCountry(){
        $this->renderPartial('_addCountry', array(), false, true);
    }

    public function actionAddCity(){
        $this->renderPartial('_addCity', array(), false, true);
    }
    
    public function actionEditCity($id){
        $model=AddressCity::model()->findByPk($id);
        $this->renderPartial('_editCity', array('model'=>$model), false, true);
    }
    
    public function actionNewCountry(){
        $titleUa = Yii::app()->request->getPost('titleUa', '');
        $titleRu = Yii::app()->request->getPost('titleRu', '');
        $titleEn = Yii::app()->request->getPost('titleEn', '');
        $geocode = Yii::app()->request->getPost('geocode', '');

        if($titleUa && $titleRu && $titleEn && $geocode){
            if (AddressCountry::newCountry($titleUa, $titleRu, $titleEn, $geocode)){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Неправильно введені дані.";
        }
    }

    public function actionNewCity(){
        $countryId = Yii::app()->request->getPost('country', '');
        $titleUa = Yii::app()->request->getPost('titleUa', '');
        $titleRu = Yii::app()->request->getPost('titleRu', '');
        $titleEn = Yii::app()->request->getPost('titleEn', '');

        $country = AddressCountry::model()->findByPk($countryId);

        if($country && $titleUa && $titleRu && $titleEn){
            if (AddressCity::newCity($country, $titleUa, $titleRu, $titleEn)){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Неправильно введені дані.";
        }
    }

    public function actionUpdateCity(){
        $modelId = Yii::app()->request->getPost('id', '');
        $titleUa = Yii::app()->request->getPost('titleUa', '');
        $titleRu = Yii::app()->request->getPost('titleRu', '');
        $titleEn = Yii::app()->request->getPost('titleEn', '');
        
        if($titleUa && $titleRu && $titleEn){
            $model=AddressCity::model()->findByPk($modelId);
            $model->title_ua=$titleUa;
            $model->title_ru=$titleRu;
            $model->title_en=$titleEn;
            if($model->save()){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Неправильно введені дані.";
        }
    }

    public function actionCountriesByQuery($query){
        echo AddressCountry::countriesByQuery($query);
    }
}