<?php
/* @var $this WidgetController */
/* @var $model Widget */
?>

<?php Yii::app()->clientScript->registerPackage('quicksand'); ?>

<div class="box-info">
	<h2>Update <strong><?php echo CHtml::encode($model->name);?></strong></h2>
	<?php $this->renderPartial('_form', array('model'=>$model,'extraItems'=>$extraItems)); ?>
</div><!-- End div .box-info -->
