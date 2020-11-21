<?php 
require_once("include/DB.php");

$SearchQueryParameter = $_GET["id"];

if(isset($_POST["Submit"])) {
	
		$EName       = $_POST["EName"];
		$SSN         = $_POST["SSN"];
		$Dept        = $_POST["Dept"];
		$Salary      = $_POST["Salary"];
		$HomeAddress = $_POST["HomeAddress"];
		global $ConnectingDB; # global used bcoz we can use any version of php
		$sql = "UPDATE emp_record SET ename='$EName',ssn='$SSN',dept='$Dept',salary='$Salary',homeaddress='$HomeAddress' WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB->query($sql);
        if ($Execute) {
        	echo '<script>window.open("View_From_Database.php?id="Record Updated SucessFully","_self")</script>';
        }
	}
	

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Update data into database</title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>
	<?php 

    global $ConnectingDB;
    $sql = "SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
    $stmt = $ConnectingDB->query($sql);
    while ($DataRows = $stmt->fetch()) {
    	$Id          = $DataRows["id"];
      	$EName       = $DataRows["ename"];
      	$SSN         = $DataRows["ssn"];
      	$Department  = $DataRows["dept"];
      	$Salary      = $DataRows["salary"];
      	$HomeAddress = $DataRows["homeaddress"];
    }


	 ?>
<div>
	<form class="" action="Update.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
		<fieldset>
			<samp class="FieldInfo">Employee Name:</samp>
			<br>
			<input type="text" name="EName" value="<?php echo "$EName" ?>">
			<br>
			<samp class="FieldInfo">Social Security Number:</samp>
			<br>
			<input type="text" name="SSN" value="<?php echo "$SSN" ?>">
			<br>
			<samp class="FieldInfo">Department:</samp>
			<br>
			<input type="text" name="Dept" value="<?php echo "$Department" ?>">
			<br>
			<samp class="FieldInfo">Salary:</samp>
			<br>
			<input type="text" name="Salary" value="<?php echo "$Salary" ?>">
			<br>
			<samp class="FieldInfo">Home Address:</samp>
			<br>
			<textarea name="HomeAddress" rows="8" cols="80"><?php echo "$HomeAddress" ?></textarea>
			<br>
			<input type="submit" name="Submit" value="Submit Your Record">
		</fieldset>
	</form>
	<p><a href="View_From_Database.php">View Updated Details</a></p>
</div>
</body>
</html>