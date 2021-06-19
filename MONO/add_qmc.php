<!DOCTYPE html>
<html>
<head>
  <title>Add Quality Management Committee Account</title>
    <script type="text/javascript">  
      function validate(){
        var username = document.forms["myform"]["username"].value;

        if(username == ""){
          alert("Please enter username");
          return false;
        }else{
          if(isNaN(username)){
            alert("Username is not in numeric format");
            return false;
          }
        }

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

        var fullname = document.forms["myform"]["fullname"].value;

        if(fullname == ""){
          alert("Please enter full name");
          return false;
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

        var programme = document.forms["myform"]["programme"].value;

        if(programme == ""){
          alert("Please select a programme");
          return false;
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
          <li><a href="homepage_admin.php">Home</a></li>
          <li><a href="course.php">Course</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="cc.php">Course Coordinator</a></li>
          <li><a class="active" href="qmc.php">Quality Management Committee</a></li>
          <li><a href="update_profile_admin.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
      </ul>
  </nav>

  <h3>Add Quality Management Committee Account</h3>
    <form method="post" name="myform" onsubmit="return validate()">
      <div class="container">
        <div>
          <label for="username"><b>Username</b></label>
          <div>
            <input type="text" placeholder="Enter Username" name="username">
          </div>
        </div>
        
        <br>      
        <div>
          <label for="password"><b>Password</b></label>
          <div>
            <input type="password" placeholder="Enter Password" name="password">
          </div>
        </div>

        <br>
        <div>
          <label for="fullname"><b>Full Name</b></label>
          <div>
            <input type="text" placeholder="Enter Full Name" name="fullname">
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
          <label for="programme"><b>Programme</b></label>
          <select id="programme" name="programme">
            <option></option>
            <option <?php echo isset($programme) && $programme == "SE" ? 'selected' : '' ;?>>Software Engineering</option>
            <option <?php echo isset($programme) && $programme == "CS" ? 'selected' : '' ;?>>Computer Science</option>
            <option <?php echo isset($programme) && $programme == "IS" ? 'selected' : '' ;?>>Information System</option>
            <option <?php echo isset($programme) && $programme == "MC" ? 'selected' : '' ;?>>Multimedia Computing</option>
            <option <?php echo isset($programme) && $programme == "NC" ? 'selected' : '' ;?>>Network Computing</option>
          </select>
        </div>
        
        <br>
        <div>
        <div>
         <button type="submit" id="save" name="save">Save</button>
         <button><a id="back" href="qmc.php">Back</a></button> 
        </div>
      </div>
    </form>

      <?php 
      if(isset($_POST['save']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $programme = $_POST['programme'];

        mysqli_query($connect, "insert into qmc (qusername,qpassword,qfullname,qemail,qprogramme) values ('$username','$password','$fullname','$email','$programme')")or die(mysqli_error());
        echo('<script>location.href="qmc.php"</script>');
      }
      ?>
</body>
</html>