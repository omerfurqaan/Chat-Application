<?php
session_start();

$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");
$hii = $_SESSION['User_name'];
if(isset($_POST['add'])){
        $id=$_POST['id'];
        
        $q= mysqli_query($con,"SELECT * FROM users WHERE User_id= $id")or die(mysqli_error);
        
        $row = mysqli_fetch_array($q);
        
        $uname = $row['User_name'];
        $id =$row['User_id'];



        $mysql= mysqli_query($con,"INSERT INTO $hii (User_id, User_name) VALUES ('$id','$uname')");                                 										
		       $j= mysqli_query($con,"SELECT * FROM users WHERE User_name = '$hii'")or die(mysqli_error);
        
        $rw = mysqli_fetch_array($j);
 $unamee = $rw['User_name'];
    $idd = $rw['User_id'];


$myql= mysqli_query($con,"INSERT INTO $uname (User_id, User_name) VALUES ('$idd','$unamee')");                                 										


$joke = mysqli_query($con,"DELETE FROM request WHERE Receiver = '$hii' AND Sender = '$uname'");

         
    echo "<script>window.open('home.php?User_name=$uname','_self')</script>";
    
    }

?>