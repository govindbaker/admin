<div class="box-info">
	<h2><strong><?php echo  UserModule::t('Update User')." ".$model->id;?></strong></h2>
	<?php $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
</div><!-- End div .box-info -->