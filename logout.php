<?php 
    header( "refresh:3;url=index.php" );
    include ('include.php');
    if( isset( $_COOKIE[ session_name() ])){
        setcookie( session_name(), '', time()-86400, '/'); 
    }

    session_unset();
    
    session_destroy();
    
    echo "<div class='container' style='margin-top: 80px;text-align: center;'><div class='alert alert-danger'><a class='close' data-dismiss='alert'>&times;</a>You have been logged out!<br>You will be redirect to Home page in 3sec.</div></div>";

    
?>
