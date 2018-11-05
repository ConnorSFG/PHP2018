<?php
	
	include 'PDOConnection.php';			//connects to the database

	$stmt = $conn->prepare("SELECT event_id,event_name,event_description, event_presenter, DATE_FORMAT(event_date, '%m/%d/%Y') AS display_date FROM wdv341_events ORDER BY event_date DESC");
	$stmt->execute();
	
	//while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	//{
		//echo "<tr>";
		//	echo "<td>" . $row['event_id'] . "</td>";
		//	echo "<td>" . $row['event_name'] . "</td>";	
		//	echo "<td>" . $row['event_description'] . "</td>";
		//	echo "<td><a href='updateEvent.php?eventID=" . $row['event_id'] . "'>Update</a></td>"; 
		//	echo "<td><a href='deleteEvent.php?eventID=" . $row['event_id'] . "'>Delete</a></td>"; 		
		//echo "</tr>";
	//}
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP SQL Article</title>

<style>

#container {
	width:960px;
	background-color:lightblue;
	margin-left:auto;
	margin-right:auto;
}

nav {
	background-color: #C66;
	box-sizing:border-box;
	border: thin solid black;
}

main {

background-color:#3FC;
box-sizing:border-box;
border: thin solid black;	
}

.grid-container {
		display:grid;
	grid-template-columns: 1fr 3fr;
}

.grid-container-article {
	display:grid;
	grid-template-columns: 4fr 1fr;
}

article {
	background-color: white;
		width:70%;
		box-sizing:border-box;
		margin-left:auto;
		margin-right:auto;
}

article p {
	margin-left:20px;	
}

footer  {
	background-color:#9C3;
}
</style>

</head>
<body>

<div id="container">

	<header>
    	<h1>Conferences R Us</h1>
        </header>
        
        <div class = "grid-container">
        	<nav>
            <h3>Locator</h3>
			</nav>
            

<main>
	<h2>Events in your city</h2>
    
    <?php
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC) )
	{
		?>
    
<article>
<div class= "grid-container-article">
            <h1><?php echo $row['event_name']; ?></h1>
                	<p><?php echo $row['display_date']; ?></p>
                    </div>
            <h2>Event Description</h2>
        <p><?php echo $row['event_description']; ?></p>        
        <h3>Presented By: <?php echo $row['event_presenter'];?> </h3>
    </article>
    <?php
	}
	?>
</main>
</div>
<footer>
<p>DON'T MAKE ME COME DOWN THERE</p>
</footer>
</div>
</body>
</html>