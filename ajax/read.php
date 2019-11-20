<?php 
  $conn = mysqli_connect("localhost","root","","ajax");
  $sql = "SELECT * FROM example";

  $res = mysqli_query($conn,$sql);
  $rows = $res->fetch_all(MYSQLI_ASSOC);
  
  foreach ($rows as $val) {
  	echo '<p>'.$val["name"].'</p>';
  }
 ?>