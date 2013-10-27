<!-- Displays a list of users -->
<table class="user_list">

<?php foreach ($users as $user): ?>
  
    <tr>
      <td>
        <img src="http://lorempixel.com/32/32/abstract/">
      </td>
      <td class="left">
        <span class="bold">User Name: </span>
        <?php echo $user['first_name'] . " " . $user['last_name'] ?>
        <br />
        <span class="bold">Email: </span>
        <?php echo $user['email'] ?>
      </td>
      <td class="left">
        <?php if (isset($connections[$user['user_id']])): ?>
          <a class="btn btn-small btn-danger follow-btn" href="/posts/unfollow/<?=$user['user_id']?>"><i class="icon-remove icon-white"></i>  Unfollow</a>
        <?php else: ?>
          <a class="btn btn-small btn-success follow-btn" href="/posts/follow/<?=$user['user_id']?>"><i class="icon-ok icon-white"></i>  Follow</a>
        <?php endif; ?>
      </td>
    </tr>

<?php endforeach; ?>

</table>