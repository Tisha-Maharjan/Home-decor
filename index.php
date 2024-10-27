<html>

<head>
  <title>Home</title>
  <link rel="icon" src="img/icon.png" />
  <link rel="stylesheet" type="text/css" href="css/home4.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <link rel="stylesheet" type="text/css" href="css/review1.css" />
  <!-- <link rel="stylesheet" type="text/css" href="css/style2.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>

<body>
  <?php
  
  include 'header.php';
?>
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
        <br>
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
        </button>
      </div>
    </div>

  </section>
  <!-- <h1 id="he1" style="margin-top: 100px" class="col-lg-6">Explore the future of designing</h1><hr> -->

  <section id="category">
    <div style="height:100%; padding: 0px 30px;" class="cate">
      <h1>Our<span>Category</span></h1>
      <?php
    
    //get category title based on category id
    $sql="SELECT * from category WHERE active='Yes'";
  
    //execute query
    $res=mysqli_query($conn, $sql);

    //count rows
    $count=mysqli_num_rows($res);

    //check whether products available or not
    if($count>0){
      //products available
      while($row=mysqli_fetch_assoc($res)){
        //get values
        $id=$row['id'];
        $title=$row['title'];
        $image_name=$row['image_name'];

        ?>
      <a href="login.php">
        <div class="box-3 float-container">

          <?php
        //check whether image is available or not
      if($image_name==""){
        //image not available
        echo "<div class='error'>Image not available</div>";
        
      }
      else{
        //image available
        ?>
          <img src="<?php echo $home; ?>img/category/<?php echo $image_name; ?>" alt="Image"
            class="img-responsive img-curve" />
          <?php
      }
        ?>

          <h3 class="float-text">
            <font color="white"><?php echo $title; ?></font>
          </h3>
        </div>
      </a>

      <?php
    }
    }
  
    else{
    //products not available
    echo "<div class='error'>Categories not added</div>";
    }

    ?>
    </div>
  </section>

  <!-- <div>
    <div id="d1" style="text-align: center; background-image:url(img/b11.jpg); float:left; width: 100%;"
      class="overflow-hidden">
      <a href="login.php" class="animated zoomIn btn btn-outline-warning btn-light btn-lg col-lg-4"
        style="margin-top: 200px;">SHOP NOW</a>
      <h1 id="he2" class="animated slideInRight">
        Welcome to Home Decor
      </h1>
    </div> -->

  <!-- <section class="testimonials">
    <div class="text-center py-5"></div>
  </section> -->

  <!--Review-->

  <div class="review" id="Review">
    <h1>Customer<span>Review</span></h1>

    <div class="review_box">
      <div class="review_card">
        <div class="review_profile">
          <img src="img/review/customer1.jpg" />
        </div>

        <div class="review_text">
          <h2 class="name">Mary Jane</h2>

          <div class="review_icon">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>

          <!-- <div class="review_social">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div> -->

          <p>
            I recently ordered a few pieces of decor for my living room from this website and I couldn't be happier with
            my purchase! The prices were also very reasonable compared to other home
            decor websites I've shopped on. The items I received were even better in person and exceeded my
            expectations. I would highly recommend this website to
            anyone looking for stylish and affordable home decor options.
          </p>
        </div>
      </div>

      <div class="review_card">
        <div class="review_profile">
          <img src="img/review/customer2.jpg" />
        </div>

        <div class="review_text">
          <h2 class="name">Gagan Agrawal</h2>

          <div class="review_icon">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <!-- <i class="fa-solid fa-star"></i> -->
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>

          <!-- <div class="review_social">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div> -->

          <p>
            I just wanted to take a moment to praise this amazing home decor website! I was able to find exactly what I
            was looking for. The customer service team was also very helpful in answering any questions I had. I was
            thrilled to receive my items in perfect condition, and they look even better in my home than I had imagined.
            I would definitely recommend this website to anyone in the market for beautiful, high-quality home decor!
          </p>
        </div>
      </div>

      <div class="review_card">
        <div class="review_profile">
          <img src="img/review/customer3.jpg" />
        </div>

        <div class="review_text">
          <h2 class="name">John Deo</h2>

          <div class="review_icon">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>

          <!-- <div class="review_social">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div> -->

          <p>
            I recently discovered this home decor website and I'm so glad I did! The site has a wide range of stylish
            and affordable products that make it easy to find exactly what you're looking for. The
            checkout process was smooth and hassle-free, and the delivery was prompt. I was thrilled with the items I
            received and can't wait to show them off in my home. I highly recommend this website.
          </p>
        </div>
      </div>

      <div class="review_card">
        <div class="review_profile">
          <img src="img/review/customer4.jpg" />
        </div>

        <div class="review_text">
          <h2 class="name">Sita Thakuri</h2>

          <div class="review_icon">
            <i class="fa-solid fa-star"></i>
            <!-- <i class="fa-solid fa-star"></i> -->
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>

          <!-- <div class="review_social">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i>
          </div> -->

          <p>
            I was pleasantly surprised by the affordable prices. The order process was simple and my items arrived
            quickly and in perfect condition. I was over the moon with the items I received and they have transformed my
            home. I highly recommend this website to anyone looking to add some character and charm to their living
            space.
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br><br>

</body>

</html>

<?php
  
  include 'footer.php';
?>