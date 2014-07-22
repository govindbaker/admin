<p>
<?php foreach($extraItems['questions'] as $question):?>
	<ul id="currentQuestions">
		<?php $theCategory = ''; foreach($model->questions as $wQuestions):
			if($question->id == $wQuestions->id){ ?>
				<li>
					<?php echo $question->name . " - " . $question->question . " - " . $question->type; ?>
					<div class="btn-group btn-group-xs">
						<?php 
							echo CHtml::ajaxLink('<i class="fa fa-edit"></i>', 
							CHtml::normalizeUrl(array('question/ajaxUpdate','id'=>$question->id)), 
							array(     
								'success'=>'function(data){
									$("#simpleModalBody").html(data);
									$("#simpleModalTitle").html("Edit Question Details");
									$("#question-form-submit").hide();
									$("#simpleModal").modal("show");
								}'
							), 
							array(
								'data-toggle'=>'tooltip',
								'class'=>'btn btn-default',
								'data-original-title'=>'Edit'
							));
						?>
						<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
					</div>
				</li>
			<?php } else {
				$availableQuestions[] = $question;
			}
		endforeach;?>
	</ul>
<?php endforeach; ?>
	<label class="col-sm-2 control-label">Add New Question</label>
	<div class="col-sm-6">
		<select class="form-control">
			<?php foreach($extraItems['questions'] as $question):?>
				<option value="<?php echo $question->id;?>"><?php echo $question->name;?></option>
			<?php endforeach; ?>
		</select>
		<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Assign Question to this Widget"><i class="fa fa-plus-circle"></i></a>
	</div>
<?php
//var_dump($availableQuestions);
?>
</p>

