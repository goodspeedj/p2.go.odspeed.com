<h3>Welome to Flitter</h3>

<?php if($user): ?>
  
  <p>Hello <?= $user->first_name;?>, welcome back.</p>

<?php else: ?> 
  <div class="left">
    <p>Flitter is a micro blog as well as Project #2 for CSCI E-15, Dynamic Web Applications.</p>
    <p>My +1 features for this project are:</p>
    <ul>
      <li>The ability to view and edit your profile</li>
      <li>The ability to upload a picture or icon to display next to your posts</li>
    </ul>
    <p>&nbsp;</p>
    <p>Please <a href="/users/login">Login</a> or <a href="/users/signup">Sign up</a></p>
  </div>

<?php endif; ?>