<?php


function getsellerid (){
require('db.php');

$username = substr($_SESSION['username'],6 );
$que = "SELECT id FROM sellers WHERE username =('$username')";
$result = mysqli_query($con ,$que) or die($con->error);
 while($row = $result->fetch_assoc()){;
 $sellerid = $row['id'];};
 return $sellerid;
 };


 


 
 ?>