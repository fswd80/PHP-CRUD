<?php 

	include "connect.php";

	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "SELECT * FROM booking WHERE id = $id ";

		$result = mysqli_query($conn ,$sql);

		$row = $result->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="update_a.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
		<input type="text" name="name" value="<?php echo $row['name'] ?>">
		<input type="text" name="address" value="<?php echo $row['address'] ?>">
		<input type="text" name="roomnum" value="<?php echo $row['roomnum'] ?>">
		<input type="submit" name="submit" value="update">
	</form>
</body>
</html>