<?php
  include('partials/header.php');
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>

    <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      }
    ?>

    <form action="" method="POST" class="add">
      <h1 class="h1"><b> Change Password </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Current Password</td>
          <td>
            <input type="password" name="current_password" placeholder="Current Password" class="box" required>
          </td>
        </tr>

        <!-- <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr> -->

        <tr>
          <td>New Password</td>
          <td>
            <input type="password" name="new_password" placeholder="New Password" class="box" required>
          </td>
        </tr>

        <!-- <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr> -->

        <tr>
          <td>Confirm Password</td>
          <td>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="box" required>
          </td>
        </tr>

        <tr>
          <td colspan="2" style="text-align: center;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
          </td>
        </tr>

      </table>
    </form>
  </div>
</div>

<?php
  if(isset($_POST['submit'])){

    $id=$_POST['id'];
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];

    $sql="Select *FROM admin WHERE id=$id AND password='$current_password'";

    $res=mysqli_query($conn,$sql);

    if($res==TRUE){

      $count=mysqli_num_rows($res);

      if($count==1){
        //fine
        // echo "User Found";
        if($new_password==$confirm_password){

          // echo "Password matched.";
          $sqll="Update admin SET 
            password='$new_password'
            WHERE id=$id
          ";

          $ress=mysqli_query($conn,$sqll);

          if($res==TRUE){
            $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully .</div>";
            header("location:".$home.'admin/manage-admin.php');

          }else{
            $_SESSION['change-pwd']="<div class='error'>Failed To Change Password.</div>";
            header("location:".$home.'admin/manage-admin.php');
          }


        }else{
          $_SESSION['pwd-not-matched']="<div class='error'>Password Did Not Match.</div>";
          header("location:".$home.'admin/manage-admin.php');
        }


      }else{
        //error
        $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
        header("location:".$home.'admin/manage-admin.php');
      }


    }

  }

?>

<?php
  //include('partials/footer.php');
?>