<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "bhanu@1995");
  mysql_select_db("test");
  $sql = "SELECT `imagesrc` FROM `books` WHERE `id`=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['imagesrc'];
?>