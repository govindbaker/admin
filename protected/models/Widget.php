<?php

/**
 * This is the model class for table "widget".
 *
 * The followings are the available columns in table 'widget':
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $type
 * @property string $position_x
 * @property string $position_y
 * @property integer $auto_open
 * @property integer $enabled
 * @property integer $archived
 * @property integer $prize_id
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property Prize $prize
 * @property Question[] $questions
 * @property WidgetSetting[] $widgetSettings
 */
class Widget extends Collection
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'widget';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, name, type, position_x, position_y, enabled, prize_id', 'required'),
			array('company_id, auto_open, enabled, archived, prize_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('type, position_x, position_y', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, name, type, position_x, position_y, auto_open, enabled, archived, prize_id', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'prize' => array(self::BELONGS_TO, 'Prize', 'prize_id'),
			'questions' => array(self::MANY_MANY, 'Question', 'widget_question(widget_id, question_id)'),
			'widgetSettings' => array(self::HAS_MANY, 'WidgetSetting', 'widget_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'name' => 'Name',
			'type' => 'Type',
			'position_x' => 'Horizontal Position (X)',
			'position_y' => 'Vertical Position (Y)',
			'auto_open' => 'Auto Open Widget When Page Loads',
			'enabled' => 'Enabled',
			'archived' => 'Archived',
			'prize_id' => 'Prize',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position_x',$this->position_x,true);
		$criteria->compare('position_y',$this->position_y,true);
		$criteria->compare('auto_open',$this->auto_open);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('archived',$this->archived);
		$criteria->compare('prize_id',$this->prize_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Widget the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
