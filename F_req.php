<!DOCTYPE html>
<?php
session_start();
include("f_r_fun.php");

if(!isset($_SESSION['User_name'])){
  
  header("location: log_in.php");

}
else { ?>
<html>
<head>
  <title>Friend Requests</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="req.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Back -->
  <a class="navbar-nav" href="#">
    <?php 
      $user = $_SESSION['User_name'];
      $get_user = "select * from users where User_name='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
            
      $user_name = $row['User_name'];
      echo"<a class='navbar-brand mr-auto' href='home.php?User_name=$user_name'>Home</a>";
    ?>
  </a>
</nav><br>
<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
<form class="search_form" action="">
      <input type="text" placeholder="Search Friends" autocomplete="off" name="search_query" required>
      <button class="fa fa-search" type="submit" name="search_btn"></button>
    </form>
    </div>
    <div class="col-sm-4">
    </div>
</div><br><br>
<?php search_usr();?>
</body>
</html>
<?php } ?>