<?php

include('header1.php');



$user_id = $_SESSION['user_id'];


if(isset($_POST['order'])){

    $name = $_POST['name'];
    $number =  $_POST['number'];
    $email =  $_POST['email'];
    $status="Ordered"; //ordered,ondelivery, delivered, cancelled

    $address = $_POST['address'];
    $order_date=date("Y_m_d h:i:sa");

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['title'].' ('.$cart_item['quantity'].') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(' ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `cart_orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND status = '$status' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'Your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        echo "<script>

                alert('Order placed already!');
      
      
      </script>";
    }else{
        mysqli_query($conn, "INSERT INTO `cart_orders`(user_id, name, number, email, address, total_products, total_price, order_date, status) VALUES('$user_id', '$name', '$number', '$email', '$address', '$total_products', '$cart_total' ,'$order_date', '$status')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        echo "<script>

                alert('Order placed successfully');
               
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
  <title>Checkout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- <link rel="stylesheet" href="../cssf/stylee.css" /> -->
  <link rel="stylesheet" href="css/cart2.css" />
</head>

<body>

  <br>

  <section class="heading">
    <h1>Checkout <span> Order </span></h1>

  </section>

  <section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>
    <p> <?php echo $fetch_cart['title'] ?>
      <span>(<?php echo 'Rs.'.$fetch_cart['price'].'/-'.' x '.$fetch_cart['quantity']  ?>)</span>
    </p>
    <?php
        }
        }else{
            echo '<p class="empty">Your cart is empty</p>';
        }
    ?>
    <div class="grand-total">Grand Total : <span>Rs.<?php echo $grand_total; ?>/-</span></div>
  </section>

  <section class="checkout">

    <form action="" method="POST">

      <h3 style="text-align:center;font-family: Gabriola;">Place Your Order</h3>

      <div class="flex">
        <div class="inputBox">
          <span>Name </span>
          <input type="text" name="name">
        </div>
        <div class="inputBox">
          <span>Number </span>
          <input type="number" name="number" min="0">
        </div>
        <div class="inputBox">
          <span>Email </span>
          <input type="email" name="email">
        </div>

        <div class="inputBox">
          <span>Address </span>
          <input type="text" name="address">
        </div>

      </div>
      <div style="padding-left: 43%;">
        <input type="submit" name="order" value="Buy Now" class="btn">
      </div>

    </form>

  </section>

  <?php @include 'footer.php'; ?>

</body>

</html>