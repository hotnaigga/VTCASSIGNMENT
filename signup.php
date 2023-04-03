<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
     <form action="signupCheck.php" method="post">
     	<h2>SIGN UP</h2>

          <label>Name</label>

               <input type="text" 
                      name="name" 
                      placeholder="Name">
                      <br>
          
               

          <label>User Name</label>
          
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                     ><br>
          
            

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="login.php" class="ca">Already have an account?</a>
          <a href="update.php" class="ca">Do you Want to update your info?</a>
     </form>
</body>
</html>

<?php 
include_once("../databaseFolder/connection.php");
if (isset($_POST['submit'])){
	$d = $_POST['uname'];
	$e = $_POST['password'];
     $f = $_POST['name'];
	$insert1 = "INSERT INTO INFO(user_name,password,name) values ('$d','$e','$f')";
$run1 = mysqli_query($conn,$insert1);
}
	?>
