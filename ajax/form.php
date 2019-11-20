<?php  
	$conn = mysqli_connect("localhost","root","","ajax");

	$bar = isset($_POST["bar"]) ? $_POST["bar"] : null;
	
	$sql = "INSERT INTO example (name) VALUES ('$bar')";

	if(mysqli_query($conn , $sql)){
		echo 'Success';
	}else {
		echo 'Error';
	}




?>