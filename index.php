<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include('header.php');  
    if(isset($_GET['path'])){
        $path  = $_GET['path'];
        if($path === 'home'){
            //
        }else if($path === 'login'){
            include('login.html');
        }else if($path === 'signup'){
            include('signup.html');
        }else if($path==='contact'){
            include('contact.php');
        }
    }
    if(isset($_SESSION['username'])) {
        include('dashbord.php');
    }
    include('footer.php');
?>