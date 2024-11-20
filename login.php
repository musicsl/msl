<?php
    session_start();
    include('connection_db.php');
   $name=$_POST['name'];
   $password = $_POST['password'];

   $sql="SELECT * FROM users WHERE email = '$name'";

   $result=mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if($password === $row['password']){
            $_SESSION['username'] = $name;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            header('location: ./dashbord.php');
        }else{
            ?>
                <script>
                    alert('password is incorrect');
                    window.location.href="./?path=login"
                </script>
            <?php
        }
   }else {
    ?>
    <script>
        alert('Username Not found');
        window.location.href = "./?path=login"; 
    </script>
    <?php 
   }



?>