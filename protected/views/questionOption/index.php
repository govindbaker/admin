<?php
/* @var $this QuestionOptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Options',
);

$this->menu=array(
	array('label'=>'Create QuestionOption', 'url'=>array('create')),
	array('label'=>'Manage QuestionOption', 'url'=>array('admin')),
);
?>

<h1>Question Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
