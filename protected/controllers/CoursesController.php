<?php
class CoursesController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($selector = 'all')
    {
        $criteria = Course::getCriteriaBySelector($selector);
        $dataProvider = Course::getCoursesByLevel($criteria);

        $coursesLang = CourseLanguages::getCoursesByLang($criteria);

        $total = count(Course::model()->findAllByAttributes(array('cancelled' => 0)));
        $totalSelector = count($coursesLang);
        $count1 = round($totalSelector/2);
        $count2 = $totalSelector - $count1;

        $this->render('index', array(
            'coursesLangs'=>$coursesLang,
            'dataProvider' => $dataProvider,
            'total' => $total,
            'count1' => $count1,
            'count2' => $count2,
        ));
    }
}