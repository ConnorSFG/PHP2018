<?php

	include 'PDOconnection.php';			//connects to the database

	$stmt = $conn->prepare("SELECT review_id,review_name,review_creator FROM final_table");
	$stmt->execute();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select Events</title>
</head>

	<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">
	
<style> 

	#orderArea	{
	width:300px;
	background-color:#34485b;
}

.error	{
	color:red;
	font-style:italic;	
}
	
.hide-robot{
			display:none;
		}

}
</style>
	
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
	<div id = "orderArea">
<table border='1'>
	<tr>
		<td>ID</td>
		<td>Game Title</td>
		<td>Author</td>
		<td>UPDATE</td>
		<td>DELETE</td>
<?php 
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>" . $row['review_id'] . "</td>";
			echo "<td>" . $row['review_name'] . "</td>";	
			echo "<td>" . $row['review_creator'] . "</td>";
			echo "<td><a href='UpdateEventsForm.php?review_id=" . $row['review_id'] . "'>Update</a></td>"; 
			echo "<td><a href='deleteEvent.php?review_id=" . $row['review_id'] . "'>Delete</a></td>"; 		
		echo "</tr>";
	}
?>
</table>
	</div>
	</section>
</body>
</html>