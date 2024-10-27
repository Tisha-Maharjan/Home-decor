<?php
  include('partials/header.php')
?>

<!-- main content Section Starts -->
<div class="main-content">
  <div class="wrapper">

    <?php
          
          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

          if(isset($_SESSION['user-not-found']))
          {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
          }
          
        ?>

    <!-- <br><br><br> -->

    <!-- button to add admin -->
    <!-- <a href="add-admin.php" class="btn-primary add-button">Add Admin </a> -->
    <br>
    <br>
    <br>

    <div>
      <table class='tbl-full'>
        <tr>
          <th colspan="4" style="text-align:left;">Manage User</th>
        </tr>
        <tr>
          <th>S.N</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Date of birth</th>
          <th>Actions</th>
        </tr>
        <?php
            $sql="Select * FROM tbl_user";

            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
              $count=mysqli_num_rows($res);
              $sn=1; //create a variable and assign the value

              if($count>0){


                while($rows=mysqli_fetch_assoc($res)){
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
                  $dob=$rows['dob'];
                  ?>
        <tr class="container hover">
          <td><?php echo $sn++; ?>.</td>
          <td><?php echo $full_name; ?></td>
          <td><?php echo $username; ?></td>
          <td><?php echo $dob; ?></td>
          <td style="text-align: center;">
            <!-- <a href="<?php echo $home;?>admin/update-password.php?id=<?php //echo $id; ?>" class="btn-primary">Change
               Password</a> -->
            <a href="<?php echo $home;?>admin/update-user.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update
              User</a>
            <a href="<?php echo $home;?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete
              User</a>
          </td>
        <tr>
          <?php
                  
                }
              }
              else{

                //
            }

            }
              
          ?>
      </table>
    </div>
  </div>
</div>
<!-- main content Section ends -->

<?php
  //include('partials/footer.php')
?>