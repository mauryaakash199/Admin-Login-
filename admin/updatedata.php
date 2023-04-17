<?php
 // connection database
 include('../dbcon.php');

 $rollno=  $_POST['rollno'];
 $name= $_POST['name'];
 $city= $_POST['city'];
 $pcon= $_POST['pcon'];
 $std= $_POST['std'];
 $id=$_POST['sid'];
 $imagename= $_FILES['simg']['name'];
 $tempname = $_FILES['simg']['tmp_name'];

 move_uploaded_file($tempname,"../dataimg/$imagename");
 // student insert query
 $query="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcont` = '$pcon', `standerd` = '$std', `image` = '$imagename' WHERE `id` = $id;";

 $run= mysqli_query($con,$query);
 if($run == true)
 {
     ?>
     <script>
        alert('Data Update Successfully...!');
       
        window.open('updateform.php?sid=<?php echo $id;?>','_self');  
     </script>
     <?php
 }
?>