<?php
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];

	$qmc_query=mysqli_query($connect,"select * from qmc where qmcid = '$session_id'")or die(mysqli_error());
	$qmc_row=mysqli_fetch_array($qmc_query);
?>
<head>
<title>View Profile</title>
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
		.table{
			font-family: Arial;
  			border-collapse: collapse;
  			width: 100%;
  			border: 1px solid #ddd;
  			padding: 8px;
  			text-align: center;

		}
		.table thead, .table th{
			border: 5px solid #ddd;
  			padding: 10px;
		}
		.table tr:hover{
			background-color: #ffffcc;
		}
		.table th{
			padding-top: 12px;
  			padding-bottom: 12px;
  			text-align: center;
  			background-color: #ccff66;
  			color: black;
		}
		#black{
          background-color:#fff;
          color: black;
          padding: 14px 20px;
          text-decoration: none;
          display: inline-block;
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
	<nav class="nav-area">
		<ul>
			<li><a href="homepage_qmc.php">Home</a></li>
			<li><a href="report_qmc.php">Report</a></li>
			<li><a class="active" href="update_profile_qmc.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<h3>Profile</h3>
	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Programme</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
		$user_query=mysqli_query($connect,"select * from qmc where qmcid = '$session_id'")or die(mysqli_error());
		$row=mysqli_fetch_array($user_query);
		?>
					<tr>
					<td><?php echo $row['qusername'];?></td>
					<td><?php echo $row['qpassword'];?></td>
					<td><?php echo $row['qfullname'];?></td>
					<td><?php echo $row['qemail'];?></td>
					<td><?php echo $row['qprogramme'];?></td>
					<td>
						<button><a id="black" href="sub_update_profile_qmc.php">Update Profile</a></button>
					</td>	
					</tr>

		</tbody>
	</table>
</body>