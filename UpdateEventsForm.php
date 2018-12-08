<?php 

session_start();
	
	if( !isset($_SESSION ['validUser'])) {
		header('Location: http://eternalmemoriessfg.com/WDV341/homework.php');
	
	}
	else
	{

$event_name = "";
$event_description = "";
$event_presenter = "";
$event_date = "";
$event_time = "";

$eventNameErr = "";
$eventDescriptionErr = "";
$eventPresenterErr = "";
$eventDateErr = "";
$eventTimeErr = "";
$valid_form = false;

$todaysDate = date("Y-m-d");

$updateEvent_id = $_GET['event_id'];

if(isset($_POST["Submit"]))
{

$event_name = $_POST["event_name"];
$event_description = $_POST["event_description"];
$event_presenter = $_POST["event_presenter"];
$event_date = $_POST["event_date"];
$event_time = $_POST["event_time"];
$valid_form = true;	
$honeypot = $_POST['robo'];
   if(!empty($_POST['robo']) ){
		die(); 
	}
else{

function validateName($inValue)
			{
				global $valid_form, $eventNameErr;		//Use the GLOBAL Version of these variables instead of making them local
				$eventNameErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$eventNameErr = "Name cannot be spaces";
				}
			}//end validateTitle()
			
			function validateDescription($inValue)
			{
				global $valid_form, $eventDescriptionErr;		//Use the GLOBAL Version of these variables instead of making them local
				$eventDescriptionErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$eventDescriptionErr = "Description cannot be spaces";
				}
			}//end validateDescription()
function validatePresenter($inValue)
			{
				global $valid_form, $eventPresenterErr;		//Use the GLOBAL Version of these variables instead of making them local
				$eventPresenterErr = "";
				
				if($inValue == "")
				{
					$valid_form = false;
					$eventPresenterErr = "Presenter cannot be spaces";
				}
			}//end validateTitle()
$valid_form = true;

validateName($event_name);
		validateDescription($event_description);
		validatePresenter($event_presenter);

if($valid_form)
		{
			$message = "Success";
			
			try {
				
				require 'PDOconnection.php';	//CONNECT to the database
				
				
				
				//Create the SQL command string
				$sql = "UPDATE wdv341_event SET ";
				$sql .= "event_name='$event_name', ";
				$sql .= "event_description='$event_description', ";
				$sql .= "event_presenter='$event_presenter', ";
				$sql .= "event_date='$event_date', ";
				$sql .= "event_time='$event_time' ";
				$sql .= "WHERE event_id='$updateEvent_id'";
				//PREPARE the SQL statement
				
				
				
				$stmt = $conn->prepare($sql);
				
				$stmt->execute();	
				
				$message = "The Event has been Updated.";
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
		  $sql .= "event_name, ";
		  $sql .= "event_description, ";
		  $sql .= "event_presenter, ";
		  $sql .= "event_date, ";
		  $sql .= "event_time ";
		  $sql .= " FROM wdv341_event ";
		  $sql .= "WHERE event_id='$updateEvent_id'";
		  
		  //PREPARE the SQL statement
		  $stmt = $conn->prepare($sql);
		  
		  //EXECUTE the prepared statement
		  $stmt->execute();		
		  
		  //RESULT object contains an associative array
		  $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		  
		  $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
				
			$event_name=$row['event_name'];
			$event_description=$row['event_description'];
			$event_presenter=$row['event_presenter'];
			$event_date=$row['event_date'];			
			$event_time=$row['event_time'];
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
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Update Form</title>
</head>

<style> 

.hide-robot{
			display:none;
		}

		
			[id^="errMsg"]	{
				color:red;	
			}

#container {
	background-color:white;
	margin:auto;
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#event_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
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

<h1>Intro to PHP Form Homework</h1>
<h3>Form test to see if PHP and a local database can link for a successful form.</h3>
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

<div id = "container">
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?event_id=$updateEvent_id"; ?>">
  
  <input name="robo" type="text" id="robo" class="hide-robot">
  
  <p>
                <label for="event_name">Event Name: </label>
                <input type="text" name="event_name" id="event_name" value="<?php echo $event_name;  ?>" /> 
                <span class="errMsg"> <?php echo $eventNameErr; ?></span>
              </p>
  <p>
                <label for="event_description">Event Description:</label>
                  <textarea name="event_description" id="event_description" maxlength="700"><?php echo $event_description; ?></textarea>
                <span class="errMsg"><?php echo $eventDescriptionErr; ?></span>
              </p>
  
   <label for="event_name">Event Presenter: </label>
                <input type="text" name="event_presenter" id="event_presenter" value="<?php echo $event_presenter;  ?>" /> 
                <span class="errMsg"> <?php echo $eventPresenterErr; ?></span>
              </p>
  
   <p>
                <label for="event_date">Event Date:</label>
                  <input type="text" name="event_date" id="event_date" required value="<?php echo $event_date; ?>">
                  <span class="errMsg"> <?php echo $eventDateErr; ?></span>
              </p>
  <p><label>Event Time: 
    <input type="time" id="event_time" name="event_time" required value="<?php echo $event_time; ?>">  <span class="errMsg"> <?php echo $eventTimeErr; ?></span>
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
</body>
</html>
