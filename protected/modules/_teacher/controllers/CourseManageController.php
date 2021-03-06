<?php

class CourseManageController extends TeacherCabinetController
{
    /**
     * @return array action filters
     */
    public function init()
    {
        parent::init();
    }

    public function hasRole()
    {
        $allowedViewActions = ['coursesList', 'view', 'getCoursesList'];
        return Yii::app()->user->model->isContentManager()
            || (Yii::app()->user->model->isAdmin() && !in_array(Yii::app()->controller->action->id, ['coursesList', 'getCoursesList'])) ||
            (Yii::app()->user->model->isDirector() || Yii::app()->user->model->isSuperAdmin() && in_array(Yii::app()->controller->action->id, $allowedViewActions));
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionView($id)
    {
        $modules = CourseModules::model()->with('moduleInCourse')->findAllByAttributes(array('id_course' => $id), array('order' => '`order` ASC'));
        $model = $this->loadModel($id);
        $linkedCourses = $model->linkedCourses();

        $this->renderPartial('view', array(
            'model' => $model,
            'modules' => $modules,
            'linkedCourses' => $linkedCourses
        ), false, true);
    }

    public function actionCreate()
    {
        $model = new Course;

        $this->performAjaxValidation($model);

        if (isset($_POST['Course'])) {

            if (!empty($_FILES['Course']['tmp_name']['course_img'])) {
                $fileInfo = new SplFileInfo($_FILES['Course']['name']['course_img']);
                $extension = $fileInfo->getExtension();
                $filename = uniqid() . '.' . $extension;

                $_POST['Course']['course_img'] = $filename;
                $model->logo = $_FILES['Course'];
                $model->logo['name']['course_img'] = $filename;
            }
            $model->attributes = $_POST['Course'];
            if ($model->alias) $model->alias = str_replace(" ", "_", $model->alias);
            if ($model->save()) {
                if ($model->course_img == Null) {
                    $thisModel = new Course;
                    $thisModel->updateByPk($model->course_ID, array('course_img' => 'courseImage.png'));
                }
                if (!empty($_POST['Course']['course_img'])) {
                    ImageHelper::uploadAndResizeImg(
                        Yii::getPathOfAlias('webroot') . "/images/course/" . $filename,
                        Yii::getPathOfAlias('webroot') . "/images/course/share/shareCourseImg_" . $model->course_ID . '.' . $fileInfo->getExtension(),
                        210
                    );
                }
                echo 'Курс успішно створено!';
                Yii::app()->end();
            } else {
                echo 'Курс не вдалося створити. Перевірте вхідні дані або зверніться до адміністратора.';
                Yii::app()->end();
            }
        }

        $this->renderPartial('create', array(
            'model' => $model,
        ), false, true);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $modules = CourseModules::model()->with('moduleInCourse')->findAllByAttributes(array('id_course' => $id), array('order' => '`order` ASC'));

        $model = $this->loadModel($id);
        Yii::app()->user->model->hasAccessToOrganizationModel($model);
        $this->performAjaxValidation($model);

        if (isset($_POST['Course'])) {
            $model->oldLogo = $model->course_img;
            if (!empty($_FILES['Course']['tmp_name']['course_img'])) {
                $fileInfo = new SplFileInfo($_FILES['Course']['name']['course_img']);
                $extension = $fileInfo->getExtension();
                $filename = uniqid() . '.' . $extension;

                $_POST['Course']['course_img'] = $filename;
                $model->logo = $_FILES['Course'];
                $model->logo['name']['course_img'] = $filename;
            }
            $model->attributes = $_POST['Course'];
            if ($model->alias) $model->alias = str_replace(" ", "_", $model->alias);
            if (!$model->validate()) {
                Yii::app()->end();
            }
            if ($model->save()) {
                if (!empty($_POST['Course']['course_img'])) {
                    ImageHelper::uploadAndResizeImg(
                        Yii::getPathOfAlias('webroot') . "/images/course/" . $filename,
                        Yii::getPathOfAlias('webroot') . "/images/course/share/shareCourseImg_" . $id . '.' . $fileInfo->getExtension(),
                        210
                    );
                }
                echo 'Курс успішно оновлено!';
                Yii::app()->end();
            } else {
                echo 'Інформацію про курс не вдалося оновити. Перевірте вхідні дані або зверніться до адміністратора.';
                Yii::app()->end();
            }

        }
        $linkedCourses = $model->linkedCourses();
        if (!$linkedCourses) {
            $linkedCourses = new CourseLanguages();
        }

        $this->renderPartial('update', array(
            'model' => $model,
            'modules' => $modules,
            'linkedCourses' => $linkedCourses
        ), false, true);
    }

    public function actionChangeStatus($id)
    {
        $model = Course::model()->findByPk($id);
        Yii::app()->user->model->hasAccessToOrganizationModel($model);
        if ($model->changeStatus())
            return "success";
        else {
            return "error";
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->renderPartial('index', array(), false, true);
    }

    public function actionCoursesList()
    {
        $this->renderPartial('index', array('organization' => false), false, true);
    }

    public function actionOrganizationCoursesList()
    {
        $this->renderPartial('index', array('organization' => true), false, true);
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Course the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Course::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionAddExistModule($id)
    {

        $course = Course::model()->findByPk($id);

        $this->renderPartial('addExistModule', array(
            'course' => $course,
        ), false, true);
    }

    public function actionAddModuleToCourse()
    {

        $moduleId = Yii::app()->request->getPost('moduleId');
        $courseId = Yii::app()->request->getPost('courseId');

        if (CourseModules::addNewRecord($moduleId, $courseId)) {
            echo "success";
        } else {
            echo "error";
        }
    }

    public function actionSchema($idCourse)
    {
        $lessonsCount = Course::getLessonsCount($idCourse);
        $course = Course::model()->findByPk($idCourse);
        Yii::app()->user->model->hasAccessToOrganizationModel($course);
        $modules = Course::getCourseModulesSchema($idCourse);
        if (count($modules) <= 0) {
            $this->render('schemaError');
        }
        $tableCells = Course::getTableCells($modules, $idCourse);
        $courseDurationInMonths = Course::getCourseDuration($tableCells) + 5;

        $this->renderPartial('_schema', array(
            'modules' => $modules,
            'idCourse' => $idCourse,
            'tableCells' => $tableCells,
            'courseDuration' => $courseDurationInMonths,
            'courseForTemplate' => $course,
            'lessonsCount' => $lessonsCount,
            'save' => false
        ), false, true);
    }

    public function actionSaveSchema($idCourse)
    {
        $lessonsCount = Course::getLessonsCount($idCourse);
        $course = Course::model()->findByPk($idCourse);
        Yii::app()->user->model->hasAccessToOrganizationModel($course);
        $modules = Course::getCourseModulesSchema($idCourse);
        $tableCells = Course::getTableCells($modules, $idCourse);
        $courseDurationInMonths = Course::getCourseDuration($tableCells) + 5;
        $lang = $_SESSION['lg'];
        $lg = ['ua', 'ru', 'en'];
        for ($i = 0; $i < 3; $i++) {
            Yii::app()->session['lg'] = $lg[$i];
            $messages = Translate::model()->getMessagesForSchemabyLang($lg[$i]);

            $schema = $this->renderPartial('_schema', array(
                'modules' => $modules,
                'idCourse' => $idCourse,
                'tableCells' => $tableCells,
                'courseDuration' => $courseDurationInMonths,
                'messages' => $messages,
                'courseForTemplate' => $course,
                'lessonsCount' => $lessonsCount,
                'save' => true
            ), true);
            $name = 'schema_course_' . $idCourse . '_' . $lg[$i] . '.html';
            $file = StaticFilesHelper::pathToCourseSchema($name);
            file_put_contents($file, $schema);
        }
        Yii::app()->session['lg'] = $lang;

        echo "success";
    }

    public function actionGenerateSchema($id)
    {
        $modules = Course::getCourseModulesSchema($id);
        $tableCells = Course::getTableCells($modules, $id);
        $courseDurationInMonths = Course::getCourseDuration($tableCells) + 5;
        $lang = $_SESSION['lg'];
        $lg = ['ua', 'ru', 'en'];
        for ($i = 0; $i < 3; $i++) {
            Yii::app()->session['lg'] = $lg[$i];
            $messages = Translate::model()->getMessagesForSchemabyLang($lg[$i]);

            $schema = $this->renderPartial('_schema', array(
                'modules' => $modules,
                'idCourse' => $id,
                'tableCells' => $tableCells,
                'courseDuration' => $courseDurationInMonths,
                'messages' => $messages,
                'save' => true
            ), true);
            $name = 'schema_course_' . $id . '_' . $lg[$i] . '.html';
            $file = StaticFilesHelper::pathToCourseSchema($name);
            file_put_contents($file, $schema);
        }
        Yii::app()->session['lg'] = $lang;
        $this->redirect(Yii::app()->createUrl('course/schema', array('id' => $id)));
    }

    public function actionGetCoursesList()
    {
        $adapter = new NgTableAdapter('Course', $_GET);
        echo json_encode($adapter->getData());
    }

    public function actionGetOrganizationCoursesList()
    {
        $adapter = new NgTableAdapter('Course', $_GET);
        $criteria = new CDbCriteria();
        $criteria->condition = 't.id_organization=' . Yii::app()->user->model->getCurrentOrganization()->id;
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }

    public function actionModulesByQuery($query, $course)
    {
        if ($query) {
            $modules = Module::modulesNotInDefinedCourse($query, $course);
            echo $modules;
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionAddLinkedCourse($course, $lang)
    {
        $courseModel = Course::model()->findByPk($course);
        Yii::app()->user->model->hasAccessToOrganizationModel($courseModel);
        $currentCourseLang = $courseModel->language;
        $this->renderPartial('_addLinkedCourse', array(
            'course' => $course,
            'lang' => $lang,
            'currentCourseLang' => $currentCourseLang
        ), false, true);
    }

    public function actionCoursesByQueryAndLang($query, $lang, $currentCourseLang)
    {
        if ($query && $lang && $currentCourseLang) {
            echo Course::coursesByQueryAndLang($query, $lang, $currentCourseLang);
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionChangeLinkedCourses()
    {
        $linkedId = Yii::app()->request->getPost("linkedCourse", 0);
        $courseId = Yii::app()->request->getPost("course", 0);
        $lang = Yii::app()->request->getPost("lang", '');

        $course = Course::model()->findByPk($courseId);
        $linkedCourse = Course::model()->findByPk($linkedId);
        Yii::app()->user->model->hasAccessToOrganizationModel($course);
        Yii::app()->user->model->hasAccessToOrganizationModel($linkedCourse);

        $currentCourseLangModel = CourseLanguages::model()->findByAttributes(array('lang_' . $course->language => $course->course_ID));
        $linkedCourseLangModel = CourseLanguages::model()->findByAttributes(array('lang_' . $linkedCourse->language => $linkedCourse->course_ID));

        if ($course && $linkedCourse) {
            if ($currentCourseLangModel && !$linkedCourseLangModel) {
                $langParam = "lang_" . $lang;
                $model = $currentCourseLangModel;
                $model->$langParam = $linkedCourse->course_ID;
            } else if (!$currentCourseLangModel && $linkedCourseLangModel) {
                $langParam = "lang_" . $course->language;
                $model = $linkedCourseLangModel;
                $model->$langParam = $course->course_ID;
            } else if (!$currentCourseLangModel && !$linkedCourseLangModel) {
                $model = new CourseLanguages();
                $param = 'lang_' . $course->language;
                $model->$param = $course->course_ID;
                $langParam = "lang_" . $lang;
                $model->$langParam = $linkedCourse->course_ID;
            } else {
                echo 'Не можна приєднати курс, який має зв\'язки з іншими курсами, котрі відрізняються від зв\'язків даного курсу';
                Yii::app()->end();
            }

            if ($model->save()) {
                echo "Операцію успішно виконано.";
                Yii::app()->end();
            } else {
                echo "Операцію не вдалося виконати. Зверніться до адміністратора " . Config::getAdminEmail();
                Yii::app()->end();
            }
        } else {
            echo "Неправильно введені дані.";
        }

    }

    public function actionDeleteLinkedCourse()
    {
        $id = Yii::app()->request->getPost("id", 0);
        $lang = Yii::app()->request->getPost("lang", "");
        $model = CourseLanguages::model()->findByPk($id);

        if ($model) {
            if ($model->cancelLinkedCourse($lang)) {
                echo "Операцію успішно виконано.";
                Yii::app()->end();
            } else {
                echo "Операцію не вдалося виконати. Зверніться до адміністратора " . Config::getAdminEmail();
                Yii::app()->end();
            }
        } else {
            echo "Неправильний запит. Зверніться до адміністратора " . Config::getAdminEmail();
            Yii::app()->end();
        }
    }
}