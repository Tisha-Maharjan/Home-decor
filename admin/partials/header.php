<?php
include('../config/include.php');
include('logincheck.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin page</title>
  <link rel="stylesheet" href="../css/admin9.css?v=<?php echo time(); ?>" />
</head>

<body>
  <!-- header Section Starts -->
  <div class="menu text-center">
    <div class="header">
      <div class="logo">
        <a href="../admin/index.php">
          <img src="../img/logo.png" width="150px" height="30px" />
        </a>
      </div>
      <div class="main text-center">
        <ul>
          <li><a href="../admin/index.php">Home</a></li>
          <li><a href="manage-admin.php">Admin</a></li>
          <li><a href="manage-user.php">User</a></li>
          <li><a href="manage-category.php">Category</a></li>
          <li><a href="manage-products.php">Products</a></li>
          <li><a href="manage-order.php">Order</a></li>
          <li><a href="bulk_order.php">Bulk orders</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Menu Section ends -->