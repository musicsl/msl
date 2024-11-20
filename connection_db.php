<?php
    define('HOST' , 'localhost');
    define('PASS', '');
    define('USER' , 'root');
    define('DB', '2020');

    $conn = mysqli_connect(HOST, USER, PASS, DB);
    if(!$conn){
        echo "connection failed";
    }
?>