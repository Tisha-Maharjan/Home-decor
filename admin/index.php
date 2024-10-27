<?php
  include('partials/header.php')
?>
<!-- main content Section Starts -->
<div class="main-content">
  <div class="wrapper">
    <h1 style="text-align:center;font-family: Gabriola;">DASHBOARD</h1>
    <br><br>
    <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
        ?>
    <br><br>

    <div class="col-4 text-center">
      <?php
      //sql query
        $sql="SELECT * FROM category";
        //execute query
        $res=mysqli_query($conn, $sql);
        //count rows
        $count=mysqli_num_rows($res);
      ?>

      <h1><?php echo $count; ?></h1>
      <br />
      Categories
    </div>

    <div class="col-4 text-center">
      <?php
      //sql query
        $sql2="SELECT * FROM products";
        //execute query
        $res2=mysqli_query($conn, $sql2);
        //count rows
        $count2=mysqli_num_rows($res2);
      ?>
      <h1><?php echo $count2; ?></h1>
      <br />
      Products
    </div>

    <div class="col-4 text-center">
      <?php
      //sql query
        $sql3="SELECT * FROM orders";
      //execute query
        $res3=mysqli_query($conn, $sql3);
      //count rows
        $count3=mysqli_num_rows($res3);

        //to select from cart_orders
        $sqll="SELECT * FROM cart_orders";
      //execute query
        $ress=mysqli_query($conn, $sqll);
      //count rows
        $countt=mysqli_num_rows($ress);
      ?>
      <h1><?php echo $count3+$countt; ?></h1>
      <br />
      Total Orders
    </div>

    <div class="col-4 text-center">

      <?php
      //create sql query to get total revenue generated
      //aggregate function in sql
        $sql4="SELECT SUM(total) AS Tot FROM orders WHERE status='Delivered'";

      //execute query
        $res4=mysqli_query($conn, $sql4);

      //get value
        $row4=mysqli_fetch_assoc($res4);

      //get total revenue
      $total_revenue=$row4['Tot'];

      $sql5="SELECT SUM(total_price) AS Tota FROM cart_orders WHERE status='Delivered'";

      //execute query
        $res5=mysqli_query($conn, $sql5);

      //get value
        $row5=mysqli_fetch_assoc($res5);

      //get total revenue
      $total_revenue2=$row5['Tota'];
    ?>
      <h1>Rs.<?php echo $total_revenue+$total_revenue2; ?></h1>
      <br />
      Revenue Generated
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- main content Section ends -->