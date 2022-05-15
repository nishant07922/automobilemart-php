
<?php
include('includes/header.php');
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
	$phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `sellers` (username, password, email,phone,address, create_datetime)
                     VALUES ('$username', '$password', '$email','$phone','$address', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login_seller.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="form-group"><form class="form-group" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="form-control" name="username" placeholder="Username" required />
        <input type="email" class="form-control" name="email" placeholder="Email Adress" required />
        <input type="password" class="form-control" name="password" placeholder="Password" required />
        <input type="tel" maxlength="10" minlength="10" class="form-control" name="phone" placeholder="PhoneNo" required />
<textarea name="address" cols="53" rows="5" placeholder="Address" required></textarea>
        <input type="submit" name="submit" value="Register" class="btn btn-primary">
        <p class="link"><a href="login_seller.php">Click to Login</a></p>
    </form>
</div>
<?php
    }
include('includes/footer.php');
?>
