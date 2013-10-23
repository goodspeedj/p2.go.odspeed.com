<!-- Displays the user's profile -->
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

<!-- No user specified -->
<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>