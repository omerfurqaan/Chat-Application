<!DOCTYPE html>
<?php
session_start();
$con = mysqli_connect("localhost","root","","demo1");
if(!isset($_SESSION['User_name'])){
	
	header("location: log_in.php");

}
else{ ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center><a href="find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a></center> 
						  	</div>
				</div>
				<div class="left-chat">
				
					<ul>
						<?php include("get_users_data.php"); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<!-- getting the user information who is logged in -->
					<?php 
						$user = $_SESSION['User_name'];
						$get_user = "select * from users where User_name='$user'"; 
						$run_user = mysqli_query($con,$get_user);
						$row=mysqli_fetch_array($run_user);
									
						$user_id = $row['User_id']; 
						$user_name = $row['User_name'];
					?>

					<!-- getting the user data on which user click -->
					<?php
						if(isset($_GET['User_name'])){

						global $con; 
								
						$get_username = $_GET['User_name'];
									
						$get_user = "select * from users where User_name='$get_username'";
								
						$run_user = mysqli_query($con,$get_user);
						
						$row_user=mysqli_fetch_array($run_user);
						
						$username = $row_user['User_name'];
						$user_profile_image = $row_user['User_profile'];
						}

						$total_messages = "select * from user_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')"; 
						$run_messages = mysqli_query($con,$total_messages); 
						$total = mysqli_num_rows($run_messages);
					?>
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src=<?php echo"$user_profile_image";?>>
						</div>
						<div class="right-header-detail">
							<form method="post">
								<p><?php echo"$username";?></p>
								
								<button name="logout" class="btn btn-danger">Logout</button>
							
								<center><a href="account_settings.php"><button class="btn btn-danger" name="details" type="submit">Personal Details</button></a></center>

							</form>
							<?php
							if (isset($_POST['details'])){
								
								echo"<script>window.open('account_settings.php',' _self')</script>";
								}
								if(isset($_POST['logout'])){
									$update_msg = mysqli_query($con, "UPDATE log SET Log_in='Offline' WHERE User_name='$user_name'");
									session_destroy();
									 echo "<script>window.open('log_in.php','_self')</script>";
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
						<?php

						$update_msg = mysqli_query($con, "UPDATE user_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");

						$sel_msg = "select * from user_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC"; 
						$run_msg = mysqli_query($con,$sel_msg);		
						
						while($row=mysqli_fetch_array($run_msg)){
			
						$sender_username = $row['sender_username'];
						$receiver_username = $row['receiver_username'];
						$msg_content = $row['msg_content'];
						$msg_status = $row['msg_status'];
						$msg_date = $row['msg_date'];

						?>
						<ul>
						<?php

						if($user_name == $sender_username AND $username == $receiver_username){

							echo"
								<li>
									<div class='rightside-right-chat'>
										<span> $user_name <small>$msg_date</small> </span><br><br>
										<p>$msg_content</p>
									</div>
								</li>
							";
						}

						else if($user_name == $receiver_username AND $username == $sender_username){
							echo"
								<li>
									<div class='rightside-left-chat'>
										<span> $username <small>$msg_date</small> </span><br><br>
										<p>$msg_content</p>
									</div>
								</li>

							";
						}


						?>
						</ul>
						<?php

						}

						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 right-chat-textbox">
						<form method="post" >
						<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
						<input autocomplete="off" type="text" id="new" name="msg_content" placeholder="Write your message...">
						<button class="btn" name="submit"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i></button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['submit'])){			
			$msg = $_POST['msg_content'];
				
			if($msg == ""){
				echo"

				<div class='alert alert-danger'>
				  <strong><center>Message was unable to send!</center></strong>
				</div>

				";
			}else if(strlen($msg) > 100){
				echo"

				<div class='alert alert-danger'>
				  <strong><center>Message is Too long! Use only 100 characters</center></strong>
				</div>

				";
			}
			else{
			$insert = "insert into user_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) values ('$user_name','$username','$msg','unread',NOW())";
			
			$run_insert = mysqli_query($con,$insert);
			 echo "<script>window.open('home.php?User_name=$username','_self')</script>";

			}
		}
	?>

	<script>
		$('#scrolling_to_bottom').animate({
		scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
	    	var height = $(window).height();
	    	$('.left-chat').css('height', (height - 92) + 'px');
	    	$('.right-header-contentChat').css('height', (height - 163) + 'px');
	    });
	</script>
</body>
</html>
<?php } ?>