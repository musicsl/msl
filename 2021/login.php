<?php 
    session_start();
    include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        #form{
            margin: 20px;
            padding: 40px;
            border: 1px solid black;
            width:fit-content;
            text-align: left;
        }
    </style>
</head>
<body>
    <div>
        <a href="javascript:history.back()"> <box-icon name='arrow-back'></box-icon></a>
    </div>

    <center>
        <div id="form">
            <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
                Name:
                <input type="text" name="name" required>
                <br>
                <br>
                Password:
                <input type="password" name="password" required>
                <br>
                <br>
                <input type="submit" value="Login">
                <br>
                <a href="./create.php">create a account</a>
                
            </form>
        </div>
    </center>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $user = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['password']);

    $result = mysqli_query($conn, "select * from user where name ='$user';");
    $row = mysqli_fetch_object($result);
    //echo mysqli_num_rows($result);
    echo "<br>";
    if(mysqli_num_rows($result) > 0){
        if(password_verify($_POST['password'],$row->password)){
            echo "login success";
            $_SESSION['name'] = $user;
            $_SESSION['password'] = $pass;
            $_SESSION['status'] = $row->status;
            header("Location: ./admin.php");
        }else{
            echo "invalid password"; 
        }
    }else{
        echo "Invalid user!";
    }
    //password check
}
