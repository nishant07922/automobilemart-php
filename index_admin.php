<?php
include('includes/header_admin.php');
require('db.php');
 require("auth_session.php");

 if(isset($_SESSION["username"]) &&$_SESSION["username"] == "admin"){
    

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
          <form method="post" action="edit.php">
          <input type="hidden" name="pid" value='.$row["P_id"].' />
          <p class="card-text">'.$row["p_name"].'</p>
          <p class="card-text">$'.$row["p_price"].'</p>
          <p class="card-text">'.$row["p_quant"].'</p>
            <p class="card-text">'.$row["p_desc"].'</p>
            
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              <input type="submit" value="Edit" class="btn btn-sm btn-outline-secondary" name ="edit" />
              <input type="submit" value="Delete" class="btn btn-sm btn-outline-secondary" name ="delete" />
              
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


header("Location: login.php");
   include('includes/footer.php');
 ?>