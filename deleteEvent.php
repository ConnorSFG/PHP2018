<?php

session_start();
	
	if( !isset($_SESSION ['validUser'])) {
		header('Location: http://eternalmemoriessfg.com/WDV341/homework.php');
	
	}
	else
	{


 if( isset ( $_GET['eventID'] ) ) {
	 
	 $ifEventID = $_GET['eventID'];
	 
 }
 else
 {
	
	header('Location: displayEvents.php'); 
	 
 }


try {
	include 'PDOconnection.php';

$stmt = $conn->prepare("DELETE FROM wdv341_event WHERE event_id=:eventID");

$stmt->bindParam(':eventID', $ifEventID);

$stmt->execute();



}
catch (PDOException $e) {


}
catch (Exception $e) {
	
	
	
	
}


	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Event Page</title>
</head>

<body>
</body>
</html>