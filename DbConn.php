<?php
	require_once('./env-setup.php');
	//Database connection details
	$host= getenv('DB_HOST'); 
	$username=getenv('DB_USER'); 
	$password=getenv('DB_PASSWORD'); 
	$db=getenv('DB_NAME'); 

	//Database connection
	$DbConn = new mysqli ($host, $username, $password, $db) or die("Connection error: ".mysqli_connect_error());