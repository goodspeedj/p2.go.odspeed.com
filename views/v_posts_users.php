<!-- Displays a list of users -->
<table class="user_list">

<?php foreach ($users as $user): ?>
  
    <tr>
      <td>
        <img src="http://lorempixel.com/32/32/abstract/">
      </td>
      <td>
        <span class="bold">User Name: </span>
        <?php echo $user['first_name'] . " " . $user['last_name'] ?>
        <br />
        <span class="bold">Email: </span>
        <?php echo $user['email'] ?>
      </td>
      <td>
        <?php if (isset($connections[$user['user_id']])): ?>
          <a class="btn btn-small btn-danger" href="#"><i class="icon-remove icon-white"></i>  Unfollow</a>
        <?php else: ?>
          <a class="btn btn-small btn-success" href="#"><i class="icon-ok icon-white"></i>  Follow</a>
        <?php endif; ?>
      </td>
    </tr>

<?php endforeach; ?>

</table>