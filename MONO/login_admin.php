<?php
$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
session_start();

unset($_SESSION['id']);
?>
<head>
	<title>Login Admin</title>
	<style>
		body{
			background-color:pink;
			padding: 14px 20px;
			margin-top:15%;
			border: none;
			width: 100%;  
			text-align: center;
			margin: 0;
			padding: 0;
			font-family: Arial;
			height: 100vh;
		}
		.container{
			background-color:white;
			padding: 20px 20px;
			margin-top:15%;
			border: solid;
			width: 50%;  
			text-align: center;
			margin: auto;
			padding: 0;
			font-family: Arial;
			height: 60vh;
			margin-top: 15%;
			font-size: 20px;
		}
		#signin{
			background-color:blueviolet;
	        cursor: pointer;
	        color: #fff;
	        padding: 14px 20px;
		}
		input[type=text],input[type=password]{
	        padding: 15px;
	        margin: 5px 0 22px 0;
     	}
	</style>
</head>
<body>
<div>
	<form class="modal-content animate" action="login_admin.php" method="post">
    <div class="container">
    
    <h1>Admin Login</h1>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <br><br>
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <br><br>
      <button type="submit" id="signin" name="signin">Sign in</button>
    </div>
  </form>

 <?php

if(isset($_POST['signin']))
{
	function clean($str){
		global $connect;
		$str = @trim($str);
		
			$str=stripcslashes($str);
		
		return mysqli_real_escape_string($connect,$str);
	}

	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

	$result = mysqli_query($connect, $sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	if($count>0){
		$_SESSION['id']=$row['userid'];
		echo('<script>location.href="homepage_admin.php"</script>');
		session_write_close();
		exit();
	}
	else{
		session_write_close();
		echo('<script> alert("Username or password not found")</script>');
		exit();
	}
}
?>
</div>
</body>