<?php
include("db.php");
session_start();
if (isset($_POST['editproduct'])) {
        $productid = $_POST["pid"];
        $pname = stripslashes($_REQUEST['pname']);
        //escapes special characters in a string
        $pname = mysqli_real_escape_string($con, $pname);
        $pdesc    = stripslashes($_REQUEST['pdesc']);
        $pdesc    = mysqli_real_escape_string($con, $pdesc);
        $pprice = stripslashes($_REQUEST['pprice']);
        $pprice = mysqli_real_escape_string($con, $pprice);
	$pquant = stripslashes($_REQUEST['pquant']);
        $pquant = mysqli_real_escape_string($con, $pquant);
       
        $query    = "UPDATE `product` SET `p_name`='$pname',`p_price`='$pprice',`p_desc`='$pdesc',`p_quant`='$pquant' WHERE P_id ='$productid' ";
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
             <p class='link'>Click here to <a href='index_seller.php'>Try Again</a></p>
             </div>";
        }


    };
    ?>