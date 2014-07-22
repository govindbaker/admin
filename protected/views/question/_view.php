<?php
/* @var $this QuestionController */
/* @var $data Question */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('required')); ?>:</b>
	<?php echo CHtml::encode($data->required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('char_min')); ?>:</b>
	<?php echo CHtml::encode($data->char_min); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('char_max')); ?>:</b>
	<?php echo CHtml::encode($data->char_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_value')); ?>:</b>
	<?php echo CHtml::encode($data->default_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('error_message')); ?>:</b>
	<?php echo CHtml::encode($data->error_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ranking')); ?>:</b>
	<?php echo CHtml::encode($data->ranking); ?>
	<br />

	*/ ?>

</div>