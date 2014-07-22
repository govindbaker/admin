<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $type
 * @property string $question
 * @property integer $required
 * @property integer $char_min
 * @property integer $char_max
 * @property string $default_value
 * @property string $error_message
 * @property integer $ranking
 *
 * The followings are the available model relations:
 * @property EntryAnswer[] $entryAnswers
 * @property Company $company
 * @property QuestionOption[] $questionOptions
 * @property Widget[] $widgets
 */
class Question extends Collection
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, name, type, question, required, ranking', 'required'),
			array('company_id, required, char_min, char_max, ranking', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>64),
			array('question, default_value, error_message', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, name, type, question, required, char_min, char_max, default_value, error_message, ranking', 'safe', 'on'=>'search'),
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
			'entryAnswers' => array(self::HAS_MANY, 'EntryAnswer', 'question_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'questionOptions' => array(self::HAS_MANY, 'QuestionOption', 'question_id'),
			'widgets' => array(self::MANY_MANY, 'Widget', 'widget_question(question_id, widget_id)'),
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
			'question' => 'Question',
			'required' => 'Required',
			'char_min' => 'Minimum Number Of Characters',
			'char_max' => 'Maximum Number Of Characters',
			'default_value' => 'Default Value',
			'error_message' => 'Error Message - To show when validation fails',
			'ranking' => 'Ranking',
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
		$criteria->compare('question',$this->question,true);
		$criteria->compare('required',$this->required);
		$criteria->compare('char_min',$this->char_min);
		$criteria->compare('char_max',$this->char_max);
		$criteria->compare('default_value',$this->default_value,true);
		$criteria->compare('error_message',$this->error_message,true);
		$criteria->compare('ranking',$this->ranking);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
