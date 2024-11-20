<?php 
    include('connection_db.php');
    session_start();
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $type = $_POST['type'];
        $details = $_POST['details'];
        $id = $_SESSION['id'];
        $date = date('Y-m-d');
    }

    $sql = "INSERT INTO `support` (`userId`, `date`, `title`, `type`, `details`)
     VALUES ('$id', '$date', '$title', '$type' ,'$details') ";

    mysqli_query($conn, $sql);

    header('location: dashbord.php');
    //location eka maru karanna
?>
