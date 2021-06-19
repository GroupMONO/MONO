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
        display: inline-block;;
      }
      input[type=text],input[type=code]{
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
          <li><a href="homepage_admin.php">Home</a></li>
          <li><a class="active" href="course.php">Course</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="cc.php">Course Coordinator</a></li>
          <li><a href="qmc.php">Quality Management Committee</a></li>
          <li><a href="update_profile_admin.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
      </ul>
  </nav>

  <h3>Add Course</h3>
    <form method="post">
      <div class="container">
        <div>
          <label for="code"><b>Course Code</b></label>
          <div>
            <input type="text" placeholder="Enter Course Code" name="code" required>
          </div>
        </div>

        <br>
        <div>
          <label for="name"><b>Course Name</b></label>
          <div>
            <input type="text" placeholder="Enter Course Name" name="name" required>
          </div>
        </div>

        <br>
        <div>
          <label for="semester"><b>Semester</b></label>
          <select id="semester" name="semester">
            <option></option>
            <option <?php echo isset($semester) && $semester == "1" ? 'selected' : '' ;?>>1</option>
            <option <?php echo isset($semester) && $semester == "2" ? 'selected' : '' ;?>>2</option>
            <option <?php echo isset($semester) && $semester == "3" ? 'selected' : '' ;?>>3</option>
            <option <?php echo isset($semester) && $semester == "4" ? 'selected' : '' ;?>>4</option>
          </select>
        </div>
        
        <br>
        <div>
        <div>
         <button type="submit" id="save" name="save">Save</button> 
         <button><a id="back" href="course.php">Back</a></button>
        </div>
      </div>
    </form>

      <?php 
      if(isset($_POST['save']))
      {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $semester = $_POST['semester'];

        mysqli_query($connect, "insert into course (code,name,semester) values ('$code','$name','$semester')")or die(mysqli_error());
        echo('<script>location.href="course.php"</script>');
      }
      ?>
</body>
