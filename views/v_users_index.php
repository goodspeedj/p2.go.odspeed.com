<!-- Displays a list of all users -->
<table class="user_list">

<?php foreach ($user_list as $row): ?>
    <tr>
      <td>

        <?php if ($row['picture']): ?>
          <img src="/img/user_pics/<?= $row['picture']?>">
        <?php else: ?>
          <img src="/img/user_pics/avatar.jpg">
        <?php endif; ?>

      </td>
      <td>

        <span class="bold">User Name: </span>
        <?php echo $row['first_name'] . " " . $row['last_name'] ?>
        <br />
        <span class="bold">Email: </span>
        <?php echo $row['email'] ?>
        
      </td>
      <td>
        <a class="btn btn-small btn-success" href="#"><i class="icon-ok icon-white"></i>  Follow</a>
      </td>
    </tr>
<?php endforeach; ?>

</table>