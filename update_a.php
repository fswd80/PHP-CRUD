<?php 
include "connect.php";
if(isset($_POST)){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$roomnum = $_POST["roomnum"];
	$sql = "UPDATE `booking` SET `name`= '$name',`roomnum`='$roomnum',`address`= '$address' WHERE id = $id";

	if(mysqli_query($conn, $sql)){
		echo 'Updated successfully<br><a href="index.php">back</a>';
	}
}
 
?>
