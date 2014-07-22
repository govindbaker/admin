<?php

/**
 * This is the model class for table "question_option".
 *
 * The followings are the available columns in table 'question_option':
 * @property integer $id
 * @property integer $question_id
 * @property string $answer
 * @property integer $ranking
 * @property integer $selected
 *
 * The followings are the available model relations:
 * @property EntryAnswer[] $entryAnswers
 * @property Question $question
 */
class QuestionOption extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question_option';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, answer, ranking', 'required'),
			array('question_id, ranking, selected', 'numerical', 'integerOnly'=>true),
			array('answer', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question_id, answer, ranking, selected', 'safe', 'on'=>'search'),
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
			'entryAnswers' => array(self::HAS_MANY, 'EntryAnswer', 'question_option_id'),
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
			'question_id' => 'Question',
			'answer' => 'Answer',
			'ranking' => 'Ranking',
			'selected' => 'Selected',
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
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('ranking',$this->ranking);
		$criteria->compare('selected',$this->selected);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionOption the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
