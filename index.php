<?php
include('includes/header.php');
require('db.php');
include('products/hhh.php');

 require("auth_session.php");
 
if(!isset($_SESSION["username"])) {
    echo"<script>
    alert('Login Is Always Nice Option To Optimise User Experience');
    </script>";
};

$status="";
if (isset($_POST['code']) && $_POST['quantity']!=""){
$code = $_POST['code'];
$quant = $_POST["quantity"];
$result = mysqli_query(
$con,
"SELECT * FROM `product` WHERE `P_id`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['p_name'];
$code = $row['P_id'];
$acode = $row['P_id'];
$price = $row['p_price'];


$cartArray = array(
	$acode=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>$quant,
	)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "Product is added to your cart!";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "Product is added to your cart!";
	}

	}
}




echo '
<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">';


          $result = mysqli_query($con,"SELECT * FROM `product`");


          while($row = mysqli_fetch_assoc($result)){



            if ($row["p_quant"]> 0){
  echo'
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
        <img src="images/'.$row["Filename"].'" class="card-img-top" style="height: 225px; width: 100%; display: block;"></img>
          <div class="card-body">
          <form method="post" action="">
          <input type="hidden" name="code" value='.$row["P_id"].' />
          <p class="card-text">'.$row["p_name"].'</p>
          <p class="card-text">$'.$row["p_price"].'</p>
            <p class="card-text">'.$row["p_desc"].'</p>
            
            <input type="number" name="quantity" min=1 max='.$row["p_quant"].' value ="1"/>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              <button type="submit" class="btn btn-sm btn-outline-secondary">Add To Cart</button>
              
              </div>
              
            </div>
            </form>
          </div>
        </div>
      </div>
      ';
            };
  
    };
  

   


   echo '</div>
   </div>
   </div>';
   
   

include('includes/footer.php');
?>