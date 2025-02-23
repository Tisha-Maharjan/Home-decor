<?php
  include('partials/header.php');
?>

<div class="main-content">
  <div class="wrapper">
    <!-- <h1>Update Order</h1> -->
    <br><br>

    <?php
    
      if(isset($_GET['id'])){

        $id=$_GET['id'];

        $sql="SELECT * FROM cart_orders WHERE id=$id";

        $res=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($res);

        if($count==1){
          //detail found
          $row=mysqli_fetch_assoc($res);

          $customer_name=$row['name'];
          $customer_contact=$row['number'];
          $customer_address=$row['address'];
          $price=$row['total_price'];
          $status=$row['status'];
          
        }else{
          //not available
          header('location:'.$home.'admin/bulk_order.php');
        }

      }else{

        header('location:'.$home.'admin/bulk_order.php');
      }
    
    ?>

    <form action="" method="POST" class="add">
      <h1 class="h1"><b> Update Order </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Customer Name</td>
          <td>
            <input class="box" type="text" name="customer_name" value="<?php echo $customer_name;?>">
          </td>
        </tr>

        <tr>
          <td>Customer Contact</td>
          <td>
            <input class="box" type="text" name="customer_contact" value="<?php echo $customer_contact;?>">
          </td>
        </tr>

        <tr>
          <td>Customer Address</td>
          <td>
            <input class="box" type="text" name="customer_address" value="<?php echo $customer_address;?>">
          </td>
        </tr>


        <tr>
          <td>Price</td>
          <td class="box">Rs.<?php echo $price;?></td>
        </tr>

        <tr>
          <td>Status</td>
          <td>
            <select name="status">
              <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
              <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
              <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
              <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
            </select>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="price" value="<?php echo $price;?>">

            <input type="submit" name="submit" value="Update Order" class="btn-secondary">
          </td>
        </tr>

      </table>

    </form>


    <?php 
      
        if(isset($_POST['submit'])){
          // echo "clicked";

          $id=$_POST['id'];
          $price=$_POST['price'];
          $status=$_POST['status'];
          $customer_name=$_POST['customer_name'];
          $customer_contact=$_POST['customer_contact'];
          $customer_address=$_POST['customer_address'];

          $sql2="UPDATE cart_orders SET

            total_price=$price,
            status='$status',
            name='$customer_name',
            number='$customer_contact',
            address='$customer_address'
            WHERE id=$id
          ";

          $res2=mysqli_query($conn,$sql2);

          if($res2==TRUE){
            //updated
            $_SESSION['update']="<div class='success'>Order Updated Successfylly.</div>";
            header('location:'.$home.'admin/bulk_order.php');
          }else{
            //failed
            $_SESSION['update']="<div class='error'>Failed to Update Order.</div>";
            header('location:'.$home.'admin/bulk_order.php');

          }

        }

      ?>

  </div>
</div>

<?php
  //include('partials/footer.php')
?>