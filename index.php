<?php 
	include "connect.php";

	$sql = "SELECT * FROM booking";
	
	$result = mysqli_query($conn, $sql);

	if($result->num_rows == 0){
		$row = "No result";
		$res = 0;
	} elseif($result->num_rows == 1){
		$row = $result->fetch_assoc();
		$res = 1;
	} else{
		$row = $result->fetch_all(MYSQLI_ASSOC);
		$res = 2;
	}

	if($res == 0){
		echo $row;
	}elseif($res == 1){
		echo $row["name"]." ". $row["roomnum"];
	}else{
		foreach ($row as $value) {
			echo $value["id"] ." ".$value["name"]." ". $value["roomnum"]." <a href='delete.php?id=".$value["id"]."'>delete</a> <a href='update.php?id=".$value["id"]."'>update</a><br>";
		}
	}
?>

