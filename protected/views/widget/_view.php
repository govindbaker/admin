<?php
/* @var $this WidgetController */
/* @var $data Widget */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_open')); ?>:</b>
	<?php echo CHtml::encode($data->auto_open); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('archived')); ?>:</b>
	<?php echo CHtml::encode($data->archived); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prize_id')); ?>:</b>
	<?php echo CHtml::encode($data->prize_id); ?>
	<br />

	*/ ?>

</div>