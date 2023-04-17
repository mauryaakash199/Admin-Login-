<?php
z
include('dbcon.php');

if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    
    $query="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $run=mysqli_query($con,$query);
    $row = mysqli_num_rows($run);  # check for the number of row 
   
    if($row <1)
    {    
        ?>
        <script>
        alert('Username or Password not match...!');
        window.open('login.php','_self');  
        </script>
        <?php
    }
    else
    {
        $data=mysqli_fetch_assoc($run);

        $id=$data['id'];
        // echo"id=".$id;
        
        session_start();
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');

    }
}


?>

