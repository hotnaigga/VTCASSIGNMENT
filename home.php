<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     
</body>
</html>


<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
 <?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Connect to database
    $servername = "localhost";
    $db_username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $db_username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if old password is correct
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    if (password_verify($old_password, $hashed_password)) {
        // Old password is correct, update password
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $hashed_new_password, $username);
        $stmt->execute();
        echo "Password changed successfully";
    } else {
        // Old password is incorrect
        echo "Old password is incorrect";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Connect to database
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);

    // Execute
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment"></textarea>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
