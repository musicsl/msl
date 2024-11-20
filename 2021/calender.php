<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calender</title>
    <style>
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
        #lastupdate{
            
            margin-left: 70%;
        }
    </style>
</head>
<body>
    <?php
        $query = 'select * from calender';
        $result = mysqli_query($conn , $query);
        $level = [];
        if($result){
            while($row = $result->fetch_assoc()){
                $level[] = $row;
            }
        }
    ?>
<div id="table">
        <table border="1">
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>

            <?php
                for($i=08.00; $i <= 16.00; $i++){
                    ?>
                    <tr>
                        <td> <?php echo "$i.00" ?> </td>
                        <td>
                            <?php  
                                $time = $i;
                                include "tableData.php";
                            ?>
                        </td>
                    </tr>
                <?php } ?>
        </table>
    </div>

    <div id="lastupdate">
        <?php
            $quary = "select date , max(time) as time from changes where date=(select max(date) from changes )";
            $result = mysqli_query($conn,$quary);
            $row = $result->fetch_assoc();
            echo "Last updated: @ ".$row['time']." on ".$row['date'] ;
        ?>
    </div>
</body>
</html>