<?php
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	$get_id=$_GET['id'];
	mysqli_query($connect,"delete from cc where ccid = '$get_id'")or die(mysqli_error());
	header('location:cc.php');
?>
