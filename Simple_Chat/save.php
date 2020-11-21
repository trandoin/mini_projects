<?php
	include 'database.php';
	$name=$_POST['name'];
	$email=$_POST['email'];

	$sql = "INSERT INTO `data`( `name`, `email`) 
	VALUES ('$name','$email')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
 