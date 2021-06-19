<?php
	$connect = mysqli_connect("localhost", "admin", "123456", "eCourse");
	session_start();

	if(!isset($_SESSION['id']) || (trim($_SESSION['id'])=='')){
		header("location: index.php");
		exit();
	}
	$session_id=$_SESSION['id'];

	$cc_query=mysqli_query($connect,"select * from cc where ccid = '$session_id'")or die(mysqli_error());
	$cc_row=mysqli_fetch_array($cc_query);

?>
<title>Add Course</title>
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
      }
      .control{
        font-size: 20px;

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
      @media screen and (max-width: 400px) {
        .nav-area a {
        float: none;
        width: 100%;
        }
      }
  </style>
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

	<h3>Add Course</h3>
	<div>
		<form method="post">
			<div class="container">
				<label>Course Code</label>
				<select name="course">
					<option></option>
					<?php

					$query=mysqli_query($connect,"select * from course") or die(mysqli_error());
					while($row=mysqli_fetch_assoc($query)){
						?>
						<option <?php echo isset($course) && $course == "course" ? 'selected' : '' ;?>><?php echo $row['code'] ?></option>
					<?php } ?>
					<input type="hidden" name="cc_id" value="<?php echo $session_id; ?>">
				</select>


				<div>
					<br>
					<button type="submit" class="save_class" id="save" name="save_class">Add Class</button>
          <button><a id="back" href="class_cc.php">Back</a></button>
				</div>
				<?php
				if(isset($_POST['save_class'])){
					$course=$_POST['course'];
					$cc_id=$_POST['cc_id'];

					mysqli_query($connect, "insert into class (courseid, ccid) values ('$course', '$cc_id')") or die(mysqli_error());

					echo('<script>location.href = "class_cc.php"</script>');
				}
				?>
			</div>
		</form>
	</div>	
</body>