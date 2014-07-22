<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entry-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<!-- Stats overview -->
<div class="row">
	<a href="<?php echo $this->createUrl('entry/admin',array('filter'=>'CurrentDrawEntries')); ?>">
		<div class="col-sm-4 col-xs-6">
			<div class="box-info success">
				<div class="icon-box">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x success"></i>
					  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="text-box">
					<h3><?php echo $summary['currentDraw']; ?></h3>
					<p>
						<?php echo ($summary['currentDraw'] == 1 ? "Entry": "Entries");?> in the Next Draw
					</p>
					<h6 style="float:right;margin-bottom: 0px;font-size:10px;">Click to view</h6>					
				</div>
			</div>
		</div>
	</a>
	<a href="<?php echo $this->createUrl('entry/admin',array('filter'=>'AllEntries')); ?>">
		<div class="col-sm-4 col-xs-6">
			<div class="box-info danger">
				<div class="icon-box">
					<span class="fa-stack">
					  <i class="fa fa-circle fa-stack-2x danger"></i>
					  <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
					</span>
				</div>
				<div class="text-box">
					<h3><?php echo $summary['allEntries']; ?></h3>
					<p>
						Total <?php echo ($summary['allEntries'] == 1 ? "Entry": "Entries");?>
					</p>
					<h6 style="float:right;margin-bottom: 0px;font-size:10px;">Click to view</h6>
				</div>
			</div>
		</div>
	</a>
	<a href="<?php echo $this->createUrl('entry/admin',array('filter'=>'LastXMonthsEntries')); ?>">
	<div class="col-sm-4 col-xs-6">
		<div class="box-info info">
			<div class="icon-box">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x info"></i>
				  <i class="fa fa-cloud-download fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			<div class="text-box">
				<h3><?php echo $summary['lastMonths']; ?></h3>
				<p>
					<?php echo ($summary['lastMonths'] == 1 ? "Entry": "Entries");?> (in the last 31 days)
				</p>
				<h6 style="float:right;margin-bottom: 0px;font-size:10px;">Click to view</h6>
			</div>
		</div>
	</div>
	</a>
	<!--
	<div class="col-sm-3 col-xs-6">
		<div class="box-info warning">
			<div class="icon-box">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x warning"></i>
				  <i class="fa fa-truck fa-stack-1x fa-inverse"></i>
				</span>
			</div>
			<div class="text-box">
				<h3>572</h3>
				<p>SHIPPING</p>
			</div>
		</div>
	</div>-->
</div>
<!-- Stats ov<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>erview end -->


<?php
/*
 echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 
*/
?>

<?php /*Yii::app()->clientScript->registerPackage('bootstrap-lightbox');*/ ?>

<div class="box-info full">
<div id="pag">
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
    'internalPageCssClass'=> 'clinkpage',
)) ?>
</div>
	<h2><?php echo $entriesHeading; ?></h2>

	<div class="table-responsive">
		<table data-sortable class="table table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>EMAIL</th>
					<th>NUMBER OF ENTRIES</th>
					<th>ENTRY DATE</th>
					<th>DRAW ID</th>
					<th>METHOD OF ENTRY</th>
					<th style="width: 100px" data-sortable="false">Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($DrawEntries as $Entry):
				?>
				<tr>
					<td><strong><?php echo CHtml::encode($Entry->id);?></strong></td>
					<td><?php echo CHtml::encode($Entry->email);?></td>
					<td><?php echo CHtml::encode($Entry->no_of_entries);?></td>
					<td><?php echo CHtml::encode(date('l jS F Y',strtotime($Entry->entry_date)));?></td>
					<td><?php echo CHtml::encode($Entry->draw_id);?></td>
					<td><?php echo CHtml::encode($Entry->method_of_entry);?></td>
					<td>
						<div class="btn-group btn-group-xs">
							<?php 
								echo CHtml::ajaxLink('<i class="fa fa-search"></i>', 
								CHtml::normalizeUrl(array('entry/viewDetails','id'=>$Entry->id)), 
								array(     
									'success'=>'function(data){
										$("#simpleModalBody").html(data);
										$("#simpleModalTitle").html("Entry Details");
										$("#simpleModalSubmit").hide();
										$("#simpleModal").modal("show");
									}'
								), 
								array(
									'data-toggle'=>'tooltip',
									'class'=>'btn btn-default',
									'data-original-title'=>'View'
								));
							?>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div><!-- End div .table-responsive -->
</div><!-- End div .box-info .full -->

<?php 
if(isset($_GET["filter"])){
	$filters = array('filter'=>$_GET['filter']);
}
else {
	$filters = array();
}

?>

<a href="<?php echo $this->createUrl('entry/CsvExport',$filters) ?>" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Export">Csv Export</a>

<!-- search-form -->

<?php
/*
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entry-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'company_id',
		'email',
		'no_of_entries',
		'entry_date',
		'draw_id',
		'method_of_entry',
		//'answer',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
*/

//var_dump($model);
 //die();
?>

