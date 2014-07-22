<?php
/* @var $this EntryController */
/* @var $data Entry */
?>

<div class="box-info">
	<h2><strong>Entry [<?php echo $model->id; ?>]</strong> in Draw [<?php echo $model->draw_id; ?>]</h2>
	<div class="box-info">
		<p><strong>Email:</strong> <?php echo $model->email; ?></p>
		<p><strong>Entry Date:</strong> <?php echo CHtml::encode(date('l jS F Y',strtotime($model->entry_date)));?></p>
		<p><strong>Number of Entries:</strong> <?php echo $model->no_of_entries; ?></p>
		<?php
			//var_dump($model['entryAnswers']);
			if(count($modelQuestions) != 0){
				echo "<h2>Entry Questions</h2>";
				foreach ($modelQuestions as $QuestionVal){
					echo "<p><strong>" . $QuestionVal['question']['question'] . " (" . $QuestionVal['question']['name'] . "):</strong> ";
					if($QuestionVal['attributes']['question_option_id'] <> 0)
						echo $QuestionVal['questionOption']['answer'] . "</p>";
					else
						echo $QuestionVal['attributes']['answer'] . "</p>";						
		  			//var_dump($QuestionVal['attributes']); 
		  			//var_dump($QuestionVal['question']);
		  			//var_dump($QuestionVal);   			
		  		}
			}
		?>
	</div>	
</div>
