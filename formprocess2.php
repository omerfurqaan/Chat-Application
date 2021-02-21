<?php 
session_start();

$con = mysqli_connect("localhost","root","","demo1");



	if(isset($_POST['login'])){
	
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	$select_user = "select * from users where User_name ='$name' AND User_pass ='$pass'";
	
	$query = mysqli_query($con,$select_user); 
	
	$check_user = mysqli_num_rows($query);
	
	if($check_user==1){
	
	$_SESSION['User_name']=$name;

	$update_msg = mysqli_query($con, "UPDATE log  SET Log_in='Online' WHERE User_name='$name'");

	$user = $_SESSION['User_name'];
	$get_user = "select * from users where User_name='$user'"; 
	$run_user = mysqli_query($con,$get_user);
	$row=mysqli_fetch_array($run_user);
				
	$user_name = $row['User_name'];
	$rec = $row['forgotten_answer'];
	if ($rec == ""){
	echo "<script>alert ('Update your recovery Answer by taping on personal details')</script>";
	echo "<script>window.open('home.php?User_name=$user_name','_self')</script>";
	}else {
	echo "<script>window.open('home.php?User_name=$user_name','_self')</script>";
	}
	}
	else {
	
	echo "<script>alert ('Login failed, Check your username and password!')</script>";
	echo"<script>window.open ('log_in.php','_self')</script>";
	
	
	}
	
	}


?>