<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}

if(isset($_SESSION["user"])){
	header("Location: home.php");
}

$sql = "SELECT * FROM address";
$res = mysqli_query($conn, $sql);
$rows = $res->fetch_all(MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="a_create.php">
		<input type="text" name="name">
		<input type="number" name="avrooms">
		<select name="address">
			<?php
				 foreach($rows as $test) {
				 	echo '<option value="'.$test["id"].'">'.$test["city"].' '.$test["street_name"].'</option>';

			}
			?>
		</select>
		<input type="submit">


	</form>
</body>
</html>