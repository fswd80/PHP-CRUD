<?php 

	include "connect.php";

	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "DELETE FROM `booking` WHERE id = $id";

		if(mysqli_query($conn ,$sql)){
			echo 'Record Deleted<br><a href="index.php">Back</a>';
		}

	}
?>