<?php

/**
 * This is the model class for table "draw".
 *
 * The followings are the available columns in table 'draw':
 * @property integer $id
 * @property string $date_time
 * @property integer $complete
 *
 * The followings are the available model relations:
 * @property Entry[] $entries
 * @property Winner[] $winners
 */
class Draw extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'draw';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_time', 'required'),
			array('complete', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_time, complete', 'safe', 'on'=>'search'),
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
			'entries' => array(self::HAS_MANY, 'Entry', 'draw_id'),
			'winners' => array(self::HAS_MANY, 'Winner', 'draw_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_time' => 'Date Time',
			'complete' => 'Complete',
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
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('complete',$this->complete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Draw the static model class
	 */


	public function getCurrentDraw(){
		//$dt = new DateTime();
		$criteria=new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = "id asc";
		//$criteria->condition = "id = 1";
		$criteria->condition = "DATE(date_time) >= DATE(NOW())";
		//var_dump($criteria); die();
		return self::model()->find($criteria);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
