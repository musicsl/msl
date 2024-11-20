<?php 
    include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

<div>
    <a href="javascript:history.back()"> <box-icon name='arrow-back'></box-icon></a>
</div>
<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
        Name:
        <input type="text" name="name" required>
        <br>
        <br>
        Password:
        <input type="password" name="password" required>
        <br>
        <br>
        Reenter Password:
        <input type="password" name="repassword" required>
        <br>
        <br>
        <input type="submit" value="create">
        <br>
        <a href="./login.php">have a account</a>
        
    </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['password']);
    $repass = htmlspecialchars($_POST['repassword']);

    $quary = "select name from user where name='$user'";
    $duplicateUser = mysqli_query($conn,$quary);
    $duplicate = mysqli_fetch_assoc($duplicateUser);
    if($duplicate['name']){
        echo "user already exist";
    }
    else if($pass == $repass){
        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $quary = "insert into user (name , password) values('$user' , '$pass')";
        $add = mysqli_query($conn,$quary);
        header("location: login.php");
    }else{
        echo "password not match";
    }

}