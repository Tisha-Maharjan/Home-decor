<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
// alert('successfully');{}
{
  // Swal.fire(
  //   'Sign up',
  //   'successfully',
  //   'success'
  // )
}
</script>
<html>

<head>
  <title>Register</title>
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
  style="background:url('img/registerbb.jpg');background-repeat: no-repeat;background-size: 100%;background-position: center;height: 100%;width: 100%;">


  </div>
  <div class="ii">
    <div class="ff" style="width: 30%;background-color: #f2f2f2;padding: 50px;margin-top: 125px;margin-left: 550px;">
      <h1 style="text-align:center;font-family: Gabriola;"><b>Register Here</b></h1>
      <form class="was-validated" method="POST" action="register.php">
        <div class="form-group">
          <label for="email1">Email</label>
          <input type="email" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="email1" name="email"
            placeholder="Enter email" required="">

        </div>
        <div class="form-group">
          <label for="pass1">Password</label>
          <input type="password" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="pass1" name="password"
            placeholder="Password" required>

        </div>
        <div class="form-group">
          <label for="pass1">Phone No.</label>
          <input type="text" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="pass2" name="phone"
            placeholder="Phone No." required>

        </div>
        <div class="form-group">
          <label for="pass1">Address</label>
          <input type="text" style="border:0; outline: 0;
  background: transparent;border-bottom: 1px solid black;" class="form-control" id="pass3" name="address"
            placeholder="Address" required>

        </div>

        <center><button type="submit" class="btn btn-primary" name="submit">SIGN UP</button></center>
      </form>
    </div>
  </div>

</body>

</html>

<?php
if(isset($_POST['submit'])){

  include 'config/include.php';

  $email=$_POST['email'];
  $password=$_POST['password'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];

  $sql="Insert into user(email, password, phone, address)
      VALUES('$email', '$password', '$phone', '$address')";
  $result=mysqli_query($conn, $sql);
  if($result){
      // echo "Data inserted";
      header('location:login.php');
  }
  else{
      die("Data is not inserted due to ".mysqli_error($conn));
  }     

}
?>