<div class="cart">
<?php
session_start();
require('db.php');

if(isset($_POST["deleteuser"])){
$uid = $_POST["uid"];
mysqli_query($con,"DELETE FROM `users` WHERE `users`.`id` = $uid");
};

if($_SESSION["username"] == "admin"){
include('includes/header_admin.php');


$result = mysqli_query($con,"SELECT * FROM `users`");

?>	
<table class="table">
<tbody>
<tr>

<td>USER ID</td>
<td>USERNAME</td>
<td>USER EMAIL</td>
<td>USER PASSWORD</td>
<td>USER PHONE</td>
<td>USER ADDRESS</td>
<td>DELETE</td>
</tr>	
<?php		
while ($row = mysqli_fetch_assoc($result)){

?>
<tr>

<td><?php echo $row["id"]; ?>
</td>
<td>
<?php echo $row["username"]; ?>
</td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["password"] ?></td>
<td><?php echo $row["phone"] ?></td>
<td><?php echo $row["address"] ?></td>
<td><form action="" method="post">
  <input type="hidden" value = "<?php echo $row["id"]; ?>" name ="uid">
  <input type="submit" value="Delete" name ="deleteuser" >
</form></td>
</tr>



<?php }; ?>

</tbody>
</table>		
<?php
};
include('includes/footer.php');


?>