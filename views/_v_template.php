<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
                    
    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>
    
</head>

<body>  

    <!-- 
        Show or hide the nav bar.  Based on example from Piazza post #339
        https://piazza.com/class/hktc23zr2apnf?cid=339
    -->
    <?php if(!$hide_navbar): ?>
        <div id='menu'>
            <?=$navbar;?>
        </div>
    <?php endif; ?>

    <?php if(isset($content)) echo $content; ?>
    
    <?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>