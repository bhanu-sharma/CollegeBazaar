<!DOCTYPE=html>
<html lang="en-US">
<head></head>
<body>
	<?php
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
	mysqli_select_db($conn, "test") or die(mysql_error());
	$passkey = $_GET['passkey'];
	echo $passkey;
 	$sql = "UPDATE members SET com_code= NULL WHERE com_code= '$passkey' ";
 	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 	if($result)
 	{
 	 echo '<div>Your account is now active. You may now <a href="login.html">Log in</a></div>';
	}
 	else
 	{
 	 echo "Some error occur.";
 	}
?>
</body>
</html>