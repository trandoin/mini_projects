<?php

include('config.php');

if (isset($_POST['submit'])) {
	
	$file = '';
	$file_temp = '';
	$data = '';
	$location = 'Upload/';
	foreach ($_FILES['images']['name'] as $key=>$val) 
	{
		$file = $_FILES['images']['name'][$key];
		$file_temp = $_FILES['images']['tmp_name'][$key];
		move_uploaded_file($file_temp, $location.$file);
		$data .=$file.'';
	}
	
	$query = "INSERT INTO images (images) values ('$data') ";
	$fire = mysqli_query($con,$query);
	if ($file) {
		echo "Successfull";
	}else{
		echo "Failed";
	}
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Upload Multiple images</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="images[]" multiple="">
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>