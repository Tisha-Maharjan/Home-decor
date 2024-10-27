<?php
include('partials/header.php');

?>

<div class="main-content">
  <div class="wrapper">

    <br><br>

    <?php
      //get id of selected admin
      $id=$_GET['id'];

      //create sql to get details
      $sqll="Select * FROM tbl_user WHERE id=$id";

      $res=mysqli_query($conn,$sqll);
      
      if($res==TRUE){
        $count=mysqli_num_rows($res);
        if($count==1){
          //get details
          // echo "Admin Available";
          $row=mysqli_fetch_assoc($res);
          $full_name=$row['full_name'];
          $username=$row['username'];
          $dob=$row['dob'];
        }
        else{
          //redirext to manage page
          header('location:'.$home.'admin/manage-user.php');
        }
      }

    ?>

    <form action="" method="POST" class="add">
      <h1 class="h1"><b> Update User </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Full Name</td>
          <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" class="box" required></td>
        </tr>

        <tr>
          <td>Username</td>
          <td><input type="text" name="username" value="<?php echo $username; ?>" class="box" required></td>
        </tr>

        <tr>
          <td>Date of birth</td>
          <td><input type="text" name="dob" value="<?php echo $dob; ?>" class="box" required></td>
        </tr>

        <!-- <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr> -->

        <tr>
          <td colspan="2" style="text-align: center;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update User" class="btn-secondary">
          </td>
        </tr>

      </table>


    </form>
  </div>
</div>

<?php

  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){
    // echo "Button clicked";
    echo $id=$_POST['id'];
    echo $full_name=$_POST['full_name'];
    echo $username=$_POST['username'];
    echo $dob=$_POST['dob'];

    $sql="Update tbl_user SET
    full_name = '$full_name',
    username = '$username',
    dob = '$dob' 
    WHERE id= '$id'
  ";

  // //execute the query
  $res=mysqli_query($conn,$sql);

  if($res==TRUE){
    //echo "Admin update successfully";
    $_SESSION['update']="<div class='success'>User Updated Successfully</div>";
    header('location:'.$home.'admin/manage-user.php');
  }
  else{
    //echo "failed to update admin";
      $_SESSION['update']="<div class='error'>Failed To Update User</div>";
      header("location:".$home.'admin/manage-user.php');
  }
  }

  

?>

<?php
//include('partials/footer.php');

?>