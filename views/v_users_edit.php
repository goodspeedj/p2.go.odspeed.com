<!-- 
  OK to put some display logic in view 
  Also using alternative syntax - this should be a mostly HTML file
-->
<?php if (isset($user_name)): ?>
  <h3>Profile for <?=$user_name?></h3>
  <form role="form">
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" placeholder="First Name" id="first_name">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" placeholder="Last Name" id="last_name">
      <label for="email">Email</label>
      <input type="email" class="form-control" placeholder="Email" id="email">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

<?php else: ?>
  <h3>No user has been specified</h3>
<?php endif; ?>