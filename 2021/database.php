<?php

    $host="localhost";
    $user="root";
    $pass="";
    $db="timetable";

    $conn = mysqli_connect($host,$user,$pass,$db);

    if(mysqli_connect_errno()){
        echo "Fail to connect";
    }

    date_default_timezone_set("Asia/colombo");