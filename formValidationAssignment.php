<?php
	$name_Err = "";
	$ss_Err = "";
	$radio_Err = "";
	$inName = "";
	$inSS = "";
	$RadioGroup1 = "";
	$valid_form = false;
	
if(isset($_POST["submitForm"]))
{
	echo "<h1>You have submitted the form. Preparing to put into database.</h1>";
	
$inName = $_POST["inName"];
$inSS = $_POST["inSS"];
if( isset($_POST['RadioGroup1'] )) {
		$RadioGroup1 = $_POST['RadioGroup1'];
		}
		else {
			$RadioGroup1 = "";
		}

$valid_form = true;

include "formvalidationFunctions.php";

if( validateName($inName) ) {
	
	
}
else
{
	$valid_form = false;
	$name_Err = " Please enter your name.";
}

if( validateSS($inSS) ) {
	
	
}
else
{
	$valid_form = false;
	$ss_Err = " Please enter your SSN.";
	
}

if(validateRadio($RadioGroup1) ) {
	
	
}
else
{
	$valid_form = false;
	$radio_Err = " Please choose an option.";
	
}
	

if($valid_form) {
	
	include 'PDOconnection.php';
	
	$sql = "INSERT INTO wdv341_selfpost (fname, ssn, radio) VALUES (:fname, :ssn, :radio)";
	
	try {

		$stmt = $conn->prepare($sql); 
		
		$stmt->bindParam(':fname', $inName);
		$stmt->bindParam(':ssn', $inSS);
		$stmt->bindParam(':radio', $RadioGroup1);
		
		
		$stmt->execute();
	
	}
	catch(PDOException $e) {
	
		die();
	}
}
else {
	
}


}
//else
//{

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Form Validation Example</title>
<style>

#orderArea	{
	width:600px;
	background-color:#CF9;
}

[id^="error"]	{
	color:red;
	font-style:italic;	
}
</style>
</head>
<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Validation Assignment
</h2>

<?php 
	if($valid_form)
	{
		?>
        <h1>Form Was Successful</h1>
        <?php
        echo "<p>$inName</p>";
echo "<p>$inSS</p>";
echo "<p>$RadioGroup1</p>";
?>

<?php
	}
	else
	{
		?>


<div id="orderArea">
  <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h3>Customer Registration Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">Name:</td>
      <td width="300"><input type="text" name="inName" id="inName" size="15" value="<?php echo $inName; ?>"/><span id="error"><?php echo $name_Err; ?></span></td>
      <td width="210" class="error"></td>
    </tr>
    <tr>
      <td>Social Security</td>
      <td><input type="text" name="inSS" id="inSS" size="9" value="<?php echo substr ($inSS, 0, 9); ?>" /><span id="error"><?php echo $ss_Err; ?></span></td>
      <td class="error"></td>
    </tr>
    <tr>
      <td>Choose a Response</td>
      <td><p>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_0" value= "Phone" <?php if($RadioGroup1 == "Phone"){ echo "checked"; } ?>>
          Phone</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_1" value = "Email" <?php if($RadioGroup1 == "Email"){ echo "checked"; } ?>>
          Email</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_2" value = "US Mail" <?php if($RadioGroup1 == "US Mail"){ echo "checked"; } ?>>
          US Mail</label><span id="error"><?php echo $radio_Err; ?></span>
        <br>
      </p></td>
      <td class="error"></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="submitForm" id="submitForm" value="Register" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
</div>

<?php

	}
	?>
</body>
</html>