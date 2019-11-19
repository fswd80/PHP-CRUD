<?php 
	session_start();
	require_once 'dbconnect.php';

if(isset($_GET["id"])){
	$id = $_GET["id"];
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<form method="post" action="a_booking.php">
 		<input type="hidden" name="id" value="<?= $id ?>"><?php #echo ?>  
 		<input type="date" name="booking_start">
 		<input type="date" name="booking_end">
 		<input type="submit">
 	</form>
 </body>
 </html>