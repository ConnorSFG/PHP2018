<?php
	
	include 'PDOconnection.php';			//connects to the database

	$stmt = $conn->prepare("SELECT review_id,review_name,review, review_creator, DATE_FORMAT(review_date, '%m/%d/%Y') AS display_date FROM final_table ORDER BY review_date DESC");
	$stmt->execute();
	
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Final Project Portfolio - Review Page</title>
<style>

#orderArea	{
	width:600px;
	background-color:#2f95a3;
}

.error	{
	color:red;
	font-style:italic;	
}
	nav {
	background-color: #00cccc;
	box-sizing:border-box;
	border: thin solid black;
}

main {

background-color:#2f95a3;
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
	background-color:#003333;
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
<div id="orderArea">	
<h1>WDV341 Intro PHP</h1>
<h2>Final Project Home Page</h2>



	<p>Here are examples of recent reviews I have uploaded to this page, from my main website!</p>

        
        <div class = "grid-container">
        	<nav>
            <h3>Seafoam Gaming Reviews!</h3>
			</nav>
            

<main>
	<h2>Recent Reviews</h2>
    
    <?php
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC) )
	{
		?>
		<article>
<div class= "grid-container-article">
            <h1><?php echo $row['review_name']; ?></h1>
                	<p><?php echo $row['display_date']; ?></p>
                    </div>
            <h2>Review Body</h2>
        <p><?php echo $row['review']; ?></p>        
        <h3>Author: <?php echo $row['review_creator'];?> </h3>
    </article>
<?php
	}
	?>
	
<p><a href="http://eternalmemoriessfg.com/WDV341/final/index.php">Return to the home page</a></p>
			</main>
	</div>
<footer>
<p>Connor The Dreamer</p>
</footer>
		</div>
		</body>
</html>