<?php
/* @var $this QuestionOptionController */
/* @var $model QuestionOption */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionOption', 'url'=>array('index')),
	array('label'=>'Manage QuestionOption', 'url'=>array('admin')),
);
?>

<h1>Create QuestionOption</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>