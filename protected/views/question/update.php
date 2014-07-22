<?php
/* @var $this QuestionController */
/* @var $model Question */
?>

<div class="box-info">
	<h2>Update <strong><?php echo CHtml::encode($model->name);?></strong> Question</h2>
	<?php $this->renderPartial('_form', array('model'=>$model,'extraItems'=>$extraItems)); ?>
</div><!-- End div .box-info -->
