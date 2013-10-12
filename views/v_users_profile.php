<!-- 
	OK to put some display logic in view 
	Also using alternative syntax - this should be a mostly HTML file
-->
<?php if (isset($user_name)): ?>
	<h1>This is the profile for <?=$user_name?></h1>
<?php else: ?>
	<h1>No user has been specified</h1>
<?php endif; ?>

Color is <?=$color?><br />