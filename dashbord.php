<?php include('header.php') ?>
<?php include('connection_db.php') ?>
<h1>Uoj startup Incubation Center</h1>
<div>
    <ul>
        <li><a href="./?action=call">call for support</a></li>
        <li><a href="./?action=proc">project details</a></li>
        <li><a href="./?action=prof">profile</a></li>
    </ul>

</div>

<?php if(isset($_GET['action'])){
    if($_GET['action']=='call'){
        if($_SESSION['role'] === 'us'){
            ?>     
            <h1>need a support</h1>
            <form action="technical_sub.php" method="POST">
                Title:
                <input type="text" name="title"><br><br>
                Type:
                <select name="type" id="">
                    <option value="technical support">Technichal Support</option>
                    <option value="financial support">Financial Support</option>
                    <option value="material support">Material Support</option>
                    <option value="marketing support">Marketing Support</option>
                </select><br><br>
                Details:
                <textarea name="details" id=""></textarea>
                <input type="submit" value="submit" name="submit">
            </form>
            <?php 
        }else{
            $sql = "SELECT * FROM support";
            $result = mysqli_query($conn, $sql);
            ?> 
                <h1>View support Calls</h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>From</th>
                            <th>Title</th>
                            <th>Support Type</th>
                            <th>Action</th>
                        </tr>                        
                    </thead>
                    <tbody>
                    <?php
                        while($row=mysqli_fetch_assoc($result)){
                            $id=$row['userID'];
                            $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
                            $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                            ?>
                                <tr>
                                    <td><?php echo $row['date']?></td>
                                    <td><?php echo $row2['full_name']?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['type']?></td>
                                    <td>action</td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            <?php
        }
    }else if($_GET['action'] == 'proc'){
        if($_SESSION['role'] === 'us'){
        ?>
            <form action="" method="post">
                Project Title:
                <input type="text" name="project_title" id=""><br><br>
                Write about your idea:
                <input type="text" name="idea"><br><br>
                Upload your buisness model image:
                <input type="file"><br><br>
                <input type="submit" value="submit">
            </form>
        <?php
    }else{
        ?> <h1>Welcome to Uoj Startup incubation center</h1><?php
    }}else if($_GET['action']== 'prof'){
        $id  = $_SESSION['id'];
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <h1>Edit Profile</h1>
        <form action="updateData.php" method="POST">
            Full name:
            <input type="text" name="fname" id="" value="<?php echo $row['full_name']?>">
            <br>
            Email:
            <input type="email" name="email" id="" value="<?php echo $row['email'] ?>">
            <br>
            Gender:
            <select name="gender" id="">
                <option value="male" <?php ($row['gender']=='male')?"selected":""?>>Male</option>
                <option value="female" <?php ($row['gender']=='female')?"selected":""?>>Female</option>
            </select>
            <br>
            Address:
            <input type="text" name="address" id="" value="<?php echo $row['address'] ?>"><br>
            Mobile:
            <input type="text" name="mobile" id="" value="<?php echo $row['mobile'] ?>">
            <br>
            <input type="submit" value="Update" name="update">
        </form>
        <br><br>
        <h1>change password</h1>
        <form action="change_pw.php" method="post">
            current_pw:
            <input type="password" name="curr_pw">
            <br>
            new_password:
            <input type="password" name="new_pw1">
            <br>
            cufirm:
            <input type="password" name="new_pw2">
            <br>
            <input type="submit" value="change" name="pw_change">
        </form>

        <?php
    }     
    ?>
<?php }?>
<?php include('footer.php') ?>