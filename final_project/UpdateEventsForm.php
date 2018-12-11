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
$valid_form = false;

$todaysDate = date("Y-m-d");

$updateReview_id = $_GET['review_id'];

if(isset($_POST["Submit"]))
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

if($valid_form)
		{
			$message = "Success";
			
			try {
				
				require 'PDOconnection.php';	//CONNECT to the database
				
				
				
				//Create the SQL command string
				$sql = "UPDATE final_table SET ";
				$sql .= "review_name='$review_name', ";
				$sql .= "review='$review', ";
				$sql .= "review_creator='$review_creator', ";
				$sql .= "review_date='$review_date', ";
				$sql .= "review_time='$review_time' ";
				$sql .= "WHERE review_id='$updateReview_id'";
				//PREPARE the SQL statement
				
				$stmt = $conn->prepare($sql);
				
				$stmt->execute();	
				
				$message = "The Review has been Updated.";
			}
catch(PDOException $e)
			{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
				error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			
				//Clean up any variables or connections that have been left hanging by this error.		
			
				header('Location: 505.php');	//sends control to a User friendly page					
			}
			
		}
		else
		{
			$message = "Something went wrong";
		}//ends check for valid form		
		
}
	}
	else
	{
		//Form has not been seen by the user.  display the form with the selected event information	
		try {
		  
		  require 'PDOconnection.php';	//CONNECT to the database
		  
		  
		  
		  //Create the SQL command string
		  $sql = "SELECT ";
		  $sql .= "review_name, ";
		  $sql .= "review, ";
		  $sql .= "review_creator, ";
		  $sql .= "review_date, ";
		  $sql .= "review_time ";
		  $sql .= " FROM final_table ";
		  $sql .= "WHERE review_id='$updateReview_id'";
		  
		  //PREPARE the SQL statement
		  $stmt = $conn->prepare($sql);
		  
		  //EXECUTE the prepared statement
		  $stmt->execute();		
		  
		  //RESULT object contains an associative array
		  $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		  
		  $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
				
			$review_name=$row['review_name'];
			$review=$row['review'];
			$review_creator=$row['review_creator'];
			$review_date=$row['review_date'];			
			$review_time=$row['review_time'];
		}
catch(PDOException $e)
	  {
		  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
		  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
		  error_log($e->getLine());
		  error_log(var_dump(debug_backtrace()));
	  echo "top of page";
		  //Clean up any variables or connections that have been left hanging by this error.		
	  
		  header('Location: 505.php');	//sends control to a User friendly page					
	  }	
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Update Form</title>
</head>
	
<link rel="stylesheet" type="text/css" href="CSS/finalstyle.css">
	
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

		
			[id^="errMsg"]	{
				color:red;	
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
  
  <script>
		function clearForm() {
			//alert("inside clearForm()");
			$('.errMsg').html("");					//Clear all span elements that have a class of 'errMsg'. 		
			$('input:text').removeAttr('value');	//REMOVE the value attribute supplied by PHP Validations
			$('textarea').html("");					//Clear the textarea innerHTML
		}
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
		
<h1>Update Review Form</h1>
<h3>Update the review here in case you need to adjust something.</h3>
<hr />

<?php

if ($valid_form)
			{
        ?>
      <h1><?php echo $message ?></h1>
        
        <?php
			}
			else	//display form
			{
        ?>

<div id = "orderArea">
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?review_id=$updateReview_id"; ?>">
  
  <input name="robo" type="text" id="robo" class="hide-robot">
  
  <p>
                <label for="review_name">Review Name: </label>
                <input type="text" name="review_name" id="review_name" value="<?php echo $review_name;  ?>" /> 
                <span class="errMsg"> <?php echo $reviewNameErr; ?></span>
              </p>
  <p>
                <label for="review">Review Description:</label>
                  <textarea name="review" id="review" maxlength="40000"><?php echo $review; ?></textarea>
                <span class="errMsg"><?php echo $reviewErr; ?></span>
              </p>
  
   <label for="review_creator">Review Author: </label>
                <input type="text" name="review_creator" id="review_creator" value="<?php echo $review_creator;  ?>" /> 
                <span class="errMsg"> <?php echo $reviewCreatorErr; ?></span>
              </p>
  
   <p>
                <label for="review_date">Review Date:</label>
                  <input type="text" name="review_date" id="review_date" required value="<?php echo $review_date; ?>">
                  <span class="errMsg"> <?php echo $reviewDateErr; ?></span>
              </p>
  <p><label>Review Time: 
    <input type="time" id="review_time" name="review_time" required value="<?php echo $review_time; ?>">  <span class="errMsg"> <?php echo $reviewTimeErr; ?></span>
    </label>
  </p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" onClick="clearForm()" />
  </p>
</form>
<?php
			}
			?>
</div>
	</section>
</body>
</html>
