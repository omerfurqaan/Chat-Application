<?php
$con = mysqli_connect("localhost","root","","demo1");
$usr= $_SESSION['User_name'];
	$user = "select * from $usr JOIN log using(User_name) JOIN users using(User_name)";
			
	$run_user = mysqli_query($con,$user);
			
	while ($row_user=mysqli_fetch_array($run_user) ){
			
	$user_id = $row_user['User_id'];
	$user_name = $row_user['User_name'];
	$user_profile = $row_user['User_profile'];
	$login = $row_user['Log_in'];
	
	echo"
	<li>
		<div class='chat-left-img'>
			<img src='$user_profile'>
		</div>
		<div class='chat-left-detail'>
			<p><a href='home.php?User_name=$user_name'>$user_name</a></p>";
			if($login == 'Online'){
			echo "<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
			}else{
			echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
			}

			"
		</div>
	</li>

	";
	}
?>			