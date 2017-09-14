<?php
    $server = "localhost";
    $uname="root";
    $pword="1234";
    $db="webd";
    $con=mysqli_connect($server,$uname,$pword,$db);
    if(!$con){
      die( "Connection failed : ".mysqli_connect_error() );
    }
?>
