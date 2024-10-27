<?php
 include('header1.php');

 $user_id = $_SESSION['user_id'];

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
};

if(isset($_POST['update_quantity'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
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
  <!-- <link rel="stylesheet" href="../cssf/stylee.css" /> -->
  <link rel="stylesheet" href="css/cart2.css" />
</head>

<body>

  <br>
  <section class="heading">
    <br><br>
    <h1>My <span> Cart</span></h1>
  </section>

  <section class="shopping-cart">

    <div class="box-container1">

      <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>
      <div class="box">
        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times"
          onclick="return confirm('delete this from cart?');"></a>
        <img src="img/products/<?php echo $fetch_cart['image_name']; ?>" alt="" class="image">
        <div class="name"><?php echo $fetch_cart['title']; ?></div>
        <div class="price">Rs.<?php echo $fetch_cart['price']; ?>/-</div>
        <form action="" method="post">
          <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
          <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
          <input type="submit" value="Update" class="btn" name="update_quantity" style="text-decoration: underline;">
        </form>
        <div class="sub-total"> Sub-total :
          <span>Rs.<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span>
        </div>
      </div>
      <?php
    $grand_total += $sub_total;
        }
    }else{
        echo '<p class="empty">Your cart is empty</p>';
    }
    ?>
    </div>

    <div class="more-btn">
      <a href="cart.php?delete_all" class="btn <?php echo ($grand_total > 1)?'':'disabled' ?>"
        onclick="return confirm('Delete all from cart?');">Delete All</a>
    </div>

    <div class="cart-total">
      <p>Grand Total : <span>Rs.<?php echo $grand_total; ?>/-</span></p>
      <a href="category.php" class="option-btn">Continue Shopping</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="checkout.php" class="btn  <?php echo ($grand_total > 1)?'':'disabled' ?>">Proceed To Checkout</a>
    </div>

  </section>





  <?php
  include('footer.php');
?>


</body>

</html>