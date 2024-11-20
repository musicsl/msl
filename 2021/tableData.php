<?php
    foreach ($level as $data){
        if($data['week'] == "Monday" && $data['time']==$time){
            echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";  
        }
    }
    ?>
    </td>

    <td>
        <?php 
        foreach ($level as $data){
            if($data['week'] == "Tuesday" && $data['time']==$time){
                echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";  
            }
        }
    ?>
    </td>

    <td>
        <?php 
        foreach ($level as $data){
            if($data['week'] == "Wednesday" && $data['time']==$time){
                echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";  
            }
        }
    ?>
    </td>

    <td>
        <?php 
        foreach ($level as $data){
            if($data['week'] == "Thursday" && $data['time']==$time){
                echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";    
            }
        }
    ?>
    </td>

    <td>
        <?php 
        foreach ($level as $data){
            if($data['week'] == "Friday" && $data['time']==$time){
                echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";   
            }
        }
    ?>
    </td>

    <td>
        <?php 
        foreach ($level as $data){
            if($data['week'] == "Saturday" && $data['time']==$time){
                echo $data['level']." ".$data['course']." ".$data['lecture']."<br>";   
            }
        }
?>