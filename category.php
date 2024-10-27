<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- Important to make website responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home decor</title>

  <!-- Link our CSS file -->
  <!-- <link rel="stylesheet" href="css/style1.css" /> -->
  <link rel="stylesheet" href="css/home4.css" />
  <link rel="stylesheet" href="css/cate3.css" />
  <link rel="stylesheet" href="css/style3.css" />
</head>

<body>
  <!-- Navbar Section Starts Here -->

  <?php
      include 'header1.php';
      $user_id = $_SESSION['user_id'];
      // include 'config/include.php';
    ?>

  <!-- Navbar Section Ends Here -->

  <!-- CAtegories Section Starts Here -->
  <section class="categories">

    <div class="gallary" id="Gallary">
      <h1>Our<span>Category</span></h1>
      <div class="gallary_image_box">

        <?php
      
      $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3 ";

          $res=mysqli_query($conn,$sql);

          $count=mysqli_num_rows($res);

          if($count>0){
            // echo "category available";
            while($row=mysqli_fetch_assoc($res)){

              $id=$row['id'];
              $title=$row['title'];
              $image_name=$row['image_name'];
              ?>


        <div class="gallary_image">
          <?php
                      //check id image is available or not 
                        if($image_name==""){
                          echo "<div class='error'>Image not available</div>";
                        }else{
                          ?>

          <img src="<?php $home; ?>img/category/<?php echo $image_name; ?>" alt="hhlh"
            class="img-responsive img-curve" />

          <?php
                        }

                      ?>


          <h3><?php echo $title; ?></h3>

          <a href="<?php echo $home?>decor.php?category_id=<?php echo $id;?>" class="gallary_btn">See more</a>
        </div>



        <?php

            }

          }else{
            //food not available
            echo "<div class='error'>Product not available</div>";
          }
        
        ?>


      </div>

    </div>

  </section>

  <br><br><br><br><br>
  <!-- Categories Section Ends Here -->

  <!-- social Section Starts Here -->
  <!-- <section class="social">
    <div class="container text-center">
      <ul>
        <li>
          <a href="https://www.facebook.com"><img src="images/fb.png" /></a>
        </li>
        <li>
          <a href="https://www.instagram.com"><img src="images/ins.png" /></a>
        </li>
        <li>
          <a href="https://twitter.com"><img src="images/twi.png" /></a>
        </li>
      </ul>
    </div>
  </section> -->
  <!-- social Section Ends Here -->

  <!-- footer Section Starts Here -->
  <?php
  include 'footer.php';
?>
  <!-- footer Section Ends Here -->
</body>

</html>