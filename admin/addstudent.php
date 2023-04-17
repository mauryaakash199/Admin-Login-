<?php
session_start();

    if(isset($_SESSION['uid']))
    
    {
        echo " ";
    }
    else
    {
        header('location: ../login.php');
    }
   
?>
<?php
include('header.php');
include('titlehead.php');

?>
<div class="addstudent">
<form action="addstudent.php" method="POST" enctype="multipart/form-data">
    <table style="width:30%" align="center" border="2">
        <tr>
            <th>Roll No</th>
            <td><input type="text" name="rollno" placeholder="Enter Rollno" required></td>
        </tr>

        <tr>
            <th>Full Name</th>
            <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
        </tr>

        <tr>
            <th>City</th>
            <td><input type="text" name="city" placeholder="Enter City" required></td>
        </tr>

        <tr>
            <th>Parents Contact No.</th>
            <td><input type="text" name="pcon" placeholder="Enter the Contact no of Parents" required></td>
        </tr>

        <tr>
            <th>Standerd</th>
            <td><input type="number" name="std" placeholder="Enter Standerd" required></td>
        </tr>

        <tr>
            <th>Image</th>
            <td><input type="file" name="simg" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Submit">
                
            </td>
        </tr>
        </div>
    </table>
</form>
 <!-- Open body tag in header.php -->
</body>  
<!-- Open body tag in header.php -->
</html>  

<?php

    if(isset($_POST['submit']))
    {
        // connection database
        include('../dbcon.php');

        $rollno=  $_POST['rollno'];
        $name= $_POST['name'];
        $city= $_POST['city'];
        $pcon= $_POST['pcon'];
        $std= $_POST['std'];
        $imagename= $_FILES['simg']['name'];
        $tempname = $_FILES['simg']['tmp_name'];

        move_uploaded_file($tempname,"../dataimg/$imagename");
        // student insert query
        $query="INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standerd`, `image`) 
        VALUES ('NULL','$rollno',' $name','$city','$pcon','$std','$imagename')";

        $run= mysqli_query($con,$query);
        if($run == true)
        {
            ?>
            <script>
                alert('Data Inserted Successfully...!');
            </script>
            <?php
        }

    }




?>
