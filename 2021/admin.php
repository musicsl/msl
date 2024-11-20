<?php 
    session_start();
    include "database.php";

    if($_SESSION['status'] != 1){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <div id="back">
        <a href="javascript:history.back()"> <box-icon name='arrow-back'></box-icon></a>
        <?php include "logout.php"; ?>
    </div>

    <center>
    <div>
        <?php
            echo "<h1>Welcome " .$_SESSION['name'] ."</h1>";
        ?>
    </div>
        <div>
            <a href="./addTimeSlot.php"><button>addTimeSlot</button></a>
            <a href="./updateTimeSlot.php"><button>update</button></a>
            <a href="./history.php"><button>history</button></a>
        </div>
    </center>

    <div>
        <?php
            include "calender.php";
        ?>
    </div>
</body>
</html>

<?php 
