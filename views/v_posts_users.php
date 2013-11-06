<!-- Displays a list of users with ability to follow/unfollow -->
<table class="posts">

<!-- Loop through all the users -->
<?php foreach ($users as $user): ?>
  
    <tr>
      <td>

        <!-- Display user picture/avatar -->
        <?php if ($user['picture']): ?>
          <img class="avatar" src="/img/user_pics/<?= $user['picture']?>" alt="Avatar" height="32" width="32">
        <?php else: ?>
          <img class="avatar" src="/img/user_pics/avatar.jpg" alt="Default Avatar" height="32" width="32">
        <?php endif; ?>

      </td>
      <td class="left">

        <!-- Display user's name and email --> 
        <span class="bold">User Name: </span>
        <?php echo $user['first_name'] . " " . $user['last_name'] ?>
        <br />
        <span class="bold">Email: </span>
        <?php echo $user['email'] ?>

      </td>
      <td class="left">

        <!-- Follow and unfollow buttons -->
        <?php if (isset($connections[$user['user_id']])): ?>
          <a class="btn btn-small btn-danger follow-btn" href="/posts/unfollow/<?=$user['user_id']?>"><i class="icon-remove icon-white"></i>  Unfollow</a>
        <?php else: ?>
          <a class="btn btn-small btn-success follow-btn" href="/posts/follow/<?=$user['user_id']?>"><i class="icon-ok icon-white"></i>  Follow</a>
        <?php endif; ?>

      </td>
    </tr>

<?php endforeach; ?>

</table>