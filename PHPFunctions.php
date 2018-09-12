<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Functions Assignment</title>
</head>

<body>

<?php

date_default_timezone_set('UTC');

$str = 'DMACC';

echo date("F j, Y, g:i a") . "<br>"; 

echo date ("l jS \of F Y h:i:s A") . "<br>";

echo strlen($str) . "<br>";

echo trim($str, "D") . "<br>";

 if (ctype_upper($str)) {
        echo "<br>The string $str consists of all uppercase letters.\n";
    } else {
        echo "<br>The string $str does not consist of all uppercase letters.\n";
    }

echo "<br>". number_format("1234567890");

$number = 123456;
setlocale(LC_MONETARY,"en_US");
echo money_format("<br>The price is %i", $number);
?>

</body>
</html>