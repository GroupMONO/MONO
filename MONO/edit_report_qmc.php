<?php
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];

	$get_id=$_GET['id'];
?>
<title>Update Profile</title>
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
	<nav class="nav-area">
		<ul>
			<li><a href="homepage_qmc.php">Home</a></li>
			<li><a class="active" href="report_qmc.php">Report</a></li>
			<li><a href="update_profile_qmc.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<?php
	$qmc_query=mysqli_query($connect,"select * from qmc where qmcid = '$session_id'")or die(mysqli_error());
	$qmc_row=mysqli_fetch_array($qmc_query);
	?>

	<div>
		<h3>Edit Summary Report</h3>
		<form method="post">
			<div class="container">
				<label><b>Status</b></label>
				<div>
					<select id="qmc_status" name="qmc_status">
				       	<option></option>
				        <option <?php echo isset($qmc_status) && $qmc_status == "Complete" ? 'selected' : '' ;?>>Checked</option>
				        <option <?php echo isset($qmc_status) && $qmc_status == "Incomplete" ? 'selected' : '' ;?>>Unchecked</option>
		        	</select>	
				</div>
			</div>
			
			<br>
			<div class="container">
				<label><b>Comment</b></label>
				<div>
					<textarea name="qmc_comment" cols="" rows="" required=""></textarea>
				</div>	
			</div>

			<br>
			<div class="container">
				<div>
					<button  id="save" type="submit" name="save">Save</button>
					<button><a id="back" href="report_qmc.php">Back</a></button>
				</div>
			</div>
		</form>

		<?php
		if(isset($_POST['save'])){
			$qmc_status=$_POST['qmc_status'];
			$qmc_comment=$_POST['qmc_comment'];

			mysqli_query($connect, "update file set fqmcstatus='$qmc_status', fqmccomment='$qmc_comment' where file_id=$get_id") or die(mysqli_error());

			echo('<script>location.href = "report_qmc.php"</script>');
		}
		?>
	</div>	
</body>