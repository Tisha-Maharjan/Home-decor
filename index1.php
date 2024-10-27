<html>

<head>
  <title>Home</title>
  <link rel="icon" src="img/icon.png">
  <link rel="stylesheet" type="text/css" href="css/home4.css">
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
  <link rel="stylesheet" href="css/contact.css">
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">

    <?php
  include 'header1.php';  
  $user_id=$_SESSION['user_id'];
  ?>
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

  <section class="home container mb-5">
    <div class="row mt-5">
      <div class="col-lg-6 mt-5 mr-auto">
        <img style="margin-top: 150px" src="img/c1.jpg" class="animated zoomIn img-fluid" />
      </div>
      <div class="col-lg-4 mt-5 my-5 py-5 pt-5 overflow-hidden">
        <h1 style="
              font-size: 55px;
              font-weight: bold;
              text-align: center;
              margin-top: 50px;
              font-family: Gabriola;
            " class="animated slideInLeft ">
          <u>Explore the future of designing</u>
        </h1>

        <p style="font-size: 20px; font-family: Gabriola; text-align:justify" class="animated slideInLeft ">
          Welcome to our home decor website! We are dedicated to providing you with high-quality and stylish products to
          transform your living space into a cozy and inviting home. From furniture to accessories, we have everything
          you need to create the home of your dreams. Our carefully curated selection features a range of designs, so
          you can find the perfect match for your personal style. Browse our collection today and start creating your
          dream home!
        </p>
        <button class="animated zoomIn btn btn-lg btn-secondary">
          <a href="aboutus.php" class="nav-link">
            <font color='white'>Learn more</font>
          </a>
          <!-- Learn more -->
        </button>
        <button class="animated zoomIn btn btn-lg btn-secondary">
          <a href="contactus.php" class="nav-link">
            <font color='white'>Contact us</font>
          </a>
          <!-- Contact us -->
      </div>
    </div>
  </section>
  <!-- <h1 id="he1" style="margin-top: 100px" class="col-lg-6">Explore the future of designing</h1><hr> -->

  <div id="d1" style="text-align: center;" class="overflow-hidden">
    <a href="category.php" class="animated zoomIn btn btn-outline-warning btn-light btn-lg col-lg-4"
      style="margin-top: 200px;">SHOP NOW</a>
    <h1 id="he2" class="animated slideInRight ">Welcome to Home Decor</h1>
  </div>
  <!-- <section class="services">
    <div class="text-center py-5">
      <h2 class="py-3">Services</h2>
      <div class="mx-auto heading-line"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="animated zoomIn delay-2s col-md-4 text-center">
          <i class="fa fa-shopping-bag"></i>
          <h4 class="py-3">Cart</h4>
          <p class="pb-5">Add the best items to your cart.</p>
        </div>
        <div class="animated zoomIn delay-2s col-md-4 text-center">
          <i class="fa fa-shower"></i>
          <h4 class="py-3">Bathroom</h4>
          <p class="pb-5">New arrivals of bathroom hardware are here.</p>
        </div>
        <div class="animated zoomIn delay-2s col-md-4 text-center">
          <i class="fa fa-thumbs-up"></i>
          <h4 class="py-3">Best services</h4>
          <p class="pb-5">Apply for services sitting at home.</p>
        </div>
      </div>
    </div>
  </section> -->
  <?php
  
  include 'footer.php';
?>
</body>

</html>