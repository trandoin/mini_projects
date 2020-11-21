<?php 
require_once("include/DB.php");

if(isset($_POST["Submit"])) {
	if(!empty($_POST["EName"]) && !empty($_POST["SSN"])) {
		$EName       = $_POST["EName"];
		$SSN         = $_POST["SSN"];
		$Dept        = $_POST["Dept"];
		$Salary      = $_POST["Salary"];
		$HomeAddress = $_POST["HomeAddress"];
		global $ConnectingDB; # global used bcoz we can use any version of php
		$sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)
        VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('enamE',$EName);
        $stmt->bindValue('ssN',$SSN);
        $stmt->bindValue('depT',$Dept);
        $stmt->bindValue('salarY',$Salary);
        $stmt->bindValue('homeaddresS',$HomeAddress);
        $Execute = $stmt->execute();
        if ($Execute) {
        	echo "<span class='success'><h2>Record has been Added Successfully</h2></span>";
        }
	}
	else{
		echo "<span class='FieldInfoHeading'>Please Add Atleast Name and Security Number</span>";
	}
}



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Insert data into database</title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>
<div class="">
	<h2>Please Enter Your Details</h2>
	<form class="" action="insert_into_Database.php" method="post">
		<fieldset>
			<samp class="FieldInfo">Employee Name:</samp>
			<br>
			<input type="text" name="EName" value="" required="">
			<br>
			<samp class="FieldInfo">Social Security Number:</samp>
			<br>
			<input type="text" name="SSN" value="" required="">
			<br>
			<samp class="FieldInfo">Department:</samp>
			<br>
			<input type="text" name="Dept" value="" required="">
			<br>
			<samp class="FieldInfo">Salary:</samp>
			<br>
			<input type="text" name="Salary" value="" required="">
			<br>
			<samp class="FieldInfo">Home Address:</samp>
			<br>
			<textarea name="HomeAddress" rows="8" cols="80"></textarea>
			<br>
			<input type="submit" name="Submit" value="Submit Your Record">
		</fieldset>
	</form>
	<p><a href="View_From_Database.php">View Insert Details</a></p>
</div>
</body>
</html>