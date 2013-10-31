  <form class="form-signin" method="post" action="/users/p_login">
    <h3 class="form-signin-heading">Please sign in</h3>
    <input type="text" name="email" placeholder="Email address">
    <br />
    <input type="password" name="password" placeholder="Password">
    
    <!-- Check for bad user name / password -->
    <?php if(isset($error)): ?>
      <div class='alert alert-danger'>
        Login failed. Please double check your email and password.
      </div>
      <br>
    <?php endif; ?>
    <p><a href="/users/signup">Register for account</a></p>
    <p>&nbsp;</p>
    
    <button class="btn btn-danger" type="submit">Log in</button>
  </form>