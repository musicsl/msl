<?php 
    session_start();
    include('connection_db.php');
    if(isset($_POST['update'])){
        $id = $_SESSION['id'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];

        $sql = "UPDATE `users` SET `full_name`='$fname',`email`='$email',`gender`='$gender',`address`='$address',`mobile`='$mobile' WHERE `id`='$id'";

        
        mysqli_query($conn, $sql);
        header("location: dashbord.php");
    }

?>