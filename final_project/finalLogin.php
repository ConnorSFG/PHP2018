<?php 
session_cache_limiter('none');
	session_start();
	
	$_SESSION['validUser'] = "";
	$user_Err = "";
	$password_Err = "";
	$inUsername = "";
	$inPassword = "";
	$message = "";
	$messErr = "";
	
	if ($_SESSION['validUser'] == "yes")
	
	{
		$message = "Welcome Back!";
	}
	else
	{
if(isset($_POST["submitForm"]))
{
	
$inUsername = $_POST["inUsername"];
$inPassword = $_POST["inPassword"];

	try {
	require 'PDOconnection.php';
	
		$todaysDate = date("Y-m-d");
		
		$stmt = $conn->prepare("SELECT final_username, final_password FROM final_project WHERE final_username = :uname AND final_password = :pw"); 
		
		$stmt->bindParam(':uname', $inUsername);
		$stmt->bindParam(':pw', $inPassword);
		
		$stmt->execute();
	}
	catch(PDOException $e) {
		$messErr = "There has been an issue, please try again later";
        error_log($e->getMessage());
		error_log($e->getLine());
		error_log(var_dump(debug_backtrace()));
		header('Location: 505.php');
	}
	
	$row = $stmt->rowCount();
	
	if ($row == 1)
	{
		$_SESSION['validUser']= "yes";
		$message = "Welcome Back! $inUsername";
	}
	else {
		$_SESSION['validUser']= "";
		$messErr = "Invalid info entered, please redo the fields.";
	}


}

?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Final Project Portfolio - Login Page</title>
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
<h2>Final Project Login Page</h2>

<?php

if ($_SESSION['validUser'] == "yes")

{

?>

<p><a href="eventsForm.php">Upload Game Review</a></p>
<p><a href="selectEvents.php">Display Content</a></p>
<p><a href="finalLogout.php">Log out of your session</a></p>


<?php
	}
	else
	{
		?>

<div id="orderArea">
  <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h3>Login Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">Username:</td>
      <td width="300"><input type="text" name="inUsername" id="inUsername"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="inPassword" id="inPassword" /></td>
      <span class = "error"><?php echo $messErr; ?></span>
    </tr>

  </table>
  <p>
    <input type="submit" name="submitForm" id="submitForm" value="Register" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
</div>

<?php
	}}
	?>

<p><a href="http://eternalmemoriessfg.com/WDV341/final/index.php">Return to the home page</a></p>
	</section>
		</body>
</html>