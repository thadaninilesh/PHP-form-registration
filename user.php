<?php

    
    require_once 'connect.php';

    if(isset($_POST['makeuser']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $college = $_POST['college'];
        require 'connect.php';
        makeuser($name, $email, $mobile, $college);
    }
    if(isset($_POST['viewuser']))
    {
        include 'viewuser.php';
    }
    if(isset($_POST['viewuser1']))
    {
        
        
        $mail = $_POST['email'];
        require 'connect.php';
        viewuser($mail);
    }
    if(isset($_POST['edituser']))
    {
        include 'edituser.php';
    }
    if(isset($_POST['edituser1']))
    {
        $mail = $_POST['email'];
        require 'connect.php';
        edituser($mail);
    }
    if(isset($_POST['edituser2']))
    {
        $iid = $_POST['iid'];
        $iname = $_POST['iname'];
        $iemail = $_POST['iemail'];
        $imobile = $_POST['imobile'];
        $icollege = $_POST['icollege'];
        $edit_query = "UPDATE user SET name='$iname',email='$iemail',mobile='$imobile',college='$icollege' WHERE id='$iid'";
        mysql_query($edit_query);
        echo "Successful editing";
    }
    
    function makeuser($name,$email,$mobile,$college)
    {
        $query = "INSERT INTO user(name,email,mobile,college) VALUES ('$name','$email','$mobile','$college')";
        mysql_query($query);
        echo "Successfull";
    }
    
    function viewuser($email)
    {
        
        $details = "SELECT * FROM user WHERE email='$email'";
        
        $disp = mysql_query($details);
        while($row = mysql_fetch_array($disp))
        {
            echo "Name :{$row['name']}<br>"."Email :{$row['email']}<br>"."College :{$row['college']}<br>"."Mobile :{$row['mobile']}<br>";
        }
    }
    
    function edituser($email)
    {
        
        $details = "SELECT * FROM user WHERE email='$email'";
        
        $editing = mysql_query($details);
        while($row = mysql_fetch_array($editing))
        {
 ?>
            <form action="user.php" method="post">
                ID :<input type="hidden" name="iid" value="<?php echo $row['id']; ?>"><br>
                Name :<input type="text" name="iname" value="<?php echo $row['name']; ?>"><br>
                Email :<input type="text" name="iemail" value="<?php echo $row['email']; ?>"><br>
                College :<input type="text" name="icollege" value="<?php echo $row['college']; ?>"><br>
                Mobile :<input type="text" name="imobile" value="<?php echo $row['mobile']; ?>"><br>
                <input type="submit" name="edituser2" value="Edit your details">
            </form
            <?php
        }
    }
    
?>
