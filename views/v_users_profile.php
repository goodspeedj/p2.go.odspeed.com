<!-- Displays the user's profile -->
<?php if (isset($user_details)): ?>
  <h3>Profile for <?= $user_details['first_name'] ?> <?= $user_details['last_name'] ?></h3>
  <p>&nbsp;</p>
  <table align="center" class="profile">
    <tr>
      <td class="bold left">First Name:</td>
      <td class="left"><?= $user_details['first_name']?></td>
    </tr>
    <tr>
    <tr>
      <td class="bold left">Last Name:</td>
      <td class="left"><?= $user_details['last_name']?></td>
    </tr>
    <tr>
      <td class="bold left">Email:</td>
      <td class="left"><?= $user_details['email']?></td>
    </tr>
    <tr>
      <td class="center" colspan="2">
        <p>&nbsp;</p>
        <a href="/users/edit/<?= $user_details['user_id']?>" class="center btn btn-danger">Edit Profile</a>
      </td>
    </tr>
  </table>

<!-- No user specified -->
<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>