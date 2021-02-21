<nav class="navbar navbar-expand-sm bg-dark navbar-dark" width ="129px" height ="120px">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- Brand/logo -->
<a class="navbar-nav"href="#">
  <?php 
    $user = $_SESSION['User_name'];
    $get_user = "select * from users where User_name='$user'"; 
    $run_user = mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
          
    $user_name = $row['User_name'];
    echo"<a class=' nav navbar-nav' href='home.php?User_name=$user_name'>Home</a>";
  ?>
</a>
          <ul class = "nav navbar-nav ml-auto ">
             <li><a style="color: white; text-decoration: none;font-size: 15px;" href="account_settings.php">Personal Details</a></li>
</ul>
<ul class = "nav navbar-nav ml-auto">
						<li><a style="color: white; text-decoration: none;font-size: 15px;" href="upload.php">Change Dp</a></li>



</ul>


</nav><br>