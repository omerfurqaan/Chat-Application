<?php
$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");

	function search_usr(){
	$i = $_SESSION['User_name'];
		global $con;
	if(isset($_GET['search_btn'])){
		$search_query =$_GET['search_query'];
		$get_user = "select * from request where Receiver = '$i' AND Sender like '%$search_query%'";
		}
		else{
		$get_user = "select * from request where Receiver = '$i'"; 
		
		} 
		$run_user = mysqli_query($con,$get_user);
		
		while($row_user=mysqli_fetch_array($run_user)){
			
		  $user_name = $row_user['Sender'];
		 $run_usr = mysqli_query($con,"select * from users where User_name = '$user_name'");
		$row_usr = mysqli_fetch_array($run_usr);
		
		 $user_profile = $row_usr['User_profile'];
		  $gender = $row_usr['User_gender'];
			$id = $row_usr['User_id'];
		
		
			//now displaying all at once 
			
			echo "
			<div class='card'>
		      <img src='$user_profile'>
		      <h1>$user_name</h1>
		      <p>$gender</p>
		      <form action='p_fun.php' method='post'>
		     <input type='hidden' value='$id' name='id'>
		     <p><button name='add'>Add $user_name</button></p>
		      </form>
		    </div><br><br>
			";
		
		
		}
		
	}
?>