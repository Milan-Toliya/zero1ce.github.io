<?php  if (count($msgs) > 0) : ?>
	<div class="messages">
		<?php foreach ($msgs as $msg){
			echo $msg."<br/>";
		}?>
	</div>
<?php  endif ?>
