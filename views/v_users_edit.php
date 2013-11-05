<!-- Displays the user profile edit form -->
<?php if (isset($user_details)): ?>

  <h3>Profile for <?=$user_details['first_name']?> <?=$user_details['last_name'] ?></h3>
 
  <form id="profile-edit" method="POST" action="/users/p_edit">
  
    <div class="form-group">
      <input type="hidden" value="<?=$user_details['user_id'] ?>" name="user_id">

      <label for="first_name">First Name</label>
      <input id="first_name" type="text" class="form-control" value="<?=$user_details['first_name'] ?>" name="first_name" required>
      
      <label for="last_name">Last Name</label>
      <input id="last_name" type="text" class="form-control" value="<?=$user_details['last_name'] ?>" name="last_name" required>
      
      <label for="email">Email</label>
      <input id="email" type="email" class="form-control" value="<?=$user_details['email'] ?>" name="email" required>

      <label for="location">Location</label>
      <input id="location" type="text" class="form-control" value="<?=$user_details['location'] ?>" name="location">

      <label for="bio">Bio</label>
      <textarea id="bio" name="bio" class="form-control" rows="3" cols="50"></textarea>
      
      <label for="password">Password</label>
      <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

      <label for="picture">Avatar image</label>
      <input id="picture" type="file" class="filestyle" name="picture" data-classInput="input-small">
    </div>

    <button type="submit" class="btn btn-danger">Submit</button>
 
  </form>

<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>

<script>
  $("#profile-edit").validate();
</script>