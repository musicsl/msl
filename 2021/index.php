<?php 
    include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        #header{
            margin: 20px;
        }
        button{
            width:100px;
            height:40px;
            margin-bottom: 30px;
        }
        a{
            margin-left: 85%;
        }
    </style>
</head>
<body>

    <div id="header">
        <a href="./login.php"><button id="buttonlogin">login</button></a>
        <hr>
    </div>
    <?php 
        $quary = 'select * from calender';
        $result = mysqli_query($conn, $quary);
        if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { 
                $data[] = $row; 
            } 
        } else { 
            echo "0 results"; }
    ?>

    <?php
    $quary = "select * from calende";
    $data = mysqli_query($conn,$quary);
    ?>

    <?php
    include "calender.php";
    ?>

</body>
</html>