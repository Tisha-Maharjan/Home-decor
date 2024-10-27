<?php
  // include ('config/include.php');
  include 'header1.php';
  $user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Decor Website</title>

  <!-- Link our CSS file -->
  <link rel="stylesheet" href="css/stylee.css" />

</head>

<!-- <body style="background-image: url('img/order1.avif'); background-attachment: fixed;
  background-repeat: no-repeat; background-size: cover;"> -->

<body>
  <?php
  //check whether food id is set or not
  if(isset($_GET['food_id'])){
    //get id and detail of food
    $food_id=$_GET['food_id'];

    //get details
    $sql="SELECT * FROM products WHERE id=$food_id";

    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count>0){

      $row=mysqli_fetch_assoc($res);
      $title=$row['title'];
      $price=$row['price'];
      $image=$row['image_name'];


    }else{
      //food not available and send to home pahe
      header('location:'.$home."decor.php");

    }


  }else{

    header('location:'.$home."decor.php");
  }

?>

  <!-- fOOD sEARCH Section Starts Here -->
  <section class="food-search">
    <div class="container">
      <h2 class="text-center " style="color:black;">
        Fill this form to confirm your order
      </h2>

      <form action="" class="order" method="POST">
        <fieldset>
          <legend>Selected item</legend>

          <div class="food-menu-img">
            <?php
                //check id image is available or not 
                if($image==""){
                  echo "<div class='error'>Image not available</div>";
                }else{
                  ?>

            <img src="<?php $home; ?>img/products/<?php echo $image; ?>" alt="" class="img-responsive img-curve" />

            <?php
                }
              
              ?>
          </div>

          <div class="food-menu-desc">
            <h3><?php echo $title; ?></h3>
            <input type="hidden" name="food" value="<?php echo $title; ?>">

            <p class="food-price">Rs.<?php echo $price; ?></p>

            <input type="hidden" name="price" value="<?php echo $price; ?>">

            <div class="order-label">Quantity</div>
            <input type="number" name="qty" class="input-responsive" value="1" required />
          </div>
        </fieldset>

        <fieldset>
          <legend>Delivery Details</legend>
          <div class="order-label">Full Name</div>
          <input type="text" name="full-name" class="input-responsive" required />

          <div class="order-label">Phone Number</div>
          <input type="tel" name="contact" class="input-responsive" required />

          <div class="order-label">Email</div>
          <input type="email" name="email" class="input-responsive" required />

          <div class="order-label">Address</div>
          <textarea name="address" rows="10" class="input-responsive" required></textarea>
          <div style="padding-left: 40%;">
            <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" />
          </div>
        </fieldset>
      </form>

      <?php

          if(isset($_POST['submit'])){
            //get detail from form
            $food=$_POST['food'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];

            $total=$price*$qty;

            $order_date=date("Y_m_d h:i:sa");//order date
            $status="Ordered"; //ordered,ondelevery, delivered, cancelled

            $customer_name=$_POST['full-name'];
            $customer_contact=$_POST['contact'];
            $customer_email=$_POST['email'];
            $customer_address=$_POST['address'];

            //save order in databse
            $sql2="INSERT INTO orders(product,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address)
                VALUES('$food',$price,$qty,$total,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')        
            ";

            // echo $sql2; die();

            $res2=mysqli_query($conn,$sql2);

            if($res2==TRUE){
              //order saved
              $_SESSION['order']="<div class='success text-center'>Ordered Successfully</div>";
              // header("location:".$home."index1.php");
              echo "<script>alert('Order sent!'); 
              window.location.href='category.php';</script>";
            }else{
              //save order
              $_SESSION['order']="<div class='error text-center'>Failed to Order</div>";
              header("location:".$home."order.php");
              
            }
          }

        ?>

    </div>
  </section>
  <!-- fOOD sEARCH Section Ends Here -->