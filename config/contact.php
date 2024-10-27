<?php
include ('include.php');

$sql="CREATE TABLE contact(
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100),
  name varchar(100),
  message varchar(255),
  PRIMARY KEY (id)
  )";

if(mysqli_query($conn,$sql)){
  echo "Table created"."<br>";
}else{
  die ("Error creating table".mysqli_error($link));
}

$conn -> close();
?>