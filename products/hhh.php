<?php




function get_product_desc($pid){
  require('db.php');
  $que = "SELECT p_desc FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   //return $pname =  $row["p_name"];
   //return $pimage=  $row["p_image"];
   return $pdesc =  $row["p_desc"];
   //return $pquant =  $row["p_quant"];
   //return $pavail =  $row["p_avail"];
   //return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}


function get_product_name($pid){
  require('db.php');
  $que = "SELECT p_name FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   return $pname =  $row["p_name"];
   //return $pimage=  $row["p_image"];
   //return $pdesc =  $row["p_desc"];
   //return $pquant =  $row["p_quant"];
   //return $pavail =  $row["p_avail"];
   //return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}

function get_product_image($pid){
  require('db.php');
  $que = "SELECT p_image FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_array()) {
   //return $pname =  $row["p_name"];
   return $pimage=  $row["p_image"];
   //return $pdesc =  $row["p_desc"];
   //return $pquant =  $row["p_quant"];
   //return $pavail =  $row["p_avail"];
   //return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}


function get_product_price($pid){
  require('db.php');
  $que = "SELECT p_price FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   //return $pname =  $row["p_name"];
   //return $pimage=  $row["p_image"];
   //return $pdesc =  $row["p_desc"];
   //return $pquant =  $row["p_quant"];
   //return $pavail =  $row["p_avail"];
   return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}

function get_product_quant($pid){
  require('db.php');
  $que = "SELECT p_quant FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   //return $pname =  $row["p_name"];
   //return $pimage=  $row["p_image"];
   //return $pdesc =  $row["p_desc"];
   return $pquant =  $row["p_quant"];
   //return $pavail =  $row["p_avail"];
   //return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}
function get_product_filename($pid){
  require('db.php');
  $que = "SELECT Filename FROM product WHERE P_id=$pid ";
$result = mysqli_query($con ,$que);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   //return $pname =  $row["p_name"];
   //return $pimage=  $row["p_image"];
   //return $pdesc =  $row["p_desc"];
   return $pquant =  $row["Filename"];
   //return $pavail =  $row["p_avail"];
   //return $pprice =  $row["p_price"];
  }
} else {
  return $pname = "no_result";
}

}


?>