<?php
  include('partials/header.php');
?>

<div class="main-content">
  <div class="wrapper">
    <!-- <h1>Manage Order</h1> -->
    <br>
    <br>
    <br>

    <?php
        
          if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
        ?>
    <br><br>

    <table class="tbl-full">
      <tr>
        <th colspan="10" style="text-align:left;">Manage Bulk Orders</th>
      </tr>
      <tr>
        <th class="text-center">S.N</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Contact</th>
        <th class="text-center">Email</th>
        <th class="text-center">Address</th>
        <th class="text-center">Products</th>
        <th class="text-center">Price</th>
        <th class="text-center">Order Date</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>

      <?php
          
            $sql="SELECT * FROM cart_orders ORDER BY id DESC";

            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            $sn=1;

            if($count>0){

              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $customer_name=$row['name'];
                $number=$row['number'];
                $customer_email=$row['email'];
                $customer_address=$row['address'];
                $food=$row['total_products'];
                $price=$row['total_price'];
                $order_date=$row['order_date'];
                $status=$row['status'];
                
                
                
                ?>
      <tr class="container hover">
        <td class="text-center"><?php echo $sn++; ?></td>
        <td class="text-center"><?php echo $customer_name; ?></td>
        <td class="text-center"><?php echo $number; ?></td>
        <td class="text-center"><?php echo $customer_email; ?></td>
        <td class="text-center"><?php echo $customer_address; ?></td>
        <td class="text-center"><?php echo $food; ?></td>
        <td class="text-center"><?php echo $price; ?></td>
        <td class="text-center"><?php echo $order_date; ?></td>
        <td class="text-center">
          <?php 
                      //ordered,on delivery,delivered,canceled
                        if($status=="Ordered"){
                          echo "<label style='color: blue;'>$status</label>";
                        }
                        elseif($status=="On Delivery"){
                          echo "<label style='color: orange;'>$status</label>";
                        }

                        elseif($status=="Delivered"){
                          echo "<label style='color: green;'>$status</label>";
                        }

                        elseif($status=="Cancelled"){
                          echo "<label style='color: red;'>$status</label>";
                        }

                      ?>

        </td>

        <td>
          <a href="<?php echo $home; ?>admin/bulk_update.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
        </td>
      </tr>


      <?php
              }

            }else{

              echo"<tr>
                    <td colspan='12' class='error'>Order Not Placed Yet</td>
                  </tr>";

            }

          ?>


    </table>

  </div>

</div>

<?php
  //include('partials/footer.php')
?>