<?php

/**
 * This is the model class for table "course_modules".
 *
 * The followings are the available columns in table 'course_modules':
 * @property integer $id_course
 * @property integer $id_module
 * @property integer $order
 * @property integer $mandatory_modules
 *
 * The followings are the available model relations:
 * @property Course $idCourse
 * @property Module $idModule
 */
class CourseModules extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course_modules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_course, id_module, order', 'required'),
			array('id_course, id_module, order, mandatory_modules', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('id_course, id_module, order, mandatory_modules', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'moduleInCourse' => array(self::HAS_ONE, 'Module', array('module_ID' => 'id_module')),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_course' => 'Id Course',
			'id_module' => 'Id Module',
            'mandatory_modules' => 'Попередні модулі(обов`язкові)',
			'order' => 'Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($id)
	{

		$criteria=new CDbCriteria;

        $criteria->addCondition('id_course='.$id);

		$criteria->compare('id_course',$this->id_course);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('order',$this->order);
        $criteria->compare('mandatory_modules',$this->mandatory_modules);
        $criteria->with = array('moduleInCourse');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>false,
            'sort'=>array(
                'defaultOrder'=>array(
                    'order'=>CSort::SORT_ASC,
                )
            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CourseModules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function primaryKey()
    {
        return array('id_course', 'id_module');
    }

    public static function addNewRecord($idModule, $idCourse){
        $model = new CourseModules();

        $model->id_course = $idCourse;
        $model->id_module = $idModule;

        $model->order = CourseModules::getLastModuleOrder($idCourse) + 1;

        return $model->save();
    }

    public static function getLastModuleOrder($idCourse){
        $lastOrder = Yii::app()->db
            ->createCommand("SELECT MAX(`order`) FROM course_modules where id_course=".$idCourse)
            ->queryScalar();

        return $lastOrder;
    }

    public static function getPrevModule($idCourse, $order){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_module, `order`';
        $criteria->condition = 'id_course='.$idCourse.' and `order`<'.$order;
        $criteria->order = '`order` DESC';
        $criteria->limit = 1;

        $result = CourseModules::model()->find($criteria)->id_module;

        return $result;
    }

    public static function getNextModule($idCourse, $order){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_module, `order`';
        $criteria->condition = 'id_course='.$idCourse.' and `order`>'.$order;
        $criteria->order = '`order` ASC';
        $criteria->limit = 1;

        $result = CourseModules::model()->find($criteria)->id_module;

        return $result;
    }

    public static function getCourseModulesSchema($idCourse){
        $criteria =  new CDbCriteria();
        $criteria->select = '*';
        $criteria->order = '`mandatory_modules` DESC';
        $criteria->condition = 'id_course='.$idCourse;
        $criteria->toArray();

        $modules = CourseModules::model()->findAll($criteria);

        //$modules = CourseModules::sortByModuleDuration($modules);
        return $modules;
    }

    public static function sortByModuleDuration($modules)
    {
        $count = count($modules);
        $result = [];
        $tempArray = [];
        $currentMandatory = $modules[$count-1]['mandatory_modules'];
        for($i = $count - 1; $i > 0; $i--){
            if ($modules[$i]['mandatory_modules'] == $currentMandatory){
                array_push($tempArray, $modules[$i]);
            } else {
                array_push($result, CourseModules::sortByDuration($tempArray, 0, count($tempArray) - 1));
                $tempArray = [];
               $currentMandatory -= 1;
            }
        }
        return $modules;//$result;
    }

    public static function sortByDuration($tempArray, $first, $last){
        $i = $first;
        $j = $last;
        $medium = (integer)(($first + $last)/2);
        $x = $tempArray[$medium];
        do {
            while ($tempArray[$i] < $x) $i++;
            while ($tempArray[$j] > $x) $j--;

            if($i <= $j) {
                if ($i < $j)
                    CourseModules::swapModules($tempArray[$i], $tempArray[$j]);
            $i++;
            $j--;
        }
        } while ($i <= $j);
        if ($i < $last)
            CourseModules::sortByDuration($tempArray, $i, $last);
        if ($first < $j)
            CourseModules::sortByDuration($tempArray, $first, $j);
        return $tempArray;
    }

    public static function swapModules($tempArrayFirst, $tempArrayLast){

    }

    public static function getTableCells($modules, $idCourse){
        $cells = [];
        for ($i = 0, $count = count($modules); $i < $count; $i++){
                $cells[$i]['idModule'] = $modules[$i]['id_module'];
                $start = CourseModules::startMonth($idCourse, $modules[$i]['id_module']);
                $duration = CourseModules::getModuleDurationMonths($modules[$i]['id_module']);
                $end = $start + $duration;
                for ($j = 0; $j < $start; $j++) {
                    $cells[$i][$j] = 0;
                }
                for ($k = $start; $k < $end; $k++) {
                    if ($end - $k > 1) {
                        $cells[$i][$k] = 8;
                    } else {
                        $cells[$i][$k] = fmod(LectureHelper::getLessonsCount($modules[$i]['id_module']), 8);
                    }
                }

        }
        return $cells;
    }

    public static function startMonth($idCourse, $idModule){
        $mandatory_module = CourseModules::model()->findByAttributes(array(
            'id_course' => $idCourse,
            'id_module' => $idModule
        ))->mandatory_modules;
        if ($mandatory_module == 0){
            return 0;
        } else {
            return CourseModules::startMonth($idCourse, $mandatory_module) +
            CourseModules::getModuleDurationMonths($mandatory_module);
        }
    }

    public static function getModuleDurationMonths($idModule){
        $lectureHoursInMonth = 8;//TO DO: count from module data

        $lectureCount = LectureHelper::getLessonsCount($idModule);
        return ceil($lectureCount/$lectureHoursInMonth);
    }

    public static function getCourseDuration($tableCells){
        $count = count($tableCells);
        $arr = [];
        for ($i = 0; $i < $count; $i++){
            $arr[$i] = count($tableCells[$i]) - 2;
        }
        return max($arr) + 1;
    }
}
