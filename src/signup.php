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
  require_once 'C:/Users/DJB/Downloads/Programs/swiftmailer-5.x/lib/swift_required.php';
	session_start();
	$myusername =mysql_real_escape_string($_POST['username']);
	$mypassword =mysql_real_escape_string($_POST['password']);
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
	#check wheather the email already exists
	$sql1 = "SELECT * FROM members WHERE username = '$myusername'";
  $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
  $_SESSION['error']= null;
   if (mysqli_num_rows($result1) > 0)
            {
    $_SESSION['error']['email'] = "This Email is already used.";
    
   }
   if(isset($_SESSION['error']))
 {
  echo "error.";
  #header("Location: login.html");
  echo "<a href='signup.html'> <p>Sign Up</p> </a>";
  exit;
 }
 else
 {
 	$com_code= md5(uniqid(rand()));
	$sql = "INSERT INTO members (username, password, com_code)
	VALUES ('$myusername', '$mypassword', '$com_code')";
	mysqli_query($conn, $sql) or trigger_error(mysql_error()." in ".$sql);
	if ($conn->query($sql) == TRUE) {
    echo"<center>";
    echo "<img src='images/cookie.jpg' alt='Grab Your Cookie' style='width:382px;height:380px;'>";
    echo"</br></br>";
    echo "<div class='alert alert-success'>
  <strong>Success!</strong> New record created successfully. Here is your cookie.
</div>";
echo "<a href='login.html' class='btn btn-primary' role='button'>Log In</a>";
  echo"</center>";
#Sending confirmation email if values entered the database correctly	
    $smtp_host_ip = gethostbyname('smtp.gmail.com');
    // Create the Transport
$transport = Swift_SmtpTransport::newInstance($smtp_host_ip, 465, 'ssl')
  ->setUsername('email.sec546@gmail.com')
  ->setPassword('bhanu@1995')
  ;
  // Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);
   // Create the message
$message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject('Confirmation mail')

  // Set the From address with an associative array
  ->setFrom(array( 'email.sec546@gmail.com' => 'John Doe'))

  // Set the To addresses with an associative array
  ->setTo(array($myusername => 'test'))

  // Give it a body
  ->setBody('Please click the link below to verify and activate your account. http://localhost/books_ait/confirm.php?passkey='.$com_code)

  // And optionally an alternative body
  //->addPart('<q>Here is the message itself</q>', 'text/html')

  // Optionally add any attachments
  //->attach(Swift_Attachment::fromPath('my-document.pdf'))
  ;
   // Send the message
  $sentmail = $mailer->send($message);

   if($sentmail)
            {
   echo "Your Confirmation link Has Been Sent To Your Email Address.";
   }
   else
         {
    echo "Cannot send Confirmation link to your e-mail address";
   }
}
}
?>
</body>
</html>
