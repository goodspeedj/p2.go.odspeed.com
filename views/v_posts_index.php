<table width="100%">
  <tr>
    <td colspan="2">
      <form method="post" action="/posts/p_add">
        <textarea name="content" class="form-control new_post" rows="3" cols="50" autofocus placeholder="Enter a new post..."></textarea>
        <br />
        <input type="Submit" value="Add new post">
      </form>
    </td>
  </tr> 

<?php foreach ($posts as $row): ?>
  <tr>
    <td>
      <img src="http://lorempixel.com/32/32/abstract/">
    </td>
    <td class="left">
      <span class="bold">
        <?php echo $row['first_name'] . " " . $row['last_name'] ?>
      </span><br />
      <?php echo $row['content'] ?>
    </td>
  </tr>
<?php endforeach; ?>

</table>