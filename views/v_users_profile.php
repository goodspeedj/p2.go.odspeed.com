<!-- 
	OK to put some display logic in view 
	Also using alternative syntax - this should be a mostly HTML file
-->
<?php if (isset($user_name)): ?>
	<h3>Profile for <?=$user_name?></h3>
    <table>
        <tr>
            <td>Name:</td>
            <td>value</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>value</td>
        </tr>
    </table>
<?php else: ?>
	<h3>No user has been specified</h3>
<?php endif; ?>