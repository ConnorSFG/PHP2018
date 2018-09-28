<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Test Form</title>
</head>

<style> 

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

<body>

<h1>Intro to PHP Form Homework</h1>
<h3>Form test to see if PHP and a local database can link for a successful form.</h3>
<hr />


<div id = "container">
<form id="form1" name="form1" method="post" action="insertEvent.php">
  <p><label>Event Name:
    <input type="text" name="event_name" id="event_name" />
    </label>
</p>
  <p><label>Event Description: 
    <input type="text" name="event_description" id="event_description" size="100" />
    </label>
  </p>
  
   <p><label>Event Presenter: 
    <input type="text" name="event_presenter" id="event_presenter" />
    </label>
  </p>
  
  <p><label>Event Date: 
    <input type="text" name="event_date" id="event_date" />
    </label>
  </p>
  <p><label>Event Time: 
    <input type="time" id="event-time" name="event-time" />
    </label>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </p>
</form>

</div>
</body>
</html>
