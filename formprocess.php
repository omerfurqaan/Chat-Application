<?php
$mysqli = mysqli_connect("localhost", "root" ,"","demo1") or die(mysqli_error($mysqli));



if(isset($_POST['reg'])){
    $uname = $_POST['User_name'];
$naam= "select  * from users where User_name ='$uname'";
$naa = mysqli_query($mysqli, $naam);
$check=mysqli_num_rows($naa);
if ($check==1){
	echo"<script>alert ('Username  $uname already exists, try again with another name')</script>";
	}



	 $email = $_POST ['User_email'];
	
$check_email = "select * from users where User_email='$email'";
$run_email = mysqli_query ($mysqli, $check_email);
$check = mysqli_num_rows ($run_email);
if ($check==1){
echo"<script>alert ('Email $email already exists,Try again with another email')</script>";
}

	 $no = $_POST['User_number'];

	$check_num="select * from users where User_number ='$no'";
	$run_num =mysqli_query($mysqli, $check_num);
	$check= mysqli_num_rows($run_num);
 if ($check==1) {
		echo"<script>alert ('Your number $no already exists, try again with another number')</script>";
		}
	

	
	
	 $gend = $_POST['User_gender'];
	
	if ($gend == 'Male')
		$profile_pic = "Male.jpg";
		else if($gend == 'Female')
			$profile_pic = "Female.jpg";
			else {
			$profile_pic = "index.jpg";
			}
	
	
	
	
	
    $pswd = $_POST['User_pass'];

    		
					$sql = "CREATE TABLE $uname(
		User_id int(8) NOT NULL,
		User_name varchar(100),
		PRIMARY KEY (User_id),
		UNIQUE (User_name)
		)";
$create_table = mysqli_query($mysqli,$sql);





    $insert ="INSERT INTO users(User_name, User_email, User_profile, User_number, User_gender, User_pass) VALUES('$uname', '$email', '$profile_pic', '$no', '$gend', '$pswd')";
    $query = mysqli_query($mysqli, $insert);
    $log = mysqli_query($mysqli,"INSERT INTO log (User_name) VALUES ('$uname')");
		if($query){
					echo"<script>alert ('congratulations  $uname, your account has been created successfully')</script>";
			
					$gt_user = "select * from users where User_name='$uname'"; 
	$run_user = mysqli_query($mysqli,$gt_user);
	$row=mysqli_fetch_array($run_user);
					$id = $row['User_id'];
					
					 $insrt ="INSERT INTO $uname (User_id, User_name) VALUES('$id','$uname')";
               $query = mysqli_query($mysqli, $insrt);
					echo"<script>window.open ('log_in.php','_self')</script>";
					}
					
		
					
					
				else {
				echo "<script>alert ('Registration failed, please try again ')</script>";
				echo"<script>window.open ('log_in.php','_self')</script>";
		   		}
				

   

}
?>




