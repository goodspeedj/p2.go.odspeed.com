<!DOCTYPE html>
<html>
<head>
  <title><?php if(isset($title)) echo $title; ?></title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.min.css"> 
  <link rel="stylesheet" type="text/css" href="/css/p2-main.css">               

  <!-- Controller Specific JS/CSS -->
  <?php if(isset($client_files_head)) echo $client_files_head; ?>
  
</head>

<body class="background-img">  

  <!-- 
    Show or hide the nav bar.  Based on example from Piazza post #339
    https://piazza.com/class/hktc23zr2apnf?cid=339
  -->
  <?php if(!$hide_navbar): ?>
    <?=$navbar;?>
  <?php endif; ?>

  <!-- Display main content -->
  <div class="container">
    <div class="row">
    <div class="span3"></div>
      <div class="span6 pagination-centered">
        <?php if(isset($content)) echo $content; ?>
        <?php if(isset($client_files_body)) echo $client_files_body; ?>
      </div>
      <div class="span3"></div>
    </div>
    
  </div>

  <div class="footer navbar navbar-fixed-bottom">
    James Goodspeed - jgoodsp@fas.harvard.edu - CSCI E-15 - Project #2
  </div>
  
  <script src="/js/jquery-2.0.3.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>