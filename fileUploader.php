<?php

if( isset($_POST['upFile']) )
	{
		$honeypot = $_POST['file'];
	if(!empty($_POST['file']) ){
		die(); 
	}else{
		$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["inFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["inFile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["inFile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
	}
	}
	}
	}
	else {
		
		
	
	
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Image</title>
<style>
		.hide-robot{
			display:none;
		}
		</style>
</head>
<body>

<h1>File Uploader</h1>

<form name = "form1" method="post" enctype="multipart/form-data" form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<input name="file" type="text" id="file" class="hide-robot">

<p>
  <label for="imageName">Picture Name</label>
  <input type="text" name="imageName" id="imageName" />
</p>
<p><label for= "inFile">Please upload an image here:</label> 
  <input type="file" name="inFile" id = "inFile">
</p>
	<p>
     <input type="submit" name="upFile" id="upFile" value="Upload File">
    <input type="reset" name="button2" id="button2" value="Reset">
    </p>
    
    </form>
<?php
	}
?>
</body>
</html>