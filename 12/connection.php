<?php
    $con = mysqli_connect("localhost", "root", "", "learn");
    //Check connection
    if(mysqli_connect_errno()){
        echo "Failed to connect:".mysqli_connect_errno();
    }
?>