<?php 
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }
?>
<style>
    ul {
        list-style: none;
        display: flex;
        flex-direction: row;
        gap: 10px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php if(!isset($_SESSION['username'])){?>
    <ul>
      <li><a href="./?path=home">home</a></li>
      <li><a href="./?path=contact">contact</a></li>
      <li><a href="./?path=login">login</a></li>
      <li><a href="./?path=signup">signup</a></li>
    </ul>
    <?php }else {?>
        <ul>
            <li><a href="./?path=home">dashboard</a></li>
            <li><?php echo $_SESSION['username']?><a href="./logout.php"> logout</a></li>
        </ul>
    <?php }?>