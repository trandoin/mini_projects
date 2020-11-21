<?php 
require_once("include/DB.php");


 ?>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!DOCTYPE html>
<html>
<head>
	<title>View  data from database</title>
	<link rel="stylesheet" type="text/css" href="include/style.css">
	<style type="text/css">
		   table tr th{
  font-weight: normal;
}
table thead th{
  font-weight: bold;
}
tr:nth-child(odd){
  background-color: #f2f2f2;
}
	</style>
</head>
<body>
	<h2 class="success"><?php echo @$_GET["id"]; ?></h2>
	<div class="">
		<fieldset>
			<form class="" action="View_From_Database.php" method="GET">
				<input type="text" name="Search" value="" placeholder="Search by name and ssn">
				<input type="submit" name="SearchButton" value="Search record">
			</form>
		</fieldset>
	</div>
	<?php 
    if (isset($_GET["SearchButton"])) {
    	global $ConnectingDB;
    	$Search = $_GET["Search"];
    	$sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
    	$stmt = $ConnectingDB->prepare($sql);
    	$stmt->bindValue(':searcH',$Search);
    	$stmt->execute();
    	while ($DataRows = $stmt->fetch()) {
    		$Id          = $DataRows["id"];
    		$EName       = $DataRows["ename"];
    		$SSN         = $DataRows["ssn"];
    		$Department  = $DataRows["dept"];
    		$Salary      = $DataRows["salary"];
    		$HomeAddress = $DataRows["homeaddress"];
    	?>
     
     <table width="1000" border="5" align="center">
     	<caption><h2>Search Results</h2></caption>
     	<tr>
     		<th>ID</th>
     		<th>Name</th>
     		<th>SSN</th>
     		<th>Department</th>
     		<th>Salary</th>
     		<th>Home Address</th>
     		<th>Search Again</th>
     	</tr>
     	<tr>
     		<td><?php echo $Id; ?></td>
     		<td><?php echo $EName; ?></td>
     		<td><?php echo $SSN; ?></td>
     		<td><?php echo $Department; ?></td>
     		<td><?php echo $Salary; ?></td>
     		<td><?php echo $HomeAddress; ?></td>
     		<td><a href="View_From_Database.php">Search Again</a></td>
     	</tr>
     </table>  

    	<?php }//Ending of while Loop

    }//Ending of Submit Button

	 ?>
	<table width="1000" border="5" align="center">
		<caption><h2>View Data From Database</h2></caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>SSN</th>
			<th>Department</th>
			<th>Salary</th>
			<th>HomeAddress</th>
			<th>Update</th>
			<th>Delate</th>
		</tr>
<?php 
global $ConnectingDB;
$sql = "SELECT * FROM emp_record";
$stmt = $ConnectingDB->query($sql);
while ($DataRows =$stmt->fetch()) {
      	
      	$Id          = $DataRows["id"];
      	$EName       = $DataRows["ename"];
      	$SSN         = $DataRows["ssn"];
      	$Department  = $DataRows["dept"];
      	$Salary      = $DataRows["salary"];
      	$HomeAddress = $DataRows["homeaddress"];
                             
?>

<tr>
	<td><?php echo "$Id"; ?></td>
	<td><?php echo "$EName"; ?></td>
	<td><?php echo "$SSN"; ?></td>
	<td><?php echo "$Department"; ?></td>
	<td><?php echo "$Salary"; ?></td>
	<td><?php echo "$HomeAddress"; ?></td>
	<td><a href="Update.php?id=<?php echo $Id;?>">Update</a></td>
	<td><a href="Delete.php?id=<?php echo $Id;?>">Delete</a></td>
</tr>
<?php } ?>
	</table>
<div>
	
</div>
<div class="cont" style="margin-top: 20px;margin-left: 20px;" align="center">
      <p>
        <a href="insert_into_Database.php" class="btn btn-info btn-mg">
          <span class="glyphicon glyphicon-plus-sign"></span> Add Company Details
        </a>
      </p> 
    </div>
</body>
</html>