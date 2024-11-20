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
    <title>update</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        #form{
            margin: 20px;
            padding: 40px;
            border: 1px solid black;
            width:fit-content;
            text-align: left;
        }
        select{
            width:75%;
        }
        input{
            width:70%
        }
    </style>
</head>
<body>
    <div>
        <a href="javascript:history.back()"> <box-icon name='arrow-back'></box-icon></a>
        <?php include "logout.php"; ?>
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
            
            <input type="submit" value="update" name ="update" id="button">
            <input type="submit" value="delete" name ="delete" id="button">
        </form>
        </div>
    </center>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $lecture = $_POST['lecture'];
        $course = $_POST['course'];
        $venue = $_POST['venue'];
        $week = $_POST['week'];
        $level = $_POST['level'];
        $time = $_POST['time'];

        $query = "update `calender` set  `course` = '$course' , `lecture` = '$lecture',`venue` = '$venue' where `week` = '$week' and `level` = '$level' and `time` = '$time'" ;
        $result = mysqli_query($conn,$query);
        if($result){
            echo "sucessfully updated";

            $user = $_SESSION['name'];
            $time = date("H:i:sa"); //current time
            $date = date('Y/m/d');  //current date
            $query = "insert into changes (action,user,date,time,details) values ('value updated','$user','$date','$time','update is made')";
            $result = mysqli_query($conn , $query);
            header("location: admin.php");

        }else{
            echo "failed to update";
        }

    }

    if(isset($_POST['delete'])){
        $week = $_POST['week'];
        $level = $_POST['level'];
        $time = $_POST['time'];

        $query = "delete from calender where week = '$week' and level = '$level' and time = '$time' ";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "sucessfully deleted";

            $user = $_SESSION['name'];
            $time = date("h:i:sa"); //current time
            $date = date('Y/m/d');  //current date
            $query = "insert into changes (action,user,date,time,details) values (' value deleted','$user','$date','$time','delete is made')";
            $result = mysqli_query($conn , $query);

            header("location: admin.php");
        }else{
            echo "failed to delete";
        }
    }

    include 'calender.php';
?>