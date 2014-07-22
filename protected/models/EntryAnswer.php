<?php

/**
 * This is the model class for table "entry_answer".
 *
 * The followings are the available columns in table 'entry_answer':
 * @property integer $id
 * @property integer $entry_id
 * @property integer $question_id
 * @property integer $question_option_id
 * @property string $answer
 *
 * The followings are the available model relations:
 * @property QuestionOption $questionOption
 * @property Entry $entry
 * @property Question $question
 */
class EntryAnswer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entry_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entry_id, question_id, question_option_id', 'required'),
			array('entry_id, question_id, question_option_id', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, entry_id, question_id, question_option_id, answer', 'safe', 'on'=>'search'),
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
			'questionOption' => array(self::BELONGS_TO, 'QuestionOption', 'question_option_id'),
			'entry' => array(self::BELONGS_TO, 'Entry', 'entry_id'),
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'entry_id' => 'Entry',
			'question_id' => 'Question',
			'question_option_id' => 'Question Option',
			'answer' => 'Answer',
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
		$criteria->compare('entry_id',$this->entry_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('question_option_id',$this->question_option_id);
		$criteria->compare('answer',$this->answer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntryAnswer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
