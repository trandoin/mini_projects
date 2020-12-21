<?php
include('config.php');

$Id = $_GET['id'];

$i = "";
$query = "select images from images where id = '$Id'";
$fire = mysqli_query($con, $query);
$data = mysqli_fetch_array($fire);
$res = $data['images'];
$res = explode(" ", $res);
$count = count($res)-1;
for($i=0; $i<$count; ++$i)
{
	?>
	<img src="Upload/<?= $res[$i] ?>" height="100px;" width="100px;">
	<?php
}
echo "<p style='color: green;'>Total ".$count." images found</p> ";
 ?>
<a href="index.php">Upload</a>
 