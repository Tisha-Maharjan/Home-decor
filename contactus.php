<html>

<head>
  <title>Contact us</title>
  <link rel="icon" src="img/icon.png" />
  <link rel="stylesheet" type="text/css" href="css/home5.css" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css/contact1.css">

</head>

<body style="background-image: url('img/order1.avif'); background-attachment: fixed;
  background-repeat: no-repeat; background-size: cover;">
  <?php
  // session_start();
  include 'header1.php';
?>
  <section class="contact">
    <div class="container">
      <div class="text-center py-5">
        <h2 class="py-3" style="text-align: center">Contact <span> Us </span></h2>
        <div class="mx-auto heading-line"></div>
      </div>


      <div class="main">
        <form class="col-lg-6" style="justify-content:center;" action="" method="POST">
          <div class=" form-group" style="justify-content:center;">
            <label for="email">Email</label>
            <input name="email" id="email" class="form-control" type="email" aria-describedby="emailHint"
              placeholder="Enter email" style="background-color: #D3D3D3;" />
            <!-- <small id="emailHint" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" id="name" class="form-control" type="text" placeholder="Enter name"
              style="background-color: #D3D3D3;" />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="msg" id="message" class="form-control" placeholder="Enter message" rows="5"
              style="background-color: #D3D3D3;"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-lg btn-outline-secondary text-btn"
            style="background-color: #D3D3D3;">
            SUBMIT
          </button>
          <!-- <input type="submit" name="submit" value="Submit"> -->
        </form>
      </div>
    </div>
  </section>

  <?php
  
if(isset($_POST['submit'])){

  //include 'config/include.php';

   $email=$_POST['email'];
   $name=$_POST['name'];
   $msg=$_POST['msg'];

  $sql="INSERT INTO contact(email, name, message)
      VALUES('$email', '$name', '$msg')";
  $result=mysqli_query($conn, $sql);
  
  if($result){
    echo "<script>alert('Message sent!')</script>";
  //     // echo "Data inserted";
  //     header('location:../index1.php');
  }
  //else{
  //     die("Data is not inserted due to ".mysqli_error($conn));
  // }     

}


?>

</body>

</html>