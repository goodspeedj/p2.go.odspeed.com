<?php if (isset($user_name)): ?>

  <h3>Profile for <?=$user_name?></h3>
  <form role="form">
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" value="<?=$user_details['first_name'] ?>" id="first_name">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" value="<?=$user_details['last_name'] ?>" id="last_name">
      <label for="email">Email</label>
      <input type="email" class="form-control" value="<?=$user_details['email'] ?>" id="email">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>