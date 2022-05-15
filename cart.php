<?php
include('includes/header.php');
require('db.php');
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      
      }		
}
};
if (isset($_POST["cartremove"])){
  unset($_SESSION["shopping_cart"]);
};

if (isset($_POST["checkout"]) && isset($_SESSION['username'])){
  foreach ($_SESSION["shopping_cart"] as $product){
    $cartquant = $product["quantity"];
      $cartpid = $product["code"];
      $osql = "SELECT  `p_quant` FROM `product` WHERE P_id='$cartpid' ";
      $result = mysqli_query($con,$osql);
      $row = mysqli_fetch_assoc($result);
      $quantity =  $row['p_quant'];
      $lastquantity = $quantity-$cartquant;
      
      $sql = "UPDATE `product` SET `p_quant` = '$lastquantity' WHERE `product`.`P_id` = $cartpid";
      $gg = mysqli_query($con,$sql);
      if (isset($gg)){
        header("Location: index.php");
      };
  };
  
};


?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>

<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>

<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<?php echo $product["quantity"]; ?>


</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
<tr>
<td colspan="5" align="right">
<form action="" method="post" >
  <input type="submit" value ="Remove Cart" name ="cartremove"></input>
</form>
</td>
</tr>
</tbody>
</table>		
<div>
<form action="" method ="post">
<input type="submit" value ="Checkout" class="btn btn-primary text-center" style ="float:right"name ="checkout"></input>
</form>
</div>  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<?php
include('includes/footer.php');
?>