<?php if (isset($user_details)): ?>

  <h3>Profile for <?=$user_details['first_name']?> <?=$user_details['last_name'] ?></h3>
 
  <form method="POST" action="/users/p_edit">
  
    <div class="form-group">
      <input type="hidden" value="<?=$user_details['user_id'] ?>" name="user_id">

      <label for="first_name">First Name</label>
      <input type="text" class="form-control" value="<?=$user_details['first_name'] ?>" name="first_name">
      
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" value="<?=$user_details['last_name'] ?>" name="last_name">
      
      <label for="email">Email</label>
      <input type="email" class="form-control" value="<?=$user_details['email'] ?>" name="email">
      
      <label for="password">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
    <button type="submit" class="btn btn-danger">Submit</button>
 
  </form>

<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>