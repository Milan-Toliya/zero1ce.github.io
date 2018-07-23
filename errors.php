<?php if (count($errors) > 0) : ?>
	<div class="errors">
		<?php foreach ($errors as $error){
			echo '<p style="margin-bottom: 0px;" class="text-danger">';
			echo '* '.$error;
			echo "</p>";
		}?>
	</div>
<?php  endif ?>
