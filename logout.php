<?php
    include 'connectioncheck.php';
    $_SESSION['is_authorized']= 0;
    $_SESSION['user_name']="";
    echo '<meta http-equiv="refresh" content="0; URL= /~lebediur/index.php">';
    exit();
    
?>