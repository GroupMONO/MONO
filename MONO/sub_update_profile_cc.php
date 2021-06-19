<!DOCTYPE html>
<html>
<head>
 <title>Update Profile</title>
	<script type="text/javascript">  
	  function validate(){
	  
	    var password = document.forms["myform"]["password"].value;

	    if(password == ""){
	      alert("Please enter password");
	      return false;
	    }else{
	      var validPwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$/;
	      var truePwd = validPwd.test(password);

	      if(!truePwd){
	        alert("Password is not in correct format-at least length 6, 1 uppercase, 1 special character, 1 number and no space");
	        return false;
	      }
	    }

	    var email = document.forms["myform"]["email"].value;

	    if(email == ""){
	      alert("Please enter email");
	      return false;
	    }else{
	      var validEmail = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

	      var trueEmail = validEmail.test(email);

	      if(!trueEmail){
	        alert("Email is not in correct format");
	        return false;
	      }
	    }
	  }
	</script>
   	<style>
      body{
        background-color:pink;
        padding: 14px 20px;
        border: none;
        width: 100%;  
        margin: 0;
        padding: 0;
        font-family: Arial;
        height: 100vh;
      }
      h3{
        text-align: center;
        font-size: 35px;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }
      li {
        float: left;
      }
      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      li a:hover:not(.active) {
        background-color: #111;
      }
      .active {
        background-color: #7F0099;
      }
      .container{
        text-align: center;
      }
      #save{
        background-color:blueviolet;
        cursor: pointer;
        color: #fff;
        padding: 14px 20px;
      }
      #back{
        background-color:#fff;
        color: black;
        padding: 14px 20px;
        text-decoration: none;
        display: inline-block;
      }
      input[type=text],input[type=password]{
        padding: 15px;
        margin: 5px 0 22px 0;
      }
      @media screen and (max-width: 400px) {
          .nav-area a {
         float: none;
         width: 100%;
        }
      }
 	</style>
</head>
<body>
	<?php
		$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
		session_start();

		if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
			header("location: index.php");
			exit();
		}
		$session_id=$_SESSION['id'];
	?>
	<nav class="nav-area">
		<ul>
			<li><a href="homepage_cc.php">Home</a></li>
			<li><a href="report_cc.php">Report</a></li>
			<li><a href="class_cc.php">Course</a></li>
			<li><a class="active" href="update_profile_cc.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	
	<?php
		$user_query=mysqli_query($connect,"select * from cc where ccid = '$session_id'")or die(mysqli_error());
		$row=mysqli_fetch_array($user_query);
	?>

	<div>
		<h3>Update Profile</h3>
		<form method="post" name="myform" onsubmit="return validate()">
			<div class="container">
			<div>
	        <label for="password"><b>Password</b></label>
		        <div>
		          <input type="password" placeholder="Enter Password" name="password">
		        </div>
	      	</div>

	      	<br>
	      	<div>
	        <label for="email"><b>Email</b></label>
		        <div>
		          <input type="text" placeholder="Enter Email" name="email">
		        </div>
	      	</div>
	      	
	      	<br>
	      	<div>
		      <div>
		       <button type="submit" id="save" name="save">Save</button> 
		       <button><a id="back" href="update_profile_cc.php">Back</a></button>
		      </div>
	    	</div>

			</form>
			 <?php 
	    	if(isset($_POST['save']))
	    	{
		      $password = $_POST['password'];
		      $email = $_POST['email'];

		      mysqli_query($connect, "update cc set password='$password',email='$email' where ccid='$session_id'")or die(mysqli_error());
		      echo('<script>location.href="update_profile_cc.php"</script>');
		    }
	    ?>
		</div>
</body>
</html>