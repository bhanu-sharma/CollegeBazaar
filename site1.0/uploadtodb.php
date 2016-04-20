<!Doctype=html>
<html>
<head>
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
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="upload.php">BooksAIT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><?php session_start(); echo $_SESSION["myusername"];?></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
  </div>
</nav>
<?php
//Image file upload.
$target_dir = "uploads/"; #$target_dir = "images/" - specifies the directory where the file is going to be placed
$target_file = $target_dir . basename($_FILES["itemimage"]["name"]); #$target_file specifies the path of the file to be uploaded
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); #$imageFileType holds the file extension of the file
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["itemimage"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["itemimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["itemimage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$servername = "mysql.hostinger.in";
$username = "u874587685_root";
$password = "bhanu@1995";
# Create connection
$conn = new mysqli($servername, $username, $password);
# Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "bad conection";
 }
mysqli_select_db($conn, "u874587685_books") or die(mysql_error());
if (empty($_POST['fullname'])){
    $nameer="Name is required";
    echo $nameer." The form wasn't filled correctly, please upload again";
}
else{
$name=test_input(mysqli_real_escape_string($conn, $_POST["fullname"]));

}
if (empty($_POST['branch'])){
    $brancher="Branch is required";
    echo $brancher." The form wasn't filled correctly, please upload again";
}
else{
$branch=test_input(mysqli_real_escape_string($conn,$_POST["branch"]));
}
if (empty($_POST['semester'])){
    $semesterer="Semester is required";
    echo $semesterer." The form wasn't filled correctly, please upload again";
}
else{
$semester=test_input($_POST["semester"]);
}
$contact=test_input($_POST["contact"]);
if (empty($_POST['itemname'])){
    $itemnameer="itemname is required";
    echo $itemnameer." The form wasn't filled correctly, please upload again";
}
else{
    $itemname=test_input($_POST["itemname"]);

}
if (empty($_POST['email'])){
    $emailer="email is required";
    echo $emailer." The form wasn't filled correctly, please upload again";
}
else{
    $email=test_input($_POST["email"]);
}
$itembranch  = $_POST["itembranch"];
$itemsemester=test_input($_POST["itemsemester"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$price= mysqli_real_escape_string($conn,$_POST["price"]);
echo $_POST["description"];
$description= mysqli_real_escape_string($conn,$_POST["description"]);
echo $description;
$sql = "INSERT INTO books (name, branch, semester, contact, imagesrc, itemname, email, itembranch, itemsemester, description, price)
VALUES ('$name', '$branch', '$semester', '$contact', '$target_file', '$itemname', '$email', '$itembranch', '$itemsemester', '$description' $price)";
mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn)." in ".$sql);
if ($conn->query($sql) == TRUE) {
    echo "New record created successfully";
} 
?> <center>
<img src="images/goodjob.jpg" alt="Good Job" style="width:400px;height:285px;">
</br></br></br>
<a href="upload.php" class="btn btn-info" role="button">Upload More</a>
</center>
</body>
</html>