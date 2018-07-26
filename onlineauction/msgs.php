<?php  if (count($msgs) > 0) : ?>
	<div class="messages">
		<?php foreach ($msgs as $msg) : ?>
			<p><?php echo $msg ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
