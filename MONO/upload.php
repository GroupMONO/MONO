<?php
	$get_id=$_GET['id'];
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];
	$cc_query=mysqli_query($connect,"select * from cc where ccid='$session_id'");
	$cc_row=mysqli_fetch_array($cc_query);

	$course_query=mysqli_query($connect,"select * from class where ccid='$session_id' and class_id='$get_id'") or die(mysqli_error());
	$course_row=mysqli_fetch_array($course_query);
	$get_id=$_GET['id'];	
?>
<head>
	<title>Upload A File</title>
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
        font-size: 20px;
        font
      }
      .cr{
		text-align: center;
		font-size: 25px;
		text-transform: uppercase;
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
      input[type=text],input[type=name],textarea{
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
			<li><a href="homepage_cc.php">Home</a></li>
			<li><a href="report_cc.php">Report</a></li>
			<li><a class="active" href="class_cc.php">Course</a></li>
			<li><a href="update_profile_cc.php">Profile</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<div class="cr"><b><?php echo $course_row['courseid']; ?></b></div>
	<h3><b>Upload A File</b></h3>
	
	<form action="upload_save_new.php" method="post" enctype="multipart/form-data" name="upload">
		<div class="container">
			<label for="inputUname"><b>File</b></label>
			<div>
				<input type="file" name="file" required/>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
				<input type="hidden" name="id" value="<?php echo $session_id ?>"/>
				<input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
			</div>
		</div>

		<br>
		<div class="container">
			<label for="inputPss"><b>File Name</b></label>
			<div>
				<input type="text" name="name" required>
			</div>
		</div>

		<br>
		<div class="container">
			<label for="inputPss"><b>Comment</b></label>
			<div>
				<textarea name="comment" cols="" rows="" required></textarea>
			</div>
		</div>

		<br>
		<div class="container">
			<label for="status"><b>Status</b></label>
        <select id="status" name="status">
          <option></option>
          <option <?php echo isset($status) && $status == "Complete" ? 'selected' : '' ;?>>Complete</option>
         <option <?php echo isset($status) && $status == "Incomplete" ? 'selected' : '' ;?>>Incomplete</option>
        </select>
		</div>

		<br>
		<div class="container">
			<button id="save" name="upload" type="submit" value="Upload">Upload</button>
			<button><a id="back" href="class_cc.php">Back</a></button>
		</div>
	</form>
</body>