<?php
// this will avoid mysql_connect() deprecation error.
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

$DBHOST = "localhost";
define('DBUSER', 'root');
define('DBPASS', '');
define ('DBNAME', 'login_system');

$conn = mysqli_connect($DBHOST,DBUSER,DBPASS,DBNAME);


if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}


?>