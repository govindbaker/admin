<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

	<!-- Horizontal form -->
	<div class="box-info">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'company-form',
				'htmlOptions'=>array('class'=>'subscribe_form',),

				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>

			<p class="note">Fields with <span class="required">*</span> are required.</p>

			<?php echo $form->errorSummary($model); ?>

			<div class="form-group">
				<?php echo $form->labelEx($model,'name',array('class'=>'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textField($model,'name',array('maxlength'=>255,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'name'); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'website',array('class'=>'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textField($model,'website',array('maxlength'=>255,'class'=>'form-control')); ?>
					<?php echo $form->error($model,'website'); ?>
				</div>
			</div>	

			<?php
				foreach ($model->companySettings as $companySetting)
				{
					echo "<div class=\"form-group\">";
						echo $form->labelEx($companySetting,$companySetting->setting,array('class'=>'col-sm-2 control-label'));
						echo "<div class=\"col-sm-10\">";
							echo $form->textField($companySetting,'value',array('maxlength'=>255,'class'=>'form-control','name'=>'CompanySetting['.$companySetting->id.']'));
							echo $form->error($companySetting,'value');
		   	    		echo "</div>";
		   	    	echo "</div>";
				}
			?>
			
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit btn btn-primary')); ?>
	</div>






<?php $this->endWidget(); ?>

	</div><!-- End div .box-info -->