<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <div class="offset2">
        <a class="brand" href="/index/index">Flitter</a>
        
        <div class="nav-collapse collapse offset1">
          <ul class="nav">

            <!-- Determine which navbar button is highlighted -->
            <?php if (($_SERVER['REQUEST_URI'] == "/index/index") || ($_SERVER['REQUEST_URI'] == "/index")): ?>
              <li class="active">
            <?php else: ?>
              <li>
            <?php endif; ?>
                <a href="/index/index">Home</a>
              </li>

            <?php if($_SERVER['REQUEST_URI'] == "/posts/index"): ?>
              <li class="active">
            <?php else: ?>
              <li>
            <?php endif; ?>
                <a href="/posts/index">Post</a>
              </li>

            <?php if ($_SERVER['REQUEST_URI'] == "/posts/users"): ?>
              <li class="active">
            <?php else: ?>
              <li>
            <?php endif; ?>
                <a href="/posts/users">Users</a>
              </li>

            <!-- Modify the link based on the user_id -->
            <?php if (isset($user->user_id)): ?>

              <?php if ($_SERVER['REQUEST_URI'] == "/users/profile/".$user->user_id): ?>
                <li class="active">
              <?php else: ?>
                <li>
              <?php endif; ?>
                  <a href="/users/profile/<?=$user->user_id?>">Profile</a>

            <?php else: ?>

              <?php if ($_SERVER['REQUEST_URI'] == "/users/profile"): ?>
                <li class="active">
              <?php else: ?>
                <li>
              <?php endif; ?>
                  <a href="/users/profile">Profile</a>
                  
            <?php endif; ?>
              
            </li>

            <li>
              <a href="/users/logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
   </div>
</div>