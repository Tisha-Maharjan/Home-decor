<?php
include('partials/header.php');
// include '../config/include.php';
?>

<div class="main-content">
  <div class="wrapper">

    <br><br>
    <?php
      if(isset($_SESSION['add'])){//check sesson set or not
        echo $_SESSION['add'];//display meassage
        unset($_SESSION['add']);//remove message
      }
    ?>

    <form action="" method="POST" class="add">
      <h1 class="h1"><b> Admin Login </b></h1>
      <table class="tbl-30">
        <tr>
          <td>Name</td>
          <td><input type="text" name="full_name" placeholder="Enter name" class="box" required></td>
        </tr>

        <!-- <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr> -->

        <tr>
          <td>Username</td>
          <td><input type="text" name="username" placeholder="Username" class="box" required></td>
        </tr>

        <!-- <tr>
          <td rowspan="2" colspan="2"></td>
        </tr>
        <tr>
          <td rowspan="2" colspan="2"></td>
        </tr> -->

        <tr>
          <td>Password</td>
          <td><input type="password" name="password" placeholder="Password" class="box" required></td>
        </tr>
        <!-- <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr> -->

        <tr>
          <td colspan="2" style="text-align: center;">
            <input type="submit" name="submit" value="Add admin" class="btn-secondary" style="text-align: center;">
          </td>
        </tr>

      </table>

    </form>
  </div>
</div>

<?php
// include('partials/footer.php');
?>


<?php
   if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="INSERT INTO admin(full_name,username,password)
      values('$full_name','$username','$password')
    ";

    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
    if($res==TRUE){
      // echo "data inserted";
      $_SESSION['add']="<div class='success'>Admin Added Successfully</div>";
      header('location:'.$home.'admin/manage-admin.php');
    }else{
      // echo "error";
      $_SESSION['add']="<div class='error'>Failed to add Admin</div>";
      header("location:".$home.'admin/add-admin.php');
    }
   }
   
   

?>