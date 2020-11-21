<?php require_once("include/DB.php"); ?>
<?php 

function Redirect_to($New_location){
	header("Location:".$New_location);
	exit();
}

// Follwing function for check Existing user
function CheckUserNameExistOrNot($UserName){
 global $ConnectingDB;
$sql = "SELECT username FROM admins WHERE username = :userName";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':userName',$UserName);
$stmt->execute();
$Result = $stmt->rowCount();
if ($Result==1) {
	return true;
}else{
	return false;
    }
}

// Function for login Required 

function Confirm_password(){
	if (isset($_SESSION["UserId"])) {
		return true;
	}else{
		$_SESSION["ErrorMessage"] = "Login Required";
		Redirect_to("index.php");
	}
}

// Function for User Login from Existing username and password for Admin/ Howner
function Login_Attampt($UserName,$Password){

		global $ConnectingDB;
		$sql = "SELECT * FROM  hlogin WHERE username=:Username AND Passward=:Password LIMIT 1";
		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':Username',$UserName);
		$stmt->bindValue(':Password',$Password);
		$stmt->execute();
		$Result = $stmt->rowcount();
		if ($Result==1) {
			return $Found_Account=$stmt->fetch();
		}else{
			return null;
		}
}



// Function for User Login from Existing username and password for Admin/ Howner
function Login_Attampt1($UserName,$Password){

		global $ConnectingDB;
		$sql = "SELECT * FROM  login WHERE username=:Username AND password=:Password LIMIT 1";
		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':Username',$UserName);
		$stmt->bindValue(':Password',$Password);
		$stmt->execute();
		$Result = $stmt->rowcount();
		if ($Result==1) {
			return $Found_Account=$stmt->fetch();
		}else{
			return null;
		}
}


// Function for login Required  For Go to students Dashboard

function Confirm_password1(){
	if (isset($_SESSION["SUserId"])) {
		return true;
	}else{
		$_SESSION["ErrorMessage"] = "Login Required";
		Redirect_to("Login.php");
	}
}








 // Function for Calculating No of Course Posts 
function TotalCPosts(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM cpost";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Categories Posts 
function TotalCategories(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM ca";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Register Students 
function TotalRStudents(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM login";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Queries Requests
function TotalQueries(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM inquiry";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Slide Images
function TotalSlideImage(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM slider";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalAnno(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM announce";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of News And Events
function TotalNews(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM ne";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Offers Posts
function TotalOffers(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM offer";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Jee Results
function TotalJeer(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM jee_r";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Medical Results
function TotalMedicalr(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM medical_r";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalKvpyr(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM kvpy_r";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalTesti(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM testinomial";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalCFee(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM fee_s";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalJeeP(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM jee_p";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalMedicalP(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM medical_p";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
 // Function for Calculating No of Announcements
function TotalBoardP(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM board_p";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}