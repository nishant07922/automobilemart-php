<?php
include('includes/header.php');
require('db.php');
session_start();
if (isset($_POST['editprofile'])) {
    $id = $_POST["id"];
    $name = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $name = mysqli_real_escape_string($con, $name);
    $address    = stripslashes($_REQUEST['address']);
    $address    = mysqli_real_escape_string($con, $address);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
$email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con, $phone);
    $query    = "UPDATE `users` SET `username`='$name',`address`='$address',`password`='$password',`email`='$email' ,`phone`='$phone' WHERE id ='$id' ";
    $result   = mysqli_query($con, $query);
    if ($result) {
        
        header("location:index.php");    
        
    } else {
        echo "<div class='form'>
        <h3>Product is not registered successfully.</h3><br/>
         <p class='link'>Click here to <a href='index_seller.php'>Try Again</a></p>
         </div>";
    }


};


if (isset($_SESSION["username"])){
    $user =$_SESSION["username"];
    $result = mysqli_query($con,"SELECT * FROM `users` WHERE `users`.`username` = '$user' ");
    $row = mysqli_fetch_assoc($result);
    
echo '<div class="form-group">
<form class="form-group" action="" method="post">
<h3 class="login-title">Edit Profile</h3>

<input type="hidden" value ="'.$row["id"].'" name="id" />
<input type="text" class="form-control" name="username" value="'.$row["username"].'"  required />
<textarea name="address" cols="53" rows="5"  required>'.$row["address"].'</textarea>
Password:
<input type="text" class="form-control" name="password" value='.$row["password"].' min="1" required />
Email:
<input type="text" class="form-control" name="email" value='.$row["email"].' min="1" required />
Phone:
<input type="number" class="form-control" name="phone" value='.$row["phone"].' min="1" required />

<input type="submit" name="editprofile" value="Edit" class="btn-lg btn-primary">

</form>
</div>';




};
include('includes/footer.php');
?>