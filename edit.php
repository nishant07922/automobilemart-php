<?php
include('includes/header_seller.php');
require('db.php');
session_start();

if(isset($_POST["edit"]) or isset($_POST["delete"])){
   global $proid ;
   $proid =  $_POST["pid"];
};




        
    
  

if (isset($_POST["delete"])){
    $sql = "DELETE FROM `product` WHERE `product`.`P_id` = ".$proid."";
    mysqli_query($con,$sql);
    echo $_SESSION["username"];
    if($_SESSION["username"] == "admin"){
        header("Location: index_admin.php");
    }
    else {
        header("location:index_seller.php");
    }
    
};

if (isset($_POST["edit"])){
    $result = mysqli_query($con,"SELECT * FROM `product` WHERE `product`.`P_id` = ".$proid."");
    $row = mysqli_fetch_assoc($result);
    
echo '<div class="form-group">
<form class="form-group" action="editproduct.php" method="post">
<h3 class="login-title">Edit Products</h3>

<input type="hidden" value ="'.$proid.'" name="pid" />
<input type="text" class="form-control" name="pname" value="'.$row["p_name"].'"  required />
<textarea name="pdesc" cols="53" rows="5"  required>'.$row["p_desc"].'</textarea>
Price:
<input type="number" class="form-control" name="pprice" value='.$row["p_price"].' min="1" required />
Quantity:
<input type="number" class="form-control" name="pquant" value='.$row["p_quant"].' min="1" required />

<input type="submit" name="editproduct" value="Edit Product" class="btn-lg btn-primary">

</form>
</div>';




};
include('includes/footer.php');
?>