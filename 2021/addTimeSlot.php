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
    <title>add</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        select{
            width:75%;
        }
        input{
            width:70%
        }
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
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="Week">Week:</label>
            <select name="week" id="" required>
                <option value="">Select</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
            <br>
            <br>

            <label for="time">Time:</label>
            <select name="time" id="" required>
                <option value="">Select</option>
                <option value="08.00">08.00</option>
                <option value="09.00">09.00</option>
                <option value="10.00">10.00</option>
                <option value="11.00">11.00</option>
                <option value="12.00">12.00</option>
                <option value="13.00">13.00</option>
                <option value="14.00">14.00</option>
                <option value="15.00">15.00</option>
                <option value="16.00">16.00</option>
            </select>
            <br>
            <br>

            <label for="level">level:</label>
            <select name="level" id="" required>
                <option value="">Select</option>
                <option value="1S">1S</option>
                <option value="2S">2S</option>
                <option value="3S">3S</option>
                <option value="4S">4S</option>
            </select>
            <br>
            <br>

            <lable for="course">Course :</lable>
            <input type="text" name="course" required>
            <br>
            <br>

            <label for="lecture">lecture:</label>
            <select name="lecture" id="" required>
                <option value="">Select</option>
                <option value="KS">KS</option>
                <option value="MS">MS </option>
                <option value="NR">NR</option>
                <option value="ML">ML</option>
            </select>
            <br>
            <br>

            <lable for="venue">Venue :</lable>
            <input type="text" name="venue" required>
            <br>
            <br>

            <input type="submit" value="Add" name ="add" id="button">
        </form>
        </div>
    </center>
</body>
</html>

<?php
if(isset($_POST['add'])){

    $week = $_POST['week'];
    $time = $_POST['time'];
    $course = $_POST['course'];
    $lecture = $_POST['lecture'];
    $venue = $_POST['venue'];
    $level = $_POST['level'];

    $quary = "insert into calender (week,time,course,lecture,venue,level) values ('$week','$time','$course','$lecture','$venue','$level')";
    $result = mysqli_query($conn , $quary);
    
    if($result){
        echo "data inserted";
    }else{
        echo "data not inserted";
    }

    //$user = $_SESSION['user'];
    $user = $_SESSION['name'];
    $time = date("H:i:sa"); //current time
    $date = date('Y/m/d');  //current date

    $query = "insert into changes (action,user,date,time,details) values ('new value added','$user','$date','$time','change is made')";
    $result = mysqli_query($conn , $query);
    
    if($result){
        echo "changes inserted";
        header("location: admin.php");
    }else{
        echo "changes not inserted" . mysqli_error($conn);
    }
}

?>