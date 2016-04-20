<!DOCTYPE=html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
		 background-image: url("images/parallax.jpg");
		 background-position: center center;
  
  /* Background image doesn't tile */
		background-repeat: no-repeat;
  
  /* Background image is fixed in the viewport so that it doesn't move when 
     the content's height is greater than the image's height */
		background-attachment: fixed;
  
  /* This is what makes the background image rescale based
     on the container's size */
		background-size: cover;
  
  /* Set a background color that will be displayed
     while the background image is loading */
		background-color: #464646;
		/*font: 15px helvetica , sans-serif;*/
		font-size: 100%;

}
p{
font-size: 1em;
}


</style>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="style.css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
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
	#check wheather the email already exists
	#$myusername=$_SESSION["myusername"];
	#$sql1 = "SELECT `com_code` FROM members WHERE username = '$myusername'";
    #$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    #echo $result1;
if(!isset($_SESSION["myusername"])) #and $result1 != NULL)
{
echo "success mate";
header("location:login.html");
}
?>
<!--The data will be submitted to upload.php--> 
<form action="http://localhost/books_ait/uploadtodb.php" method="post"  enctype="multipart/form-data">
<!-- Data of the submitter-->
<div>
	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      	<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="upload.php">BooksAIT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="#"><?php echo $_SESSION["myusername"];?></a></li>
    	</ul>
    	<ul class="nav navbar-nav navbar-right">
      		<li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    	</ul>
    </div>
  </div>
</nav>
	<div class="transbox">
	<center>
	<h1>Your Credentials:</h1>
	<i class="fa fa-user fa-fw"></i>
	<input type="text" name="fullname" value= <?php echo $_SESSION["fullname"]; ?> placeholder="Full Name" readonly disabled>
	<br><br>
	Branch:
		<select id="branch" name="branch"  placeholder="branch" readonly disabled> 
		<option value = <?php echo $_SESSION["branch"]; ?> > <?php echo $_SESSION["branch"]; ?> </option> 
	</select>

	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Semester:
	<select id="semester" name="semester" value = <?php echo $_SESSION["semester"]; ?> readonly disabled>
		<option value = <?php echo $_SESSION["semester"]; ?>> <?php echo $_SESSION["semester"]; ?> </option>
	</select>
	<br><br>
	<div class="input-group margin-bottom-sm">
    <!--<span class="input-group-addon">--><i class="fa fa-envelope-o fa-fw"></i></span>
    <input type="email" name="email" value=<?php echo $_SESSION["email"]; ?> placeholder="Email Address" readonly disabled></br></br>
	</div>
	<i class="fa fa-phone fa-fw"></i>
	<input type="text" name="contact" value=<?php echo $_SESSION["contact"]; ?> placeholder="Contact Number" readonly disabled>
	<br><br>
</center>

<!--Data about the item being submitted -->

	<center>
	<h1>Tell us About the item</h1>
	<i class="fa fa-fighter-jet fa-fw"></i>
	<input type="name" name="itemname" placeholder="Item Name" required>
	<br><br>
	For Branch:
		<select id="itembranch" name="itembranch" placeholder="test" required>
		<option value="ECE">ECE</option>
		<option value="CSE">CSE</option>
	</select>
	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Semester:	
	<select id="book_semester" name="itemsemester" required>
		<option value="01">01 </option>
		<option value="02">02 </option>
		<option value="03">03 </option>
		<option value="04">04 </option>
		<option value="05">05 </option>
		<option value="06">06 </option>
		<option value="07">07 </option>
		<option value="08">08 </option>
	</select>
	<br><br>
	<i class="fa fa-picture-o fa-fw"></i>
	Insert File Image:
	<input type="file" name="itemimage" id="itemimage" required>
	<br><br>
	<i class="fa fa-inr fa-fw"></i>
	<input type="number" name="price" id="price" placeholder="Price" required>
	<br/><br/>
	<i class="fa fa-pencil fa-fw"></i>Description:
	<br><br>
	<textarea name="description" id="description" rows="5" cols="50" placeholder="Description">
	</textarea>
	<br><br>
	<input type="submit" value="Submit" name="submit">
	</div>
</div>	
</center>
</form>
</body>
</html>