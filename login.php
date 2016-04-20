<!DOCTYPE=html>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<?php
	$count=0;
	session_start();
	// To protect MySQL injection
	$myusername=stripslashes($_POST['username']);
	$mypassword=stripslashes($_POST['password']);
	$myusername=mysql_real_escape_string($myusername);
	$mypassword=mysql_real_escape_string($mypassword);
	$servername = "localhost";
	$username = "root";
	$password = "bhanu@1995";
	# Create connection
	$conn = new mysqli($servername, $username, $password);
	# Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		echo "bad conection";
 	}
	mysqli_select_db($conn,"test") or die(mysql_error());
	$sql="SELECT * FROM `members` WHERE username='$myusername' and password='$mypassword'"; # and com_code IS NULL";
	$result=mysqli_query($conn, $sql) or die(mysqli_error($conn));;

	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	echo $count;
	if($count==2){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION["myusername"]= $myusername;
	$_SESSION["mypassword"]= $password;
	header("location:upload.php");
	}
	else {
	echo"<center>";
	echo "<img src='images/monkey.jpg' alt='tch tch tch' style='width:600px;height:451px;'>";
	echo"</br></br>";
	echo "<div class='alert alert-danger'>
  <strong>Alert:</strong> Wrong Username or Password.
</div>";
	#sleep(10);
	#header("location:login.html");
	echo "<a href='login.html' class='btn btn-primary' role='button'>Log In</a>";
	echo"</center>";
	}
	?>
</body>
</html>
