<?php 

$NameError="";
$EmailError="";
$GenderError="";
$WebsiteError="";

if (isset($_POST['Submit'])) {
	if (empty($_POST["Name"])) {
		$NameError="Name is Required";
	}
   else{
   	$Name=Test_User_Input($_POST["Name"]);
   	if (!preg_match("/^[A-Za-z\. ]*$/",$Name)) {
   		$NameError="Only Letters and white spaces are allowed";
   	}
   }
   if (empty($_POST["Email"])) {
		$EmailError="Email is Required";
	}
   else{
   	$Email=Test_User_Input($_POST["Email"]);
   	#	if (!preg_match("/[a-zA-Z0-9._-] {3,} @ [a-zA-Z0-9._-] {3,} [.] {1} [a-zA-Z0-9._-] {2,}/",$Email))
    if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
    	# code...
    	$EmailError="Invalid Email";
    }
   	 
   }
    if (empty($_POST["Gender"])) {
		$GenderError="Gender is Required";
	}
   else{
   	$Gender=Test_User_Input($_POST["Gender"]);
   }
    if (empty($_POST["Website"])) {
		$WebsiteError="Website is Required";
	}
   else{
   	$Website=Test_User_Input($_POST["Website"]);
   		if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~'!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~'!']*/",$Website)) {
   		$WebsiteError="Please Enter Website url";
   	}
   }
   # Check For Fiels are not Empty....
   if (!empty($_POST["Name"])&& !empty($_POST["Email"])&& !empty($_POST["Gender"])&& !empty($_POST["Website"])) {
   	# if fiels are not correct then not submit your data...
   	if ((preg_match("/^[A-Za-z\. ]*$/",$Name)==true)&&
   		#(preg_match("/[a-zA-Z0-9._-] {3,} @ [a-zA-Z0-9._-] {3,} [.] {1} [a-zA-Z0-9._-] {2,}/",$Email)==true)
   		(filter_var($Email,FILTER_VALIDATE_EMAIL))&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~'!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~'!']*/",$Website)==true)) {
   		# code...
    
echo "<h2>Your Submit Information</h2><br>";
echo "Name: {$_POST["Name"]}<br>";
echo "Email: {$_POST["Email"]}<br>";
echo "Gender: {$_POST["Gender"]}<br>";
echo "Website: {$_POST["Website"]}<br>";
echo "Comment: {$_POST["Comment"]}<br>";
}
else{
	echo "<span class='Error'> Please complete and correct your form again </span>";
}
}
}

 function Test_User_Input($Data){
 	return $Data;
 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Validation Project</title>
	<style type="text/css">
		input[type="text"],input[type="email"],textarea{
			border: 1px solid dashed;
			background-color: rgb(221,216,212);
			width: 600px;
			padding: .5em;
			font-size: 1.0em;
		}
		.Error{
			color: red;
		}
	</style>
</head>
<body>
<?php  ?>
<h2>Form Validation With PHP</h2>
<form action="index.php" method="post">
	<legend class="Error">* Please Fill Out the following Fields.</legend>
	<fieldset>
		<br>
		<label>Name:
		<input class="input" type="text" name="Name" value="">
		<span class="Error">*<?php echo $NameError; ?></span> 
	    </label><br><br>
		<label>Email:
		<input class="input" type="email" name="Email" value="">
		<span class="Error">*<?php echo $EmailError; ?></span>
		</label><br><br>
		<label>Gender:
		<input class="radio" type="radio" name="Gender" value="Male">Male
		<input class="radio" type="radio" name="Gender" value="Female">Female
		<span class="Error">*<?php echo $GenderError; ?></span>  
		</label><br><br>
		<label>Website:
		<input class="input" type="text" name="Website" value="">
		<span class="Error">*<?php echo $WebsiteError; ?></span>
		</label><br><br>
		Comment:<br><br>
		<textarea name="Comment" rows="5" cols="25" style="margin: 0px; width: 665px; height: 72px;"></textarea>
		<br>
		<input type="Submit" name="Submit" value="Submit">
	</fieldset>
</form>
</body>
</html>