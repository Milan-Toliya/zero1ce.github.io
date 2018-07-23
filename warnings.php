<?php if (count($warns) > 0) : ?>
	<div class="warnings">
		<?php foreach ($warns as $warn){
			echo '<p style="margin-bottom: 0px;" class="text-warning">';
			echo '* '.$warn;
			echo "</p>";
		}?>
	</div>
<?php  endif ?>