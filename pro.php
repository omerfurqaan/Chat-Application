<?php
session_start();

$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");
$hii = $_SESSION['User_name'];
if(isset($_POST['add'])){
        $id=$_POST['id'];
        
        $q= mysqli_query($con,"SELECT * FROM users WHERE User_id= $id")or die(mysqli_error);
        
        $row = mysqli_fetch_array($q);
       $uname = $row['User_name'];
$z = mysqli_query($con,"select * from $hii where User_name = '$uname'");
$zow = mysqli_fetch_array($z);
$zz = $zow['User_name'];

      $naam= "select  * from request where Receiver='$uname' AND Sender ='$hii'";
$naa = mysqli_query($con, $naam);
$check=mysqli_num_rows($naa);

$nm= "select  * from request where Sender ='$uname' AND Receiver ='$hii'";
$na = mysqli_query($con, $nm);
$chck=mysqli_num_rows($na);



if ($check==1){
	echo"<script>alert ('Request already sent to  $uname')</script>";
	echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
	}
else if ($uname == $hii){
	echo"<script>alert (' you cannot Add yourself')</script>";
	echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
	}
else if ($uname == $zz){
	echo"<script>alert ('Already a Friend')</script>";
	echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
	} 
	else if ($chck == 1){
		echo"<script>alert ('go to friend request to add $uname')</script>";
	echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
		}
else {$mysql= mysqli_query($con,"INSERT INTO request (Sender, Receiver) VALUES ('$hii','$uname')");
    echo "<script>alert ('Request sent to $uname')</script>";
			echo "<script>window.open('home.php?User_name=$hii','_self')</script>";
    }
}
?>
