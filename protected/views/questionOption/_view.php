<?php
/* @var $this QuestionOptionController */
/* @var $data QuestionOption */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ranking')); ?>:</b>
	<?php echo CHtml::encode($data->ranking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('selected')); ?>:</b>
	<?php echo CHtml::encode($data->selected); ?>
	<br />


</div>