<?php
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];
?>
<head>
	<title>Course Coordinator</title>
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
			<li><a href="homepage_admin.php">Home</a></li>
			<li><a href="course.php">Course</a></li>
			<li><a href="admin.php">Admin</a></li>
			<li><a class="active" href="cc.php">Course Coordinator</a></li>
			<li><a href="qmc.php">Quality Management Committee</a></li>
			<li><a href="update_profile_admin.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<br>
	<button><a id="black" href="add_cc.php">Add Course Coordinator</a></button>
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
				$query=mysqli_query($connect,"select * from cc") or die(mysqli_error());
				while($row=mysqli_fetch_array($query)){
					$cc_id=$row['ccid'];
					?>

					<tr>
					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['password'];?></td>
					<td><?php echo $row['fullname'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['programme'];?></td>
					<td>
						<button><a id="black" href="edit_cc.php<?php echo '?id=' . $cc_id; ?>">Edit CC</a></button>
						<button><a id="black" href="delete_cc.php<?php echo '?id=' . $cc_id; ?>">Delete CC</a></button>
					</td>	
					</tr>
				<?php } ?>
		</tbody>
	</table>
</body>
