<?php
/* @var $this QuestionOptionController */
/* @var $model QuestionOption */
/* @var $form CActiveForm */
?>

<div class="questionOption-<?php echo $counter ?>">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-option-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<div class="form-group">
		<?php echo $form->hiddenField($model,'question_id'); ?>
	</div>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textField($model,'answer',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'ranking'); ?>
		<?php echo $form->textField($model,'ranking',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'ranking'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->