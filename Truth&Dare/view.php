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
			<form class="" action="view.php" method="GET">
				<input type="text" name="Search" value="" placeholder="Search by name and ssn">
				<input type="submit" name="SearchButton" value="Search record">
			</form>
		</fieldset>
	</div>
	<?php 
    if (isset($_GET["SearchButton"])) {
    	global $ConnectingDB;
    	$Search = $_GET["Search"];
    	$sql = "SELECT * FROM truth_dare WHERE name=:searcH OR one=:searcH";
    	$stmt = $ConnectingDB->prepare($sql);
    	$stmt->bindValue(':searcH',$Search);
    	$stmt->execute();
    	while ($DataRows = $stmt->fetch()) {
    		$Id     = $DataRows["id"];
        $NAME   = $DataRows["name"];
    		$ONE    = $DataRows["one"];
    		$TWO    = $DataRows["two"];
    		$THREE  = $DataRows["three"];
    		$FOUR   = $DataRows["four"];
    		$FIVE   = $DataRows["five"];
        $SIX    = $DataRows["six"];
        $SEVEN  = $DataRows["seven"];
        $EIGHT  = $DataRows["eight"];
        $NINE   = $DataRows["nine"];
        $TEN    = $DataRows["ten"];
    	?>
     
     <table width="1000" border="5" align="center">
     	<caption><h2>Search Results</h2></caption>
     	<tr>
     		<th>ID</th>
        <th>NAME</th>
     		<th>ONE</th>
     		<th>TWO</th>
     		<th>THREE</th>
     		<th>FOUR</th>
     		<th>FIVE</th>
        <th>SIX</th>
        <th>SEVEN</th>
        <th>EIGHT</th>
        <th>NINE</th>
        <th>TEN</th>
     		<th>Search Again</th>
     	</tr>
     	<tr>
     		<td><?php echo $Id; ?></td>
        <td><?php echo $NAME; ?></td>
     		<td><?php echo $ONE; ?></td>
     		<td><?php echo $TWO; ?></td>
     		<td><?php echo $THREE; ?></td>
     		<td><?php echo $FOUR; ?></td>
     		<td><?php echo $FIVE; ?></td>
        <td><?php echo $SIX; ?></td>
        <td><?php echo $SEVEN; ?></td>
        <td><?php echo $EIGHT; ?></td>
        <td><?php echo $NINE; ?></td>
        <td><?php echo $TEN; ?></td>
     		<td><a href="view.php">Search Again</a></td>
     	</tr>
     </table>  

    	<?php }//Ending of while Loop

    }//Ending of Submit Button

	 ?>
	<table width="1000" border="5" align="center">
		<caption><h2>View Data From Database</h2></caption>
		<tr>
			<th>ID</th>
      <th>NAME</th>
			<th>ONE</th>
			<th>TWO</th>
			<th>THREE</th>
			<th>FOUR</th>
			<th>FIVE</th>
      <td>SIX</td>
      <td>SEVEN</td>
      <td>EIGHT</td>
      <td>NINE</td>
      <td>TEN</td>
			<th>Update</th>
			<th>Delate</th>
		</tr>
<?php 
global $ConnectingDB;
$sql = "SELECT * FROM truth_dare";
$stmt = $ConnectingDB->query($sql);
while ($DataRows =$stmt->fetch()) {
      	
      	$Id         = $DataRows["id"];
        $NAME       = $DataRows["name"];
      	$ONE        = $DataRows["one"];
      	$TWO        = $DataRows["two"];
      	$THREE      = $DataRows["three"];
      	$FOUR       = $DataRows["four"];
      	$FIVE       = $DataRows["five"];
        $SIX        = $DataRows["six"];
        $SEVEN      = $DataRows["seven"];
        $EIGHT      = $DataRows["eight"];
        $NINE       = $DataRows["nine"];
        $TEN        = $DataRows["ten"];
                             
?>

<tr>
	<td><?php echo "$Id"; ?></td>
  <td><?php echo "$NAME"; ?></td>
	<td><?php echo "$ONE"; ?></td>
	<td><?php echo "$TWO"; ?></td>
	<td><?php echo "$THREE"; ?></td>
	<td><?php echo "$FOUR"; ?></td>
	<td><?php echo "$FIVE"; ?></td>
  <td><?php echo "$SIX"; ?></td>
  <td><?php echo "$SEVEN"; ?></td>
  <td><?php echo "$EIGHT"; ?></td>
  <td><?php echo "$NINE"; ?></td>
  <td><?php echo "$TEN"; ?></td>
	<td><a href="Update.php?id=<?php echo $Id;?>">Update</a></td>
	<td><a href="Delete.php?id=<?php echo $Id;?>">Delete</a></td>
</tr>
<?php } ?>
	</table>
<div>
	
</div>
<div class="cont" style="margin-top: 20px;margin-left: 20px;" align="center">
      <p>
        <a href="insert.php" class="btn btn-info btn-mg">
          <span class="glyphicon glyphicon-plus-sign"></span> Add Company Details
        </a>
      </p> 
    </div>
</body>
</html>