<div class="row">
	<div class="col-lg-12">
	<h1>Blank Page <small></small></h1>
		<ol class="breadcrumb">
			<li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
			<li class="active"><i class="icon-file-alt"></i> Blank Page</li>
		</ol>
	</div>
</div><!-- /.row -->


<?php foreach($prizes as $prize): ?>
	<div class="row">
		<div class="col-lg-12">
			<h1>!!<?php echo $prize->name;?>!!</h1>
		</div>
	</div>
<?php endforeach; ?>

<?php
/*
$this->breadcrumbs=array(
	$model->title,
);
$this->pageTitle=$model->title;
?>

<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>

<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/_form',array(
			'model'=>$comment,
		)); ?>
	<?php endif; ?>

</div><!-- comments -->
*/