<?php include("connection_db.php")?>
<h1>Contact Us</h1>
<form action="" method="post">
    Name:
    <input type="text" name="name"><br><br>
    Email:
    <input type="email" name="email"><br><br>
    Subject:
    <input type="text" name="subject"><br><br>
    Message:
    <input type="text" name="message"><br><br>
    
    <input name="submit" type="submit" value="Send">
</form>

<?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $sql = "INSERT INTO contact (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";
            mysqli_query($conn, $sql);
        }
    }
?>
    