<?php
$con = mysqli_connect("localhost","root","","demo1") or die("Connection was not established");
$u = $_SESSION['User_name'];
	function search_user(){
		
		global $con;
		global $u;
		
		if(isset($_GET['search_btn'])){
		$search_query =$_GET['search_query'];
		$get_user = "select * from users where User_name like '%$search_query%'";
		}
		else{
		$get_user = "select * from users where User_name NOT LIKE '$u' ORDER BY User_id  DESC LIMIT 15"; 
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
		      <form action='pro.php' method='post'>
		     <input type='hidden' value='$id' name='id'>
		     <p><button name='add'>Add $user_name</button></p>
		      </form>
		    </div><br><br>
			";
		
		
		}
		
	}
?>