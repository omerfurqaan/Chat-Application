<?php
session_start();

$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");
if(isset($_POST['add'])){
        $id=$_POST['id'];        

$hii = $_SESSION['User_name'];
       $l = mysqli_query($con, "select * from users where User_id= '$id'");
         $r_l = mysqli_fetch_array($l);
        $idd = $r_l['User_name'];
if ($hii == $idd){
	echo"<script>alert('Cannot Remove Yourself')</script>";
	echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
	}
	else {
	$q= mysqli_query($con,"DELETE FROM $hii WHERE User_id = '$id'")or die(mysqli_error);
$j= mysqli_query($con,"DELETE FROM $idd WHERE User_name = '$hii'")or die(mysqli_error);

echo"<script>alert('Friend Removed')</script>";
    echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
       }     
    }
?>