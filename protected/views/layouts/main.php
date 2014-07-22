<!DOCTYPE html>
<html>
  <head>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="description" content="">
  <meta name="keywords" content="admin, bootstrap,admin template, bootstrap admin, simple, awesome">
  <meta name="author" content="">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


  <!-- FAVICON -->
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/favicon.ico">
  </head>
  
  
  


  <!-- BEGIN PAGE -->
    <?php echo $content;?>
  <!-- END PAGE -->


  <!-- Basic Javascripts (Jquery and bootstrap) -->
  <?php Yii::app()->clientScript->registerPackage('bootstrap'); ?>

  <?php Yii::app()->clientScript->registerPackage('slimscroll'); ?>
  <?php Yii::app()->clientScript->registerPackage('summernote'); ?>
  <?php Yii::app()->clientScript->registerPackage('selectpicker'); ?>
  <?php Yii::app()->clientScript->registerPackage('fileinput'); ?>
  <?php Yii::app()->clientScript->registerPackage('datepicker'); ?>
  <?php Yii::app()->clientScript->registerPackage('morris'); ?>
  <?php Yii::app()->clientScript->registerPackage('nifty-modal'); ?>
  <?php Yii::app()->clientScript->registerPackage('sortable'); ?>
  <?php Yii::app()->clientScript->registerPackage('magnific-popup'); ?>
  <?php Yii::app()->clientScript->registerPackage('icheck'); ?>
  <?php Yii::app()->clientScript->registerPackage('form-wizard'); ?>

  <?php Yii::app()->clientScript->registerPackage('admin-specific'); ?>

</html>


		<?php 
		/*
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('post/index')),
				array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('site/contact')),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));
		*/
		?>
	<?php
	/*
	$this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	));
	*/
	?><!-- breadcrumbs -->

	<?php
	/*
	echo $content;
	*/
	?>
