	<?php

	$review_name = "";
	$review = "";
	$review_creator = "";
	$review_date = "";
	$review_time = "";

	$reviewNameErr = "";
	$reviewErr = "";
	$reviewCreatorErr = "";
	$reviewDateErr = "";
	$reviewTimeErr = "";
	
	$todaysDate = date('Y-m-d H:i:s');
	
	$valid_form = false;

	if( isset($_POST['Submit']) )
	{
		
		$review_name = $_POST["review_name"];
$review = $_POST["review"];
$review_creator = $_POST["review_creator"];
$review_date = $_POST["review_date"];
$review_time = $_POST["review_time"];
$valid_form = true;	
$honeypot = $_POST['robo'];
   if(!empty($_POST['robo']) ){
		die(); 
	}
else{
		
		function validateName($inValue)
			{
				global $valid_form, $reviewNameErr;		//Use the GLOBAL Version of these variables instead of making them local
				$reviewNameErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$reviewNameErr = "Name cannot be spaces";
				}
			}//end validateTitle()
			
			function validateDescription($inValue)
			{
				global $valid_form, $reviewErr;		//Use the GLOBAL Version of these variables instead of making them local
				$reviewErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$reviewErr = "Description cannot be spaces";
				}
			}//end validateDescription()
function validatePresenter($inValue)
			{
				global $valid_form, $reviewCreatorErr;		//Use the GLOBAL Version of these variables instead of making them local
				$reviewCreatorErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$reviewCreatorErr = "Presenter cannot be spaces";
				}
			}//end validatePresenter()
$valid_form = true;

validateName($review_name);
		validateDescription($review);
		validatePresenter($review_creator);
		
		
		if($valid_form) {
			include 'PDOconnection.php';
	
	$sql = "INSERT INTO final_table (review_name, review, review_creator, review_date, review_time) VALUES (:review_name, :review, :review_creator, :review_date, :review_time)";
	
	try {

		$stmt = $conn->prepare($sql); 
		
		$stmt->bindParam(':review_name', $review_name);
		
		$stmt->bindParam(':review', $review);
		
		$stmt->bindParam(':review_creator', $review_creator);
		
		$stmt->bindParam(':review_date', $review_date);

		$stmt->bindParam(':review_time', $review_time);
		
		$stmt->execute();
	
	}
	catch(PDOException $e) {
	
		{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
				error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			
				//Clean up any variables or connections that have been left hanging by this error.		
			
				header('Location: 505.php');	//sends control to a User friendly page					
			}
	}
		}
		else
		{
			$message = "Something went wrong";
		}//ends check for valid form		
	}
}//if submitted
?>
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <title>Upload Review</title>
        
        </head>
        
			<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">

			<script>
		function clearForm() {
			//alert("inside clearForm()");
			$('.errMsg').html("");					//Clear all span elements that have a class of 'errMsg'. 		
			$('input:text').removeAttr('value');	//REMOVE the value attribute supplied by PHP Validations
			$('textarea').html("");					//Clear the textarea innerHTML
		}
	</script>
			
			<style>

	#orderArea	{
	width:600px;
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
			
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#review_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
			
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
			
        <h1>Upload Game Review </h1>
        <p>Publish a Game Review to the Game Reviews page and see it live!.</p>
      
				<?php
			if($valid_form)
			{
		?>
			<h1>Form Was Successful</h1>
            <h2>Thank you for submitting your information</h2>     
            
            <?php
        echo "<p>$review_name</p>";
echo "<p>$review</p>";
echo "<p>$review_creator</p>";
echo "<p>$review_date</p>";
echo"<p>$review_date</p>";
?>

				<?php 
			}
				else
			{
				?>
			<div id = "orderArea">
				
				<input name="robo" type="text" id="robo" class="hide-robot">
				
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="review_name">Review Name: </label>
                <input type="text" name="review_name" id="review_name" value="<?php echo $review_name;  ?>" /> 
                <span class="error"> <?php echo $reviewNameErr; ?></span>
              </p>
  <p>
                <label for="review">Review Description:</label>
                  <textarea name="review" id="review" maxlength="40000"><?php echo $review; ?></textarea>
                <span class="error"><?php echo $reviewErr; ?></span>
              </p>
  
   <label for="review_creator">Review Author: </label>
                <input type="text" name="review_creator" id="review_creator" value="<?php echo $review_creator;  ?>" /> 
                <span class="error"> <?php echo $reviewCreatorErr; ?></span>
              </p>
  
   <p>
                <label for="review_date">Review Date:</label>
                  <input type="text" name="review_date" id="review_date" required value="<?php echo $review_date; ?>">
                  <span class="error"> <?php echo $reviewDateErr; ?></span>
              </p>
  <p><label>Review Time: 
    <input type="time" id="review_time" name="review_time" required value="<?php echo $review_time; ?>">  <span class="error"> <?php echo $reviewTimeErr; ?></span>
    </label>
  </p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" onClick = "clearForm()" />
  </p>
        <?php
			}	//end valid form confirmation 
		?>
				</form>
</div>
	</section>
</body>
</html>
