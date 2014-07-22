<?php
/* @var $this QuestionOptionController */
/* @var $model QuestionOption */

$this->breadcrumbs=array(
	'Question Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuestionOption', 'url'=>array('index')),
	array('label'=>'Create QuestionOption', 'url'=>array('create')),
	array('label'=>'View QuestionOption', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuestionOption', 'url'=>array('admin')),
);
?>

<h1>Update QuestionOption <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>