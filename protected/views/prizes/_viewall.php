<p>
	<button type="button" class="btn btn-default btn-primary filter_type" data-filter-type="all">All</button>
	<button type="button" class="btn btn-default filter_type" data-filter-type="1">Utils</button>
	<button type="button" class="btn btn-default filter_type" data-filter-type="2">Apps</button>
</p>



<ul id="all_prizes" class="gallery-wrap">
	<?php foreach($extraItems['prizes'] as $prize):?>
		<?php $theCategory = ''; foreach($prize->categories as $category): $theCategory = $theCategory . ' data-filtertype-' . $category->id .'=1'; endforeach;?>
		<li class="column" data-id="id-<?php echo $prize->id;?>" <?php echo trim($theCategory);?>>
			<div class="inner">
				<a class="prize-choice" title="Image title here" data-id=<?php echo $prize->id;?>>
					<div class="img-wrap2">
						<img src="/images/prizes/<?php echo $prize->image;?>" alt="<?php echo $prize->name;?>" title="<?php echo $prize->name;?>" class="mfp-fade">
					</div>
					<div class="caption-static success">
						<strong><?php echo $prize->name;?></strong> - <?php echo $prize->description;?>
					</div>
				</a>
			</div>
		</li>
	<?php endforeach; ?>
</ul>

<?php
	Yii::app()->clientScript->registerScript('prize-filter',"
	  var \$all_prizes = \$('#all_prizes');
	  var \$all_prizes_data = \$all_prizes.clone();

	  $('.filter_type').click(function(e) {
	      filter_type = $(this).data( 'filter-type' );
	      if (filter_type == 'all') {
	        var \$filteredData = \$all_prizes_data.find('li');
	      } else {
	        var \$filteredData = \$all_prizes_data.find('li[data-filtertype-' + filter_type + '=1]');
	      }

	      $('.filter_type').removeClass('btn-primary');
	      $(this).addClass('btn-primary');

	      // finally, call quicksand
	      \$all_prizes.quicksand(\$filteredData, {
	        duration: 800,
	        easing: 'swing'
	      });
	  });

	  $('.prize-choice').click(function(e) {
	  	$('#Widget_prize_id').val($(this).data('id'));
	  });
	");
?>

