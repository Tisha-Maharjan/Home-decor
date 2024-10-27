<?php
include ('include.php');

$sql="CREATE TABLE products(
  id int NOT NULL AUTO_INCREMENT,
  title varchar(150),
  description varchar(255),
  price decimal(10,2),
  image_name varchar(255),
  category_id int(10),
  featured varchar(10),
  active varchar(10),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>