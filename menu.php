<?php
 include('config/include.php');

 $user_id = $_SESSION['user_id'];

 if(isset($_POST['add_to_cart'])){

  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE title = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if(mysqli_num_rows($check_cart_numbers) > 0){
    echo "<script>

      alert('Item already added to cart');
      
      
      </script>";
      
  }else{

      mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, title, price, quantity, image_name) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      // $message[] = 'product added to cart';
      echo "<script>

      alert('Item added to cart');
      
      
      </script>";
  }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../cssf/stylee.css" />
</head>

<body>
  <!-- header section starts here -->
  <header>
    <a href="<?php echo $home; ?>index1.php" class="logo"> <i class="fas fa-utensils"></i>FoodHub</a>

    <div id="menu-bar" class="fas fa-bars"></div>
    <!-- <div class="search-container">
          <form action="">
            <input type="text" placeholder="Search.." name="search" >
            <button type="submit"><i class="fa fa-search"></i>Search</button>
          </form>
        </div> -->

    <nav class="navbar">
      <!-- <a href="#home">home</a> -->
      <a href="<?php echo $home; ?>cart.php">my cart</a>
      <a href="<?php echo $home; ?>index1.php">logout</a>

    </nav>

  </header>
  <!-- header section ends here -->


  <!-- gallery section starts -->
  <section class="gallery" id="gallery">
    <br><br><br><br>
    <div>
      <h1 class="heading">Our Food<span>Gallery</span></h1>
    </div>
    <div class="box-container">
      <?php
     
        
     $sql2="SELECT * FROM products WHERE active='Yes' AND featured='Yes' ";

     $res2=mysqli_query($conn,$sql2);

     $count2=mysqli_num_rows($res2);

     if($count2>0){
       //food available
       while($row=mysqli_fetch_assoc($res2)){

         $id=$row['id'];
         $title=$row['title'];
         $price=$row['price'];
         $description=$row['description'];
         $image_name=$row['image_name'];
         ?>
      <div class="box">
        <span class="price">Rs.<?php echo $price; ?></span>
        <?php
                      //check id image is available or not 
                        if($image_name==""){
                          echo "<div class='error'>Image not available</div>";
                        }else{
                          ?>
        <img src="<?php $home; ?>img/products/<?php echo $image_name; ?>" alt="" />
        <?php
                        }

                      ?>
        <div class="content">
          <h3><?php echo $title; ?></h3>
          <p>
            <?php echo $description; ?>
          </p>
          <a href="<?php echo $home?>order.php?food_id=<?php echo $id;?>" class="btn">Order now</a>

          <form action="" method="POST">

            <input type="hidden" name="product_quantity" value="1" min="0" class="qty">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image_name']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">


          </form>



          <!-- <a href="#" class="btn" value="add to cart" name="add_to_cart">Add to cart</a> -->
        </div>
      </div>
      <?php
            }
                
          

          }else{
            //food not available
            echo "<div class='error'>Food not available</div>";
          }
        
          ?>

    </div>
  </section>
  <!-- gallery section ends -->


  <?php
  include('footer.php');
?>