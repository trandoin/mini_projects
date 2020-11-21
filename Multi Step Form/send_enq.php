	<?php
	
	//Connection to database
	//include('dbcon.php');

	if(empty($fname))
	{
		
	// insert your name , email and text message to your table in db
	$datepicker = $_REQUEST['datepicker'];
    $type = $_REQUEST['type'];
	$website = $_REQUEST['website'];
	$fname = $_REQUEST['fname'];
	$city = $_REQUEST['city'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$country = $_REQUEST['country'];
	$offers = $_REQUEST['offers'];
	$SMS = $_REQUEST['SMS'];
	$newsletter = $_REQUEST['newsletter'];
	// Do Not Modify Below

		//adding to database
			//$sql = "INSERT into `feedback`(`datepicker`,`type`,`website`,`fname`,`country`,`city`,`phone`,`email`,`offers`,`SMS`,`newsletter`,`date`) VALUES ('$datepicker','$type','$website','$fname','$country','$city','$phone','$email','$offers','$SMS','$newsletter', NOW());";
 		//$query = mysql_query($sql) or die(mysql_error());
		//send the email to Reciever
		$to = $email;
		$subject="Website Enquiry Demo - Super Cool Multi Step Contact/Registration Form";
		$from = $email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $fname submitted Enquiry as follows\n".
		"Enquiry Details\n".
		"Requested Callback Date: $datepicker\n".
		"Enquiry Type: $type\n".
		"Client Website: $website\n".
		"\n".
		"Personal Details\n".
		"Full Name: $fname\n".
		"Country: $country\n".
		"City: $city\n".
		"Phone: $phone\n".
		"Email: $email\n".
		"\n".
		"Notification Details\n".
		"Subscribed for Offers: $offers\n".
		"Subscribed for Offers: $SMS\n ".
		"Subscribed for Newsletters: $newsletter\n ".
		"\n".
		"Sent From IP: $ip\n";	
		
		$headers = "From: $email \r\n";
		$headers .= "Reply-To: $email \r\n";
		
		mail($to, $subject, $body,$headers);
		echo '1';// submitted 
	}
	else
	{
		echo '0'; // invalid code
	}
	?>
