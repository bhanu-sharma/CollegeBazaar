<!Doctype=html>
<html>
<head> </head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a href="home.php" class="current">Home</a></li>
            <li><a href="upload.html">Upload</a></li>
            <li><a href="subpage.html">Search</a></li>            
           
    	</ul>
    </div> <!-- end of menu -->
    
    <div id="templatemo_header">
    	<div id="templatemo_special_offers">
        	<p>
                <span>25%</span> discounts for
        purchase over $80
        	</p>
			<a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
        
        
        <div id="templatemo_new_books">
        	<ul>
                <li>Resnick Halliday</li>
                <li>Boyelstead</li>
                <li>mera naam champa</li>
            </ul>
            <a href="subpage.html" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->
    <form>
    <div id="templatemo_content">
    	
        <div id="templatemo_content_left">
        	<div class="templatemo_content_left_section">
            	<h1>Branch</h1>
                <select id="branch" name="branch" required>
				<option value="ECE">ECE</option>
				<option value="CSE">CSE</option>
			</select>
            </div>
			<div class="templatemo_content_left_section">
            	<h1>Semester</h1>
                <select id="book_semester" name="item_semester" required>
				<option value="01">01 </option>
				<option value="02">02</option>
				<option value="03">03 </option>
				<option value="04">04 </option>
				<option value="05">05</option>
				<option value="06">06 </option>
				<option value="07">07 </option>
				<option value="08">08 </option>
			</select>
            </div>
            
            <div class="templatemo_content_left_section">                
                <input type="submit" value="Go">
			</div>
        </div> <!-- end of content left -->
		</form>
		<div id="templatemo_content_right">		
		<?php
$servername = "localhost";
$username = "root";
$password = "bhanu@1995";
# Create connection
$conn = new mysqli($servername, $username, $password);
# Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "bad connection";
}
mysql_select_db("test") or die(mysql_error());		
$sql = "SELECT `name`, `branch`, `semester`, `email`, `contact`, `itemname`, `imagesrc`, `description`, `id` FROM `books` WHERE 1  "; 
$result = mysql_query("$sql");
echo "<table>"; // start a table tag in the HTML
$count = 0 ;
while($row = mysql_fetch_assoc($result))
{   //Creates a loop to loop through results
$count =$count+1 ;
if ($count%2==0)
{
echo "<div class='templatemo_product_box'>	";
echo "<h1>".$row['itemname']."<span>(by Best Author)</span></h1>  <img src='".$row['imagesrc']."' height='150' width='100' />  <div class='product_info'><p>blah... blah...</p> <h3>Rs: 55</h3><h2> Contact:</h2><p> yada yada yada </p>";  
echo "</div>";
                echo "<div class='cleaner'>&nbsp;</div>";
            echo "</div>";
			echo "<div class='cleaner_with_width'>&nbsp;</div>";
}
else {
echo "<div class='templatemo_product_box'>	";
echo "<h1>".$row['itemname']."<span> &nbsp (by Best Author)</span></h1> <img src='".$row['imagesrc']."' height='150' width='100' /> <div class='product_info'><p>blah... blah...</p> <h3>Rs: 55</h3><h2> Contact:</h2><p>".$row['contact'] ; 	
echo "</div>";
                echo "<div class='cleaner'>&nbsp;</div>";
            echo "</div>";
			echo "<div class='cleaner_with_height'>&nbsp;</div>";
}
}
echo "</table>"; //Close the table in HTML
$conn->close();
  ?>
  <div id="templatemo_footer">
    
	       <a href="subpage.html">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
        Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a> 
        <!-- Credit: www.templatemo.com -->	</div> 
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
<!-- templatemo 086 book store -->
<!-- 
Book Store Template 
http://www.templatemo.com/preview/templatemo_086_book_store 
-->
</body>
</html>