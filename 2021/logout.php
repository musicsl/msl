<?php 
    //session_start(); // no need cux i include it on other files
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <style>
        #button{
            width: 100px;
            height:30px;   
        }
        #back{
            margin:20px;
        }
        #buttonlogout{
            width: 100px;
            height:30px;
            margin-left:90%;
        }
        body{
            margin-right:50px ;
        }
    </style>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <input type="submit" value="logout" name ="logout" id="buttonlogout">
    </form>
</body>
</html>

<?php 
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: index.php");
    }
?>