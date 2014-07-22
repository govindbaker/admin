<?php<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entry-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
//echo 'enteries = ' . $this->cake;

echo CHtml::link('Download CSV',array('site/export'));

?>
