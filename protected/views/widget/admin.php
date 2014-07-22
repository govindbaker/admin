<?php
/* @var $this WidgetController */
/* @var $model Widget */

/*
$this->breadcrumbs=array(
	'Widgets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Create Widget', 'url'=>array('create')),
);
*/
?>



<!-- Begin sortable table hover striped -->
<div class="box-info full">

	<h2>Current Widgets</h2>

	<div class="table-responsive">
		<table data-sortable class="table table-hover table-striped">
			<thead>
				<tr>
					<th style="width: 30px" data-sortable="false"><input type="checkbox" class="rows-check"></th>
					<th>No</th>
					<th>Full Name</th>
					<th>Type</th>
					<th>Position X</th>
					<th>Position Y</th>
					<th>Auto Open</th>
					<th>Enabled</th>
					<th>Archived</th>
					<th>Prize</th>
					<th>Status</th>
					<th style="width: 100px" data-sortable="false">Option</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$counter = 0;
					foreach($widgets as $widget):
					$counter = $counter + 1;
				?>
				<tr>
					<td><input type="checkbox" class="rows-check"></td>
					<td><?php echo $counter;?></td>
					<td><strong><?php echo CHtml::encode($widget->name);?></strong></td>
					<td><?php echo CHtml::encode($widget->type);?></td>
					<td><?php echo CHtml::encode($widget->position_x);?></td>
					<td><?php echo CHtml::encode($widget->position_y);?></td>
					<td><?php echo CHtml::encode($widget->auto_open);?></td>
					<td><?php echo CHtml::encode($widget->enabled);?></td>
					<td><?php echo CHtml::encode($widget->archived);?></td>
					<td><?php echo CHtml::encode($widget->prize['name']);?></td>
					<td><span class="label label-success">Active</span></td>
					<td>
						<div class="btn-group btn-group-xs">
							<a href="<?php echo $this->createUrl('widget/update',array('id'=>$widget->id));  ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Duplicate"><i class="fa fa-copy"></i></a>
							<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Disable"><i class="fa fa-power-off"></i></a>
							<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Delete"><i class="fa fa-times-circle"></i></a>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div><!-- End div .table-responsive -->
</div><!-- End div .box-info .full -->

<!-- Begin sortable table hover striped -->

<p>
	<a href="<?php echo $this->createUrl('widget/create');  ?>">
		<button type="button" class="btn btn-primary">Add Widget</button>
	</a>
</p>
