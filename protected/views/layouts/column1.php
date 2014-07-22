<?php $this->beginContent('//layouts/main'); ?>

	<!-- BODY -->
	<body class="tooltips full-content">
	
	
	<!-- BEGIN PAGE -->
	<div class="container">
		
		<?php echo $content; ?>
		
	</div><!-- End div .container -->
	<!-- END PAGE -->

	<!--
	================================================
	JAVASCRIPT
	================================================
	-->

	<!-- VENDOR -->
	
	<!-- Slimscroll js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- Morris js -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/morris/morris.js"></script>
	
	<!-- Nifty modals js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/nifty-modal/js/classie.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/nifty-modal/js/modalEffects.js"></script>
	
	<!-- Sortable js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/sortable/sortable.min.js"></script>
	
	<!-- Bootstrao selectpicker js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/select/bootstrap-select.min.js"></script>
	
	<!-- Summernote js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/summernote/summernote.js"></script>
	
	<!-- Magnific popup js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/magnific-popup/jquery.magnific-popup.min.js"></script> 
	
	<!-- Bootstrap file input js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/input/bootstrap.file-input.js"></script>
	
	<!-- Bootstrao datepicker js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/datepicker/js/bootstrap-datepicker.js"></script>
	
	<!-- Icheck js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/icheck/icheck.min.js"></script>
	
	<!-- Form wizard js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/wizard/jquery.snippet.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/wizard/jquery.easyWizard.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/third/wizard/scripts.js"></script>
	
	<!-- LANCENG TEMPLATE JAVASCRIPT -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/lanceng.js"></script>

	</body>

<?php $this->endContent(); ?>