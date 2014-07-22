<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div id="basic-form" class="collapse in col-sm-10" style="height: auto;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'data-async'=>'true',
		'data-target'=>'#simpleModal',
		'data-postfunction'=>'update',
		'role'=>'form',
	),
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>64,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>

	<?php echo $form->labelEx($model,'Current Answers'); ?>
	<?php $this->renderPartial('_viewOptions', array('model'=>$model,'extraItems'=>$extraItems)); ?>

      <?php
            $i = 0;
            foreach ($model->questionOptions as $questionOption) {
                /* @var Song $song */
                $this->renderPartial('/questionOption/_form', array('model' => $questionOption, 'counter' => $i));
                $i++;
            }
            ?>
            <?php
            // add button to 'add' a song if adding more songs is enabled
                // print the button here, which replicates the form but advances its counters
                // add the blank, extra 'song' form, with display=none... :
                echo '<div id="extra-song" style="display: none;">';
                $this->renderPartial('/questionOption/_form', array('model' => new QuestionOption(), 'counter' => $i));
                echo "</div>";
            ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'required'); ?>
		<?php echo $form->textField($model,'required',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'char_min'); ?>
		<?php echo $form->textField($model,'char_min',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'char_max'); ?>
		<?php echo $form->textField($model,'char_max',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'default_value'); ?>
		<?php echo $form->textField($model,'default_value',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ranking'); ?>
		<?php echo $form->textField($model,'ranking',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group" id="question-form-submit">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->