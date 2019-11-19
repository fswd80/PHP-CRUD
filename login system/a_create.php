<?php 
require_once 'dbconnect.php';
if($_POST){
	$address = $_POST["address"];
	$name = $_POST["name"];
	$avrooms = $_POST["avrooms"];

	echo $sql = "INSERT INTO hotel (name ,av_rooms , fk_address_id) VALUES ('$name',$avrooms, $address)";

	if(mysqli_query($conn, $sql)){
		echo 'Success';
	}
}

 ?>