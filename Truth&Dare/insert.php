<?php 
require_once("include/DB.php");

if(isset($_POST["Submit"])) {
	if(!empty($_POST["Name"]) && !empty($_POST["One"])) {
		$NAME        = $_POST["Name"]
		$ONE         = $_POST["One"];
		$TWO         = $_POST["Two"];
		$THREE       = $_POST["Three"];
		$FOUR        = $_POST["Four"];
		$FIVE        = $_POST["Five"];
		$SIX         = $_POST["Six"];
		$SEVEN       = $_POST["Seven"];
		$EIGHT       = $_POST["Eight"];
		$NINE        = $_POST["Nine"];
		$TEN         = $_POST["Ten"];
		global $ConnectingDB; # global used bcoz we can use any version of php
		$sql = "INSERT INTO truth_dare(name,one,two,three,four,five,six,seven,eight,nine,ten)
        VALUES(:namE,:onE,:twO,:threE,:fouR,:fivE,:siX,:seveN,:eighT,:ninE,:teN)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue('namE',$NAME);
        $stmt->bindValue('onE',$ONE);
        $stmt->bindValue('twO',$TWO);
        $stmt->bindValue('threE',$THREE);
        $stmt->bindValue('fouR',$FOUR);
        $stmt->bindValue('fivE',$FIVE);
        $stmt->bindValue('siX',$SIX);
        $stmt->bindValue('seveN',$SEVEN);
        $stmt->bindValue('eighT',$EIGHT);
        $stmt->bindValue('ninE',$NINE);
        $stmt->bindValue('teN',$TEN);
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
	<form class="" action="insert.php" method="POST">
		<fieldset>
			<samp class="FieldInfo">Enter Your Name:</samp>
			<br>
			<input type="text" name="Name" value="" required="">
			<br>
			<samp class="FieldInfo">1.My contact name in your phone?:</samp>
			<br>
			<input type="text" name="One" value="" required="">
			<br>
			<samp class="FieldInfo">2.The nick name you want to give me?:</samp>
			<br>
			<input type="text" name="Two" value="" required="">
			<br>
			<samp class="FieldInfo">3.Things you like most in me?:</samp>
			<br>
			<input type="text" name="Three" value="" required="">
			<br>
			<samp class="FieldInfo">4.Color that suits me?:</samp>
			<br>
			<input type="text" name="Four" value="" required="">
			<br>
			<samp class="FieldInfo">5.Relation status you want to be with me?(No Cheating):</samp>
			<br>
			<input type="text" name="Five" value="" required="">
			<br>
			<samp class="FieldInfo">6.The thing you like most in my character?:</samp>
			<br>
			<input type="text" name="Six" value="" required="">
			<br>
			<samp class="FieldInfo">7.The thing you hate in my attitude?:</samp>
			<br>
			<input type="text" name="Seven" value="" required="">
			<br>
			<samp class="FieldInfo">8.Which type of dresses suits me most?:</samp>
			<br>
			<input type="text" name="Eight" value="" required="">
			<br>
			<samp class="FieldInfo">9.Dedicate a song for our relationship?:</samp>
			<br>
			<input type="text" name="Nine" value="" required="">
			<br>
			<samp class="FieldInfo">10.Write somethings about me?:</samp>
			<br>
			<input type="text" name="Ten" value="" required="">
			<br>
			<input type="submit" name="Submit" value="Submit Your Record">
		</fieldset>
	</form>
	<p><a href="view.php">View Insert Details</a></p>
</div>
</body>
</html>