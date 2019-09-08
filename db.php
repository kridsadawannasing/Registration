<?php
    $con = mysqli_connect("localhost", "root", "", "register");

    if(mysqli_connect_error())
    {
        echo "Connection error!!!" . mysqli_connect_error();
    }
?>