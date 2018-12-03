<?php

session_start();
	
	if( !isset($_SESSION ['validUser'])) {
		header('Location: http://eternalmemoriessfg.com/WDV341/homework.php');
	
	}
	else
	{

	require 'PDOconnection.php';
	
	$event_name = $_POST['event_name'];
	
	$event_description = $_POST['event_description'];
	
	$event_presenter = $_POST['event_presenter'];
	
	$event_date = $_POST['event_date'];
	
	$sql = "INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date) VALUES (:eventName, :eventDescription, :eventPresenter, :eventDate)";
	
	try {

		$stmt = $conn->prepare($sql); 
		
		$stmt->bindParam(':eventName', $event_name);
		$stmt->bindParam(':eventDescription', $event_description);
		$stmt->bindParam(':eventPresenter', $event_presenter);
		$stmt->bindParam(':eventDate', $event_date);
		
		
		$stmt->execute();
	
	}
	catch(PDOException $e) {
	
		die();
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Test Form</title>
</head>

<body>
</body>
</html>