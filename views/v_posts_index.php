<table class="posts" width="100%">
  <tr>
    <td colspan="2">
      <form method="post" action="/posts/p_add">
        <textarea name="content" class="form-control new_post" rows="3" cols="50" autofocus placeholder="Enter a new post..."></textarea>
        <br />
        <button class="btn btn-danger" type="submit">Add New Post</button>
      </form>
    </td>
  </tr> 

<?php foreach ($posts as $row): ?>
  <tr>
    <td>
      <?php if ($row['picture']): ?>
        <img src="/img/user_pics/<?= $row['picture']?>">
      <?php else: ?>
        <img src="/img/user_pics/avatar.jpg">
      <?php endif; ?>
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