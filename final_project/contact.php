<?php

$success = "Email sent!";

$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Final Project Portfolio - Contact Page</title>
<style>

#orderArea	{
	width:600px;
	background-color:#2f95a3;
}

.error	{
	color:red;
	font-style:italic;	
}
</style>
</head>
<body>
	
	<section id="container">
	
	<nav>
<ul>
  <li><a href="index.php">Home Page</a></li>
  <li><a href="about.php">About Seafoam Gaming</a></li>
  <li><a href="gameReviews.php">Game Reviews</a></li>
  <li><a href="finalLogin.php">Admin Login</a></li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>
</nav>
	
<h1>WDV341 Intro PHP</h1>
<h2>Final Project Contact Page</h2>

<div class="orderArea">  
    <h3>Contact the owner of Seafoam Gaming.</h3>
	<p>This is where you can send off an email to me, the owner of Seafoam Gaming.</p>
    <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="email" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
  
	<?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("TheDreamingHawk@SeafoamGaming.com", $subject, $message, $from);
        echo $success;
        }
    }  
?>
	
</div>

<p><a href="http://eternalmemoriessfg.com/WDV341/homework.php">Return to the home page</a></p>
	</section>
		</body>
</html>