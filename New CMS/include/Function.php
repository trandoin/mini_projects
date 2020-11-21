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

// Function for User Login from Existing username and password
function Login_Attampt($UserName,$Password){

		global $ConnectingDB;
		$sql = "SELECT * FROM  admins WHERE username=:Username AND password=:Password LIMIT 1";
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

// Function for login Required 

function Confirm_password(){
	if (isset($_SESSION["UserId"])) {
		return true;
	}else{
		$_SESSION["ErrorMessage"] = "Login Required";
		Redirect_to("Login.php");
	}
}
 // Function for Calculating No of Posts 
function TotalPosts(){

                        global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM posts";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalPosts = array_shift($TotalRows);
                        echo $TotalPosts;
}
// Function for Calculating No of categories 
function TotalCategories(){
	   global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM category";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalCategories = array_shift($TotalRows);
                        echo $TotalCategories;
}
// Function for Calculating No of admins
function TotalAdmins(){
	  global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM admins";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalAdmins = array_shift($TotalRows);
                        echo $TotalAdmins;
}
// Function for Calculating No of Comments 
function TotalComments(){
	global $ConnectingDB;
                        $sql = "SELECT COUNT(*) FROM comments";
                        $stmt = $ConnectingDB->query($sql);
                        $TotalRows = $stmt->fetch();
                        $TotalComments = array_shift($TotalRows);
                        echo $TotalComments;
}
function ApproveCommentsAccordingToPost($PostId){
	 global $ConnectingDB;
                              $sqlApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON' ";
                              $stmtApprove =$ConnectingDB->query($sqlApprove);
                              $RowsTotal = $stmtApprove->fetch();
                              $Total = array_shift($RowsTotal);
                              return $Total;
}
function DisApproveCommnetsAccordingtoPost($PostId){
	global $ConnectingDB;
                              $sqlDisApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='OFF' ";
                              $stmtDisApprove =$ConnectingDB->query($sqlDisApprove);
                              $RowsTotal = $stmtDisApprove->fetch();
                              $Total = array_shift($RowsTotal);
                              return $Total;
}

 ?>