<?php
    include('connection_db.php');
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
    $role = 'us';

    echo "$fname";

    $sql = "INSERT INTO `users` (`full_name`, `email`, `gender`, `address`, `mobile`, `password`, `role`) 
        VALUES ('$fname', '$email', '$gender', '$address', '$tel', '$password', '$role')";


    
    mysqli_query($conn, $sql);
    header('location: ./?path=login');
?>