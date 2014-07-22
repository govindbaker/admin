		<!-- Begin Login Page -->
		<div class="full-content-center animated fadeInDownBig">
			<a href="#fakelink"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo-login.png" class="logo-login img-circle" alt="Logo"></a>
			<div class="login-wrap">
				<div class="box-info">
				<h2 class="text-center"><strong>Login</strong> form</h2>
					
					<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
						<div class="success">
							<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
						</div>
					<?php endif; ?>

					<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

					<?php echo CHtml::errorSummary($model); ?>

					<?php echo CHtml::beginForm(); ?>

						<div class="form-group login-input">
							<i class="fa fa-sign-in overlay"></i>
							<!--<?php echo CHtml::activeLabelEx($model,'username'); ?>-->
							<?php echo CHtml::activeTextField($model,'username',array('placeholder'=>'Username','class'=>'form-control text-input')) ?>
							<!--<input type="text" class="form-control text-input" placeholder="Username">-->
						</div>
						<div class="form-group login-input">
							<i class="fa fa-key overlay"></i>
							<?php echo CHtml::activePasswordField($model,'password',array('placeholder'=>'Password','class'=>'form-control text-input')) ?>
							<!--<input type="password" class="form-control text-input" placeholder="Password">-->
						</div>
						<div class="checkbox">
						<label>
							<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?> <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
						</label>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success btn-block"><i class="fa fa-unlock"></i> Login</button>
							</div>
							<div class="col-sm-6">
								<?php echo CHtml::link(UserModule::t("<i class='fa fa-rocket'></i> Register"),Yii::app()->getModule('user')->registrationUrl,array('class'=>'btn btn-default btn-block')); ?>
								<!--<a href="register.html" class="btn btn-default btn-block"><i class="fa fa-rocket"></i> Register</a>-->
							</div>
						</div>
					<?php echo CHtml::endForm(); ?>
					
					<p class="text-center"><strong>- or -</strong></p>
					
					<?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
					
				</div>
				<p class="text-center">
					<?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl,array('class'=>'btn btn-default btn-block')); ?>
				</p>
				<!--<p class="text-center"><a href="forgot-password.html"><i class="fa fa-lock"></i> Forgot password?</a></p>-->
			</div>
		</div>
		<!-- End Login Page -->



<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>