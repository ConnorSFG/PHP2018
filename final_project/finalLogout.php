<?php

	session_start();
	
	$_SESSION['validUser'] = "";
	session_unset('validUser');
	
	session_destroy();
	
	header('Location: http://eternalmemoriessfg.com/WDV341/final/index.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logout</title>
</head>

<body>
</body>
</html>