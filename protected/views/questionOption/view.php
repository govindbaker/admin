<?php
/* @var $this QuestionOptionController */
/* @var $model QuestionOption */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuestionOption', 'url'=>array('index')),
	array('label'=>'Create QuestionOption', 'url'=>array('create')),
	array('label'=>'Update QuestionOption', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuestionOption', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionOption', 'url'=>array('admin')),
);
?>

<h1>View QuestionOption #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'answer',
		'ranking',
		'selected',
	),
)); ?>
