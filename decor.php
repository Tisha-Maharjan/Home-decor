<?php
  
  include 'header1.php';
  // include 'config/include.php';
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
<html>

<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/cate4.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
</head>

<body>


  <?php


//check if id is passed or not
if(isset($_GET['category_id'])){

    $category_id=$_GET['category_id'];

    $sql="SELECT title FROM category WHERE id=$category_id";

    $res=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($res);

    $category_title=$row['title'];

}else{

  header("location:".$home);
}
?>
  <div class="menu" id="Menu">
    <a href="category.php" style="text-decoration: none; color:black;">
      <h1>Our<span>Products</span></h1>
    </a>
    <div class="menu_box">
      <?php
     
        
          $sql2="SELECT * FROM products WHERE category_id=$category_id";

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


      <div class="menu_card">
        <div class="menu_image">
          <?php
                      //check id image is available or not 
                        if($image_name==""){
                          echo "<div class='error'>Image not available</div>";
                        }else{
                          ?>

          <img src="<?php $home; ?>img/products/<?php echo $image_name; ?>" alt="Image"
            class="img-responsive img-curve" />

          <?php
                        }

                      ?>
        </div>



        <div class="menu_info">
          <div class="text">
            <h2><?php echo $title; ?></h2>
            <h3>Rs.<?php echo $price; ?></h3>
          </div>
          <!-- <div class="menu_icon">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div> -->
          <div class="buyadd">
            <div class="buy">
              <a href="<?php echo $home?>order.php?food_id=<?php echo $id;?>" class="menu_btn">Buy Now</a>
            </div>

            <div class="addtocart">
              <form action="" method="POST">

                <input type="hidden" name="product_quantity" value="1" min="0" class="qty">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['image_name']; ?>">
                <input type="submit" value="Add To Cart" name="add_to_cart" class="btnn">

              </form>
            </div>
          </div>
        </div>
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
</body>

</html>