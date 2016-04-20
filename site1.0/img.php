<?php
$query = mysql_query("SELECT `imagesrc` FROM `books` WHERE `id` = ".$_GET['id']);
$row = mysql_fetch_assoc($query);
header("Content-type: image/jpeg");
echo $row['imagesrc'];
?>