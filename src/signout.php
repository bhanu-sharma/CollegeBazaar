<!DOCTYPE=html>
<html lang="en-US">
<head></head>
<body>
<?php
session_start();
session_destroy();
header("location: login.html");
?>
</body>
</html>