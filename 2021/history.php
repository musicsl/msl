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
    <meta name="viewport" content="width=device-widthdevice-width, initial-scale=1.0">
    <title>history</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
        body{
            background-color: #f0f0f0;
            
        }
        #table{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            width:80%;
            margin-top: 30px;
        }
        td{
            width:10%;
            height:50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <a href="javascript:history.back()"> <box-icon name='arrow-back'></box-icon></a>
        <?php include "logout.php"; ?>
    </div>

    <div id="table">
        <?php 
                $query = "select * from changes";
                $result = mysqli_query($conn,$query);
              
                $data = [];
                if(mysqli_num_rows($result) >0){
                    while($row = mysqli_fetch_assoc($result)){
                        $data[] = $row;
                    }
                }
        ?>
        <table border="1">
            <tr>
                <th>Time-Date</th>
                <th>Action</th>
                <th>User</th>
                <th>Details</th>
            </tr>

            <?php foreach ($data as $value): ?>
                <tr>
                    <td> <?php echo $value['date']." ".$value['time'] ?> </td>
                    <td> <?php echo $value['user'] ?> </td>
                    <td> <?php echo $value['action'] ?> </td>
                    <td> <?php echo $value['details'] ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>
</html>