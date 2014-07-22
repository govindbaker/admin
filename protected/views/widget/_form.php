<?php
/* @var $this WidgetController */
/* @var $model Widget */
/* @var $form CActiveForm */
?>

<?php Yii::app()->clientScript->registerPackage('minicolors'); ?>

<div id="basic-form" class="collapse in col-sm-10" style="height: auto;">

<!--
	<form role="form" id="registerForm">
		<div class="form-group">
			<input type="file" class="btn btn-default" title="Search for a file to add">
			<p class="help-block">Example block-level help text here.</p>
		</div>

	  <div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username">
	  </div>
	  <div class="form-group">
		<label>Email address</label>
		<input type="text" class="form-control" name="email">
	  </div>
	  <div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<label>Password</label>
				<input id="password" type="password" class="form-control" name="password">
			</div>
			<div class="col-sm-6">
				<label>Re-Password</label>
				<input type="password" class="form-control" name="confirmPassword">
			</div>
		</div>
	  </div>
	  <div class="form-group">
		<label>Phone</label>
		<input type="text" class="form-control" name="phoneNumber">
	  </div>
		<div class="form-group">
		<label class="control-label" id="captchaOperation"></label>
			<div class="row">
				<div class="col-sm-4">
				<input type="text" class="form-control" name="captcha" />
				</div>
			</div>
		</div>
	  <div class="form-group">
		<div class="checkbox">
			<label>
			  <input name="acceptTerms" type="checkbox"> I agree to the <a href="#fakelink">Terms of Service</a>
			</label>
		</div>
	  </div>
	  <button type="submit" class="btn btn-primary">Register</button>
	</form>
-->

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'widget-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('role'=>'form'),
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('class'=>'form-control')); ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'position_x'); ?>
		<?php echo $form->textField($model,'position_x',array('class'=>'form-control')); ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'position_y'); ?>
		<?php echo $form->textField($model,'position_y',array('class'=>'form-control')); ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Background Colour'); ?>
		<?php if (isset($extraItems["settings"]["BackgroundColour"])) {
			echo '<input type="text" value="' . $extraItems["settings"]["BackgroundColour"]->value . '" name="WidgetSetting[id][' . $extraItems['settings']['BackgroundColour']->id . ']" class="minicolors form-control">';
		} else {
			echo '<input type="text" value="#FFFFFF" name="WidgetSetting[name][BackgroundColour]" class="minicolors form-control">';
		} ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Text Colour'); ?>
		<?php if (isset($extraItems["settings"]["TextColour"])) {
			echo '<input type="text" value="' . $extraItems["settings"]["TextColour"]->value . '" name="WidgetSetting[id][' . $extraItems['settings']['TextColour']->id . ']" class="minicolors form-control">';
		} else {
			echo '<input type="text" value="#000000" name="WidgetSetting[name][TextColour]" class="minicolors form-control">';
		} ?>
		<p class="help-block"></p>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'auto_open'); ?>
		<div class="radio">
			<?php echo $form->radioButtonList($model,'auto_open', array('1'=>'Display Open Widget', '0'=>'Display Closed Widget')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<div class="radio">
			<?php echo $form->radioButtonList($model,'enabled', array('1'=>'Enable Widget', '0'=>'Disable Widget')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'prize_id'); ?>
		<?php echo $form->hiddenField($model,'prize_id',array('class'=>'form-control')); ?>
	</div>

	<?php $this->renderPartial('//prizes/_viewall', array('model'=>$model,'extraItems'=>$extraItems)); ?>


	<?php echo $form->labelEx($model,'Current Questions'); ?>
	<?php $this->renderPartial('//question/_viewall', array('model'=>$model,'extraItems'=>$extraItems)); ?>

<div class="row buttons">
<?php 
   //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
         
  echo CHtml::ajaxSubmitButton('Save', 
         CHtml::normalizeUrl(array('question/Update')), 
         array(
              //'data'=>'js:jQuery(this).parents("form").serialize()+
                             //"&request=added"',       
              'success'=>'function(data){
                          $("#eventlist").html(data);
                   }'
          ), 
         array(
              'id'=>'ajaxSubmitBtn', 
              'name'=>'ajaxSubmitBtn'
         )); 
  ?>
</div>


	<?php /*CHtml::ajaxSubmitButton(
        'Addddd', 
        array('trip/createdestination', 'id' => 2), 
        array(
          'type' => 'post', 
          'success' => 'js: function(result) {
            if(result != "") {
              $("#partial-data").append( result ); //add to partial-data
            }
          }'
        ),
        array(
          'id' => 'addDestination'
        )
); */
?>
	<!--
	<div class="form-group">
		<?php echo $form->labelEx($model,'prize_id'); ?>
		<?php echo $form->dropDownList($model, 'prize_id',
			CHtml::listData($extraItems['prizes'], 'id', 'name'),
			array('prompt' => 'Choose a prize','class'=>'form-control')
		); ?>
	</div>
-->

	<div class="form-group">
		<?php
			echo CHtml::link('Preview',array('widget/preview','inline'=>'1','id'=>$model->id), array('target'=>'_blank','class'=>'submit btn btn-primary','onclick'=>'this.href = this.href + "&" + $("form").serialize()'));
			echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit btn btn-primary'));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
	Yii::app()->clientScript->registerScript('minicolors-enabled',"
		$.minicolors = {
			defaults: {
				theme: 'bootstrap',
				opacity: false,
			}
		};
		$('INPUT.minicolors').minicolors();
	");
	Yii::app()->clientScript->registerScript('site_preview',"
		function previewSite(clicked){
			alert($('form').serialize());
		}
	");
?>