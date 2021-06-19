<?php
	$dbHost="localhost";
	$dbUsername="admin";
	$dbPassword="123456";
	$dbName="eCourse";

	$db=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

	if($db->connect_error){
		die("Connection failed: " . $db->connect_error);
	}
?>