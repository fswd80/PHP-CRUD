<?php 
$hostname= "localhost";
	$username= "root";
	$password="";
	$dbname = "booking";

	$conn = mysqli_connect($hostname,$username,$password,$dbname);

	if(!$conn){
		echo '<script>alert("error")</script>';
	}
 ?>