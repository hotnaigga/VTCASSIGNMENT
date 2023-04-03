<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
     <form action="signupCheck.php" method="post">
     	<h2>UPDATE INFO</h2>

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

          <label>New Password</label>
          <input type="password" 
                 name="new_password" 
                 placeholder="Re_Password"><br>

                 <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Commit Change</button>
          <a href="login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>
<?php
 if(isset($_GET['$id'])){
$qry = $conn->query("UPDATE user SET uname='$uname', password='$password' WHERE id===id");
    echo $qry;}