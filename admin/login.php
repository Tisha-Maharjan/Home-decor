<?php
  include ('../config/include.php');
  // include '../header.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="../css/login1.css">
</head>

<body
  style="background:url('../img/c3.jpg'); background-position: center;background-size: 100%;background-repeat: no-repeat;height: 100%">

  <div class="main">
    <div class="form" style="background-color: #f2f2f2;">
      <h1 style="text-align:center;font-family: Gabriola;"><b> Admin Login </b></h1>

      <?php
      if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }

      if(isset($_SESSION['no-login-message']))
      {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
      }
    ?>

      <form action="" method="POST">
        <div>
          <label for="username" style="display: inline-block;
    margin-bottom: 0.5rem;">Username</label>
          <input type="text" name="username" placeholder="Enter username" class="btn-input" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" required>

        </div>
        
        <label for="password" style="display: inline-block;
    margin-bottom: 0.5rem;">Password</label>
        <div>
          <input type="password" name="password" placeholder="Password" class="btn-input" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" required>
        </div>

        <!-- <input type="submit" name="submit" value="Login" class="btnn"> -->
        <center><button type="submit" name="submit" class="btnn">LOGIN</button></center>
      </form>
    </div>
  </div>
</body>

</html>


<?php

  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){

    //get data from login form
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="Select * FROM admin WHERE username='$username' AND password='$password'";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
      //user available and login success
      $_SESSION['login']="<div class='success'></div>";
      $_SESSION['user']=$username; //to check whether the user is logged in or not and logout will unset it


      header('location:'.$home.'admin/');

    }
    else{
      //user not available
      $_SESSION['login']="<div class='error text-center'>Username or Password not matched.</div>";
      header('location:'.$home.'admin/login.php');
    }


  }

?>