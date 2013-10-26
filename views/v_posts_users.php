<!-- Displays a list of users -->
<table class="user_list">

<?php foreach ($user_list as $row): ?>
    <tr>
      <td>
        <img src="http://lorempixel.com/32/32/abstract/">
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