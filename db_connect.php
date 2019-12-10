<?php
//connects to db
		$host = "localhost";
		$username = "root";
		$user_pswd = "";
		$database_in_use = "immigreation";
		
$mysqli = new mysqli($host,$username, $user_pswd, $database_in_use);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//used to test connection
//echo $mysqli->host_info . "\n"; 

?>
