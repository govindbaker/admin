<?php

/**
 * This is the model class for table "entry".
 *
 * The followings are the available columns in table 'entry':
 * @property integer $id
 * @property integer $company_id
 * @property string $email
 * @property integer $no_of_entries
 * @property string $entry_date
 * @property integer $draw_id
 *
 * The followings are the available model relations:
 * @property Draw $draw
 * @property Company $company
 * @property EntryAnswer[] $entryAnswers
 * @property Winner[] $winners
 */
class Entry extends Collection
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, email, entry_date, draw_id', 'required'),
			array('company_id, no_of_entries, draw_id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, email, no_of_entries, entry_date, draw_id', 'safe', 'on'=>'search'),
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
			'draw' => array(self::BELONGS_TO, 'Draw', 'draw_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'entryAnswers' => array(self::HAS_MANY, 'EntryAnswer', 'entry_id'),
			'winners' => array(self::HAS_MANY, 'Winner', 'entry_id'),
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
			'email' => 'Email',
			'no_of_entries' => 'No Of Entries',
			'entry_date' => 'Entry Date',
			'draw_id' => 'Draw',			
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('no_of_entries',$this->no_of_entries);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('draw_id',$this->draw_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function LastXMonthsEntries($numberOfMonths=1,$type="records",$pagination=array())
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->order = "id desc";		
		$criteria->compare('entry_date', '<'.date("y-m-d H:i:s"));
		$criteria->compare('entry_date', '>'.date("y-m-d H:i:s",strtotime("-" . $numberOfMonths . " month")));
		if (isset($pagination['entriesPerPage']) && isset($pagination['start_record'])) {
			//$criteria->limit = $pagination['start_record'] . ',' . $pagination['entriesPerPage'];
			$criteria->limit = $pagination['entriesPerPage'];
			$criteria->offset = $pagination['start_record'];
		}
		if($type == 'count'){
			return self::model()->count($criteria);
		} else {
			return self::model()->findAll($criteria);
		}

		
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Entry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getEntries($drawId = 0,$type="records",$pagination=array()){
		$criteria=new CDbCriteria;
		$criteria->order = "id desc";
		if (isset($pagination['entriesPerPage']) && isset($pagination['start_record'])) {
			//$criteria->limit = $pagination['start_record'] . ',' . $pagination['entriesPerPage'];
			$criteria->limit = $pagination['entriesPerPage'];
			$criteria->offset = $pagination['start_record'];
		}
		if($drawId > 0){
			$criteria->condition = "draw_id = " . $drawId;
		}
		if($type == 'count'){
			return self::model()->count($criteria);
		} else {
			return self::model()->findAll($criteria);
		}
	}
	/*
	public function actions() {
    	return array(
	        'export' => array(
	            'class'     => 'ext.exporter.ExportAction',
	            'columns'   => $this->getIndexColumns(), // reuse existing configuration
	            'modelClass' => 'SomeModel', // provide your CActiveRecord model with the search() method or define 'dataProvider' in the 'widget' property
	            'widget'    => array('filename' => 'export.csv'), // all properties of CsvView widget
	        ),
	    );
	}
	*/

}
