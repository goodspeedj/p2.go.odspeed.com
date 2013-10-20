<!-- Generate the Navigation bar -->
<div class="container">
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">
      <div class="row offset3 span6">
      <a class="brand" href="#">Flitter</a>

      <!-- Only display the navigation buttons if the user is logged in -->
      <?php if (isset($_COOKIE['token'])): ?>

          <ul class="nav">
            <li class="active"><a href="#">Post</a></li>
            <li><a href="#">Find</a></li>
            <li><a href="/users/profile/">Profile</a></li>
          </ul>

      <?php endif; ?>
      
      </div>
    </div>
    </div>
  </div>
</div>