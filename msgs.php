<?php if (count($msgs) > 0) : ?>
	<div class="message">
		<?php foreach ($msgs as $msg){
			echo '<p style="margin-bottom: 0px;" class="text-success">';
			echo $msg;
			echo "</p>";
		}?>
	</div>
<?php  endif ?>