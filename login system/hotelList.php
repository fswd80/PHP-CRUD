<?php 
	require_once 'dbconnect.php';

	session_start();

	$sql = "SELECT hotel.id , hotel.name, address.city FROM hotel INNER JOIN address ON hotel.fk_address_id = address.id ";

	$res = mysqli_query($conn, $sql);
	$result= $res->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<?php foreach($result as $row) {
		echo $row["name"]." ".$row["city"]." <a href='booking.php?id=".$row["id"]."'>Book now </a><br>";
	}
	?>
	
</body>
</html>