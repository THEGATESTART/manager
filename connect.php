<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "lazader";

    $con = mysqli_connect($hostName, $username, $password, $dbName);

    if (!$con) {
        header("location:error.php");
        exit();
    }

    mysqli_query($con,"SET NAMES UTF8");

?>