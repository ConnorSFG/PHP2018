<?php

include 'Emailer.php';

$businessEmail = new Emailer();

$businessEmail->setMessageLine("Hello everyone, it is me, Connor from EternalmemoriesSFG sending a test email via the PHP system. Hopefully you got this sent out.");

$businessEmail->setSenderAddress("owner@eternalmemoriessfg.com");

$businessEmail->setSendToAddress("connorouting@yahoo.com");

$businessEmail->setSubjectLine("Test Email from THE BEST NYA FOX EVER");

$validEmail = $businessEmail->sendPHPEmail();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<p>WDV341 Class Example</p>
<p>The email is from:  <?php echo $businessEmail->getSenderAddress(); ?></p>
<p>Send email to:  <?php echo $businessEmail->getSendToAddress(); ?></p>
<p>Subject Line:  <?php echo $businessEmail->getSubjectLine(); ?></p>
<p> Your email message is: <?php echo $businessEmail->getMessageLine(); ?></p>
<?php 
	if ($validEmail) {
		?>
        <p>Your message has been sent successfully</p>
        <?php
	}
	else
	{
		?>
        <p>Sorry, your message failed to send.</p>
        <?php
	}
	?>

</body>
</html>