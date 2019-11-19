<?php 
	session_start();
	require_once 'dbconnect.php';


if($_POST){
	$id = $_POST["id"];
	$booking_start = $_POST["booking_start"];
	$booking_end = $_POST["booking_end"];
	$fk_user = $_SESSION["admin"];


	echo $sql = "INSERT INTO `booking`( `booking_start`, `booking_end`, `fk_user`, `fk_hotel`) VALUES ('$booking_start','$booking_end',$fk_user,$id)";

	if(mysqli_query($conn, $sql)){
		echo 'success';
	}



}