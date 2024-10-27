<?php

  include 'config/include.php';
  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){

    //get data from login form
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="Select * FROM user WHERE email='$email' AND password='$password'";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
      $rows=mysqli_fetch_assoc($res);
      $_SESSION['user_id']=$rows['id'];
      //user available and login success
      // $_SESSION['login']="<div class='success'></div>";
       $_SESSION['email']=$email; //to check whether the user is logged in or not and logout will unset it


      header('location:index1.php');

    }
    else{
      //user not available
      $_SESSION['login']="<div class='error text-center'>Username or Password not matched.</div>";
      header('location:login.php');
    }


  }

  
?>

<html>

<head>
  <title>Login</title>
  <link rel="icon" src="img/icon.png">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- <script src="validation.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body
  style="background:url('img/c3.jpg'); background-position: center;background-size: 100%;background-repeat: no-repeat;height: 100%">

  <!-- <div class="ii" style="width: 20%;">
    <img class="ml-5" style="margin-top:150px" src="img/registerb.jpg">
  </div> -->
  <div class="ii">
    <div class="ff" style="width: 30%;background-color: #f2f2f2;padding: 50px;margin-top: 200px;margin-left: 500px;">
      <h1 style="text-align:center;font-family: Gabriola;"><b>Login to continue</b></h1>
      <form class="was-validated" method="POST">
        <div class="form-group">
          <label for="email1">Email</label>
          <input type="email" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="email1" name="email"
            placeholder="Enter email" required>

        </div>
        <div class="form-group">
          <label for="pass1">Password</label>
          <input type="password" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="pass1" name="password"
            placeholder="Password" required>

        </div>
        <center><button type="submit" name="submit" class="btn btn-primary">LOGIN</button></center>
      </form>
    </div>
  </div>

</body>

</html>