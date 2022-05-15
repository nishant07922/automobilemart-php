
<?php
include('includes/header.php');
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `sellers` WHERE username='$username'
                     AND password='$password' ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        
        $rows = mysqli_num_rows($result);
 
        if ($rows == 1) {
            $_SESSION['username'] = "seller".$username;
            // Redirect to user dashboard page
            header("Location: index_seller.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="form-group"><form class="form-group" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true" required />
        <input type="password" class="form-control" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="btn btn-primary form-control"/>
        <p style="text-align:center"><a href="registration_seller.php">New Registration</a></p>
        <p style="text-align:center"><a href="login.php">Or Login As a User</a></p>
  </form></div>
<?php
    }
include('includes/footer.php');
?>
