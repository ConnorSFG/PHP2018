<?php
	
	include 'PDOConnection.php';			//connects to the database

	$stmt = $conn->prepare("SELECT event_id,event_name,event_description FROM wdv341_event WHERE event_id='6';");
	$stmt->execute();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select a Single Event</title>
</head>

<body>

<table border='1'>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Description</td>
		<td>UPDATE</td>
		<td>DELETE</td>
		</tr>
<?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>" . $row['event_id'] . "</td>";
			echo "<td>" . $row['event_name'] . "</td>";	
			echo "<td>" . $row['event_description'] . "</td>";
			echo "<td><a href='updateEvent.php?eventID=" . $row['event_id'] . "'>Update</a></td>"; 
			echo "<td><a href='deleteEvent.php?eventID=" . $row['event_id'] . "'>Delete</a></td>"; 		
		echo "</tr>";
	}
?>
</table>

</body>
</html>