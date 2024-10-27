<?php
  session_start();

  $home="http://localhost/Home-decor/";
  $hostname="localhost";
  $username="root";
  $password="";
  $db="homedecor";

  $conn=mysqli_connect($hostname,$username,$password,$db);
  if(!$conn){
    die ("Error: could not connect".mysqli_connect_error())."<br>";
  }
?>