<p>
	<ul id="currentQuestions">
		<?php foreach($model->questionOptions as $questionOption):
		//var_dump($questionOption); die();
		?>
			<li>
				<input class="form-control" name="QuestionOption[<?php echo $questionOption->id; ?>][answer]" type="text" value="<?php echo $questionOption->answer; ?>">
				<div class="btn-group btn-group-xs">
					<a data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
				</div>
			</li>
		<?php endforeach;?>
	</ul>
</p>

