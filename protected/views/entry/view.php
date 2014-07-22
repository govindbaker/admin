<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>

<p><a href="/admin/webroot/entry/admin" class="btn btn-default btn-xs">Back To Entries</a></p>

<?php $this->renderPartial('_view',array(
	'model'=>$model,
	'modelQuestions'=>$modelQuestions,
)); ?>





<?php
//var_dump($model['entryAnswers']);
	//if(count($modelQuestions) != 0){
		//foreach ($modelQuestions as $QuestionVal){
			//var_dump($QuestionVal);
  			//var_dump($QuestionVal['attributes']); 
  			//var_dump($QuestionVal['question']);
  			//var_dump($QuestionVal['question']['name']);  			
  		//	var_dump($QuestionVal['questionOption']['answer']);   			
  		//}
	//}
	 /*
	 $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'company_id',
			'email',
			'no_of_entries',
			'entry_date',
			'draw_id',
		),
	)); 
	*/

?>
