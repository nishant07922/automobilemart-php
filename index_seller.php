<?php
include('includes/header_seller.php');
require('db.php');
include('products/hhh.php');

include('getsellerid.php');
 require("auth_session.php");
 if(!isset($_SESSION["username"])) {
    header("Location:login_seller.php");
}
else{
// all the contents shouls be here
echo '
<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">';
          $s_id = getsellerid();
          $que = "SELECT `P_id` FROM `product` WHERE id = '$s_id'";
    $result = mysqli_query($con ,$que) or die($con->error);
    while($row = $result->fetch_row()){;
        foreach ($row as $n){
          echo '<div class="col-md-4">
          <div class="card mb-4 box-shadow">
          <img src="images/'.get_product_filename($n).'" class="card-img-top" style="height: 225px; width: 100%; display: block;"></img>

            <div class="card-body">
            
            <p class="card-text">'.get_product_name($n).'</p>
            <p class="card-text">$'.get_product_price($n).'</p>
            <p class="card-text">Quantity: '.get_product_quant($n).'</p>
              <p class="card-text">'.get_product_desc($n).'</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form action ="edit.php" method ="post">
                <input type="hidden" value="'.$n.'" name="pid" />
                <input type="submit" value="Edit" class="btn btn-sm btn-outline-secondary" name ="edit" />
                <input type="submit" value="Delete" class="btn btn-sm btn-outline-secondary" name ="delete" />
                </form>
                  </div>
                
              </div>
            </div>
          </div>
          </div>
          ';
        };
    };



echo '</div>
   </div>
   </div>';




};
include('includes/footer.php');
 ?>