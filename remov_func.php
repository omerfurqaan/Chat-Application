<?php
$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");
$i = $_SESSION['User_name'];
	function search_us(){
	
		global $con;
		global $i;
	if(isset($_GET['search_btn'])){
		
		$search_query = $_GET['search_query'];
		$get_user = "select * from $i JOIN users using(User_name) where User_name like '%$search_query%'";
		}
		else {
			$j = $_SESSION['User_name'];
		$get_user = "select * from $j JOIN users using(User_name) ";
		} 
		$run_user = mysqli_query($con,$get_user);
		
		while($row_user=mysqli_fetch_array($run_user)){
			
	  $user_name = $row_user['User_name'];
		 $user_profile = $row_user['User_profile'];
		  $gender = $row_user['User_gender'];
			$id = $row_user['User_id'];
		
			//now displaying all at once 
			
			echo "
			<div class='card'>
		      <img src='$user_profile'>
		      <h1>$user_name</h1>
		      <p>$gender</p>
		      <form action='remdb.php' method='post'>
		     <input type='hidden' value='$id' name='id'>
		     <p><button name='add'>Remove $user_name</button></p>
		      </form>
		    </div><br><br>
			";
		}		
	}
?>