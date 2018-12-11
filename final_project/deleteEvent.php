<?php

 if( isset ( $_GET['review_id'] ) ) {
	 
	 $ifReviewID = $_GET['review_id'];
	 
 }
 else
 {
	
	header('Location: selectEvents.php'); 
	 
 }


try {
	include 'PDOconnection.php';

$stmt = $conn->prepare("DELETE FROM final_table WHERE review_id=:reviewid");

$stmt->bindParam(':reviewid', $ifReviewID);

$stmt->execute();



}
catch (PDOException $e) {


}
catch (Exception $e) {
	
	
	
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Event Page</title>
</head>

<body>
</body>
</html>