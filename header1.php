<?php
  include 'config/include.php';
  $user_id = $_SESSION['user_id'];
?>
<html>

<head>
  <title>Home</title>
  <link rel="icon" src="img/icon.png">
  <link rel="stylesheet" type="text/css" href="css/home5.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
    <!-- Brand -->
    <a class="navbar-brand" href="index1.php">
      <img src="img/logo.png" width="150px" height="30px" />
    </a>

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
      <a class="nav-link" href="category.php" id="navbardrop">

        Category
      </a>

      <li class="nav-item dropdown">
        <a class="nav-link" href="cart.php" id="navbardrop">
          My Cart
        </a>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="contactus.php" id="navbardrop"> Contact us </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" style="color: #ffd9b3; font-weight: bolder;" href="register.php">Welcome&nbsp</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: #ffd9b3; font-weight: bolder;"
          href="login.php"><?php echo ($_SESSION['email']);?></a>
      </li>
      <li class="nav-item">
        <p style="margin-top: 7px; color: grey">,</p>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: gray; font-weight: bolder;" href="index.php">Logout</a>
      </li>
    </ul>
  </nav>
</body>

</html>