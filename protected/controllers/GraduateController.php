<?php

class GraduateController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'UpdateAjaxFilter'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Graduate;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Graduate'])) {
            $model->attributes = $_POST['Graduate'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Graduate'])) {
            $model->attributes = $_POST['Graduate'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex($selector='')
    {

        $dataProvider = new CActiveDataProvider('Graduate', array(
            'criteria'=>array(
                'condition'=>'published=1',
                'with'=>['user','courses','modules']
            ),
            'sort' => array(
                'defaultOrder' => 'graduate_date DESC',
            ),
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
        if (!Yii::app()->session['lg'] || Yii::app()->session['lg']=='ua')
            $lang = 'uk';
        else $lang = Yii::app()->session['lg'];

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'lang'=>$lang
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Graduate('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Graduate']))
            $model->attributes = $_GET['Graduate'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Graduate the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Graduate::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Graduate $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'graduate-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUpdateAjaxFilter()
    {
        $selector = $_GET["selector"];
        $string = $_GET['input'];

        $dataProvider = Graduate::getGraduateBySelector($selector, $string);

        if (!Yii::app()->session['lg'] || Yii::app()->session['lg']=='ua') {
            $lang = 'uk';
        }else{
            $lang = Yii::app()->session['lg'];
        }

        $this->renderPartial('_graduatesList', array('dataProvider' => $dataProvider, 'lang' => $lang));
    }
    /**
     * Render graduate diploma.
     * @param int $graduateId ID graduate
     * @param int $type type of diploma 1 - course 2 - module
     */
    public function actionRenderDiploma($graduateId, $type){
        $graduate = null;
        switch ($type){
            case 1:
                $diplomeType = 'course';
                $graduate = RatingUserCourse::model()->with(['idUser','idCourse'])->findByPk($graduateId);
                break;
            case 2:
                $diplomeType = 'module';
                $graduate = RatingUserModule::model()->with(['idUser','idModule'])->findByPk($graduateId);
                break;
            default:
                throw new CHttpException(400, 'Некоректний запит');
                break;
        }
        if ($graduate){
            $graduateUser = Graduate::model()->find('id_user=:user',['user'=>$graduate->id_user]);
            return $this->renderPartial('_diplomaIntita', ['model'=>$graduate, 'type'=>$diplomeType,'name'=>"{$graduateUser->first_name_en} {$graduateUser->last_name_en}"]);
        }
        else throw new CHttpException(404,'Випускника не знайдено');
    }

    /**
     * @throws CException
     */
    public function actionShowMoreGraduateAjaxFilter()
    {
        $pageSize = $_GET['size'];

        $dataProvider = Graduate::showMoreGraduate($pageSize);

        if (!Yii::app()->session['lg'] || Yii::app()->session['lg']=='ua') {
            $lang = 'uk';
        }else{
            $lang = Yii::app()->session['lg'];
        }

        $this->renderPartial('_graduatesList', array(
            'dataProvider' => $dataProvider,
            'lang' => $lang
            ));
    }

    public function actionApiGetAllAlumniData()
    {
        $graduate = new Graduate();
        $alumni = $graduate->alumniDataAPI();
        echo CJSON::encode($alumni);
    }

}