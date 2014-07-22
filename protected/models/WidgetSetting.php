<?php

/**
 * This is the model class for table "widget_setting".
 *
 * The followings are the available columns in table 'widget_setting':
 * @property integer $id
 * @property integer $widget_id
 * @property string $type
 * @property string $setting
 * @property string $value
 * @property string $data_type
 *
 * The followings are the available model relations:
 * @property Widget $widget
 */
class WidgetSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'widget_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('widget_id, type, setting, value, data_type', 'required'),
			array('widget_id', 'numerical', 'integerOnly'=>true),
			array('type, setting, data_type', 'length', 'max'=>64),
			array('value', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, widget_id, type, setting, value, data_type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'widget' => array(self::BELONGS_TO, 'Widget', 'widget_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'widget_id' => 'Widget',
			'type' => 'Type',
			'setting' => 'Setting',
			'value' => 'Value',
			'data_type' => 'Data Type',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('widget_id',$this->widget_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('setting',$this->setting,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('data_type',$this->data_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WidgetSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getSettingStruct($widget_id){
		$criteria=new CDbCriteria;
        $criteria->addCondition("widget_id = :widget_id");
		$criteria->params=array(
			':widget_id' => $widget_id,
		);
		$widgetSettings = self::model()->findAll($criteria);

		$settingStruct = array();

		foreach ($widgetSettings as $key => $widgetSetting) {
			$settingStruct[$widgetSetting->setting] = $widgetSetting;
		}
		return $settingStruct;
	}

}
