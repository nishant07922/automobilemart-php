<?php
include('includes/header_seller.php');
require('db.php');
include('auth_session.php');
include ('getsellerid.php');

?>
<div class="form-group">
<form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" >
<h3 class="login-title">Add Products</h3>
<input type="text" class="form-control" name="pname" placeholder="Product Name" required />
<textarea name="pdesc" cols="53" rows="5" placeholder="Product Description" required></textarea>
<input type="number" class="form-control" name="pprice" placeholder="Product Price" min="1" required />
<input type="number" class="form-control" name="pquant" placeholder="Product Quantity" min="1" required />
<input type="file" name="uploadfile" value=""/>
<input type="submit" name="addproduct" value="Add Product" class="btn-lg btn-primary">

</form>
</div>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted
    if (isset($_POST['addproduct'])) {

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];	
            $folder = "images/".$filename;
            move_uploaded_file($tempname, $folder);

        $pname = stripslashes($_REQUEST['pname']);
        //escapes special characters in a string
        $pname = mysqli_real_escape_string($con, $pname);
        $pdesc    = stripslashes($_REQUEST['pdesc']);
        $pdesc    = mysqli_real_escape_string($con, $pdesc);
        $pprice = stripslashes($_REQUEST['pprice']);
        $pprice = mysqli_real_escape_string($con, $pprice);
	$pquant = stripslashes($_REQUEST['pquant']);
        $pquant = mysqli_real_escape_string($con, $pquant);
        $sellerid = getsellerid();
        $query    = "INSERT into `product` ( `p_name`,`Filename`, `p_price`, `p_desc`, `p_quant`,  `id`)
                     VALUES ('$pname','$filename', '$pprice','$pdesc','$pquant', '$sellerid')";
        $result   = mysqli_query($con, $query);
        
        if ($result) {
            if($_SESSION["username"] == "admin"){
                header("Location: index_admin.php");
            }
            else {
               
                header("location:index_seller.php");
                
            }
           
        } else {
            echo "<div class='form'>
            <h3>Product is not registered successfully.</h3><br/>
             <p class='link'>Click here to <a href='addproducts.php'>Try Again</a></p>
             </div>";
        }


    } 
        
    
  }



include('includes/footer.php');
?>