<?php
	$get_id = $_GET['id'];
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];

	$cc_query=mysqli_query($connect,"select * from cc where ccid = '$session_id'")or die(mysqli_error());
	$cc_row=mysqli_fetch_array($cc_query);

	$course_query = mysqli_query($connect,"select * from class where ccid='$session_id' and class_id='$get_id'") or die(mysqli_error());
	$course_row = mysqli_fetch_array($course_query);
	$course_id = $course_row['courseid'];	

	$query_class = mysqli_query($connect,"select * from class where ccid='$session_id' and class_id='$get_id'") or die(mysqli_error());
	$row_class = mysqli_fetch_array($query_class);
	$id_class = $row_class['class_id'];	
?>
<head>
	<title>View Class</title>
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
		.cr{
			text-align: center;
			font-size: 25px;
			text-transform: uppercase;
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
			<li><a href="homepage_cc.php">Home</a></li>
			<li><a href="report_cc.php">Report</a></li>
			<li><a class="active" href="class_cc.php">Course</a></li>
			<li><a href="update_profile_cc.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	
	<div>
		<br>
		<button><a id="black" href="upload.php<?php echo '?id=' .$id_class; ?>">Upload A File</a></button>
		<br><br>
		<div class="cr"><b><?php echo $course_row['courseid']; ?></b></div>
		<h3>View Uploaded Files</h3>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Comment</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$file_query=mysqli_query($connect, "select * from file where class_id='$id_class'") or die(mysqli_error());

				while($file_row=mysqli_fetch_array($file_query)){
					$file_id=$file_row['file_id'];
					?>

					<tr>
						<td><?php echo $file_row['fname']; ?></td>
						<td><?php echo $file_row['fcomment']; ?></td>
						<td><?php echo $file_row['fstatus']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>