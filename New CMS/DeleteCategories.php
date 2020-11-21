<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>

<?php 

if (isset($_GET["id"])) {
	$SearchQueryParameter = $_GET["id"];

	global $ConnectingDB; // FOR OLD VERSION OF PHP LIKE 5.6 ect
	//$Admin = $_SESSION["AdminName"];
	$sql = "DELETE FROM  category  WHERE id='$SearchQueryParameter' ";
	$Execute = $ConnectingDB->query($sql);
	if ($Execute) {
		
		$_SESSION["SuccessMessage"] = "Caregory Deleted SuccessFully ! ";
			Redirect_to("Categories.php");
	}
	else{
		$_SESSION["ErrorMessage"] = "Something Went to wrong. Try Again !";
			Redirect_to("Categories.php");
	}
}





 ?>