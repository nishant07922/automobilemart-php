<?php

include('includes/header.php');
require('db.php');
//include('products/hhh.php');

    if (isset($_POST["search"])){
        echo '
<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">';
        $se = $_POST["search"];
    $q = "SELECT * FROM product WHERE p_name LIKE '%$se%'";
    $result = mysqli_query($con,$q);
              while($row = mysqli_fetch_assoc($result)){



                if ($row["p_quant"]> 0){
      echo'
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img src="images/'.$row["Filename"].'" class="card-img-top" style="height: 225px; width: 100%; display: block;"></img>
              <div class="card-body">
              <form method="post" action="index.php">
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
    };
include('includes/footer.php');

?>