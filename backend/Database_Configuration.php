<?php
	$server_name = "localhost";
	$username = "root";
	$password = "";
	$database_name = "travel_agency";
	$conn = mysqli_connect($server_name, $username, $password, $database_name);
	if($conn->error){
		die("Connection failed".$conn->connect_error);
	} 
?>
