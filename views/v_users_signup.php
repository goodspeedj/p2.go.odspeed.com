<!-- New user sign up form -->
<h3>Sign up</h3>

<form method="POST" action="/users/p_signup" enctype="multipart/form-data">

  <input type="text" name="first_name" placeholder="First Name"><br />
  <input type="text" name="last_name" placeholder="Last Name"><br />
  <input type="text" name="email" placeholder="Email address"><br />
  <input type="password" name="password" placeholder="Password"><br />
  <p>User Image</p>
  <input type="file" class="filestyle" name="piture" data-classInput="input-small" data-input="false">

  <p>&nbsp;</p>
  <button class="btn btn-danger" type="submit">Sign up</button>
 
</form>