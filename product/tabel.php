<?php

 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "demo";
 
$conn=mysqli_connect($host,$user,$password,$database);

$sql="ALTER TABLE tblproduct
ADD PRIMARY KEY (id),
ADD UNIQUE KEY product_code (code) 
  ";
  if($result=mysqli_query($conn,$sql)){
    echo "alter Created";
  }

?>