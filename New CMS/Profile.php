<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>


<!-- Fetching data from database -->
<?php 
 $SearchQueryParameter = $_GET["username"];
 global  $ConnectingDB;
 $sql = "SELECT aname, aheadline, abio, aimage FROM admins WHERE username=:userName";
 $stmt = $ConnectingDB->prepare($sql);
 $stmt->bindValue(":userName",$SearchQueryParameter);
 $stmt->execute();
 $Result = $stmt->rowCount();
 if ($Result ==1){
 	while($DataRows =$stmt->fetch()) {
 	$ExistingName = $DataRows["aname"];
 	$ExistingBio = $DataRows["abio"];
 	$ExistingImage = $DataRows["aimage"];
 	$ExistingHeadline = $DataRows["aheadline"];
 }
}else{
	$_SESSION["ErrorMessage"] = "Bad Request !";
	Redirect_to("Blog.php?page=1");
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>Public Profile</title>
</head>
<body>
<!-- NAVBAR-->
<div style="height: 10px;background: #27aae1;"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white" >
	<div class="container">
		<a href="#" class="navbar-brand">GOVIND</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarcollapseCMS">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="Blog.php?page=1" class="nav-link">Home</a>
			</li>
						<li class="nav-item">
				<a href="#" class="nav-link">About Us</a>
			</li>
						<li class="nav-item">
				<a href="Blog.php?page=1" class="nav-link">Blog</a>
			</li>
						<li class="nav-item">
				<a href="#" class="nav-link">Contact Us</a>
			</li>
						<li class="nav-item">
				<a href="#" class="nav-link">Features</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<form class="form-inline d-none d-sm-block" action="Blog.php" method="post">
				<div class="form-group">
				<input class="form-control" type="text" name="Search" placeholder="Search here" value="">
				<button class="btn btn-primary ml-1" type="submit" name="SearchButton">Go</button>
				</div>
			</form>
		</ul>
		</div>
	</div>
</nav>
<div style="height: 10px;background: #27aae1;"></div> <!--NAV BAR END-->
<!--HEADER START -->
<header class="bg-dark text-white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<h1><i class="fas fa-user text-success mr-2"></i> <?php echo htmlentities($ExistingName); ?></h1>
			<h3><?php echo htmlentities($ExistingHeadline);  ?></h3>
			</div>
		</div>
	</div>
</header> <!--HEADER END-->

<section class="container py-2 mb-4">
	<div class="row">
		<div class="col-md-3">
			<img src="images/<?php echo htmlentities($ExistingImage); ?>" class="d-block img-fluid mb-3 rounded-circle">
		</div>
		<div class="col-md-9" style="min-height: 390px;">
			<div class="card">
				<div class="card-body">
					<p class="lead"><?php echo htmlentities($ExistingBio); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FOOTER --->
<footer class="bg-dark text-white">
	<div class="container">
		<div class="row">
			<div class="col">
			<p class="lead text-center">Theme by | Govind Suman |<span id="year"></span> &copy; .....All right Reserved</p>
		</div>
		</div>
	</div>
</footer>
<div style="height: 10px;background: #27aae1;"></div> <!--FOOTER END-->
<!--- Bootsstrap js  --->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- SCRIPT FOR COPYRIGHT YEAR -->
<script>
	$('#year').text(new Date().getFullYear());
</script>
</body>
</html>