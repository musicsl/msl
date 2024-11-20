<?php 
    session_start();
    include('connection_db.php');
    $id = $_SESSION['id'];
    if(isset($_POST['pw_change'])){
        $curr_pw = $_POST['curr_pw'];
        $new_pw1 = $_POST['new_pw1'];
        $new_pw2 = $_POST['new_pw2'];

        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        if($row['password'] == $curr_pw && $new_pw1 == $new_pw2){
            $sqlq = "UPDATE `users` SET `password`='$new_pw1' WHERE `id` = '$id'";
            mysqli_query($conn, $sqlq);
            ?> <script>alert("password successfuly change")</script><?php
           header("location: dashbord.php");
        }else{  
            ?> <script>alert("password not match")</script><?php
            header("location: logout.php");
        }
    }

?>