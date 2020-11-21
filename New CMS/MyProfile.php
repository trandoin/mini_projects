<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>



<?php Confirm_password(); ?>  <!-- Called Confirm password function Jaha bhi login Required ho ja yah function call karna hai  -->


<?php 
// Fetching UserName For MyProfile Page Start //
$AdminId = $_SESSION["UserId"];
global $ConnectingDB;
$sql = "SELECT * FROM admins WHERE id='$AdminId' ";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
	$ExistingName = $DataRows["aname"];
	$ExistingHeadline = $DataRows["aheadline"];
	$ExistingBio = $DataRows["abio"];
	$ExistingImage = $DataRows["aimage"];
	$ExistingUserName = $DataRows["username"];
}
// Fetching UserName For MyProfile Page  End //
if (isset($_POST['Submit'])) {
	
	$AName = $_POST['Name'];
	$Headline = $_POST['Headline'];
	$ABio =$_POST["Bio"];
	$Image = $_FILES['Image']['name'];
	$Target = "images/".basename($_FILES['Image']['name']);
	//$Admin = "Govind";

 if (strlen($Headline)>12) {
		
		$_SESSION["ErrorMessage"] = "Headline should be less than 12 characters";
		Redirect_to("MyProfile.php");
	}
	elseif (strlen($ABio)>500) {
		
		$_SESSION["ErrorMessage"] = "Bio should be less than 500 characters";
		Redirect_to("MyProfile.php");
	}
	else{

		#Query to Update Admin in DB when everything is fine
		global $ConnectingDB; // FOR OLD VERSION OF PHP LIKE 5.6 ect
		if (!empty($_FILES['Image']['name'])) {
			
	       $sql = "UPDATE admins SET aname='$AName', aheadline='$Headline', abio='$ABio', aimage='$Image' 
		   WHERE id='$AdminId' ";	
		}
		else{
			 $sql = "UPDATE admins SET aname='$AName', aheadline='$Headline', abio='$ABio' 
		   WHERE id='$AdminId' ";
		}

         $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
      //  var_dump($Execute);
       if ($Execute) {
        	$_SESSION["SuccessMessage"] = "Profile Updated Successfully";
        	Redirect_to("MyProfile.php"); // You Can Send Admin to Any PAge YOU Want
        }else{
        	$_SESSION["ErrorMessage"] = "Something Went to Wrong! Try Again!";
		    Redirect_to("MyProfile.php");
       }
	}
}// Ending of Submit button if-Condition


 ?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>My Profile</title>
</head>
<body>
<!-- NAVBAR-->
<div style="height: 10px;background: #27aae1;"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
	<div class="container">
		<a href="#" class="navbar-brand">GOVIND</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarcollapseCMS">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="Profile.php" class="nav-link"><i class="fas fa-user text-success"></i> Profile</a>
			</li>
						<li class="nav-item">
				<a href="Dashboard.php" class="nav-link">Dashboard</a>
			</li>
						<li class="nav-item">
				<a href="Post.php" class="nav-link">Posts</a>
			</li>
						<li class="nav-item">
				<a href="Categories.php" class="nav-link">Categories</a>
			</li>
						<li class="nav-item">
				<a href="Admin.php" class="nav-link">Manage Admins</a>
			</li>
						<li class="nav-item">
				<a href="Comment.php" class="nav-link">Comments</a>
			</li>
						<li class="nav-item">
				<a href="Blog.php?page=1" class="nav-link">Live Blogs</a>
			</li>

		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a href="Logout.php" class="nav-link text-danger"><i class="fas fa-user-times"></i> Logout</a></li>
		</ul>
		</div>
	</div>
</nav>
<div style="height: 10px;background: #27aae1;"></div> <!--NAV BAR END-->
<!--HEADER START -->
<header class="bg-dark text-white">
	<div class="container">
			<div class="col-md-12 py-2">
				<h1><i class="fas fa-user text-success" style="color: #27aae1;"></i> @<?php echo $ExistingUserName; ?></h1>
				<small><?php echo $ExistingUserName; ?></small>
			</div>
		</div>
	</div>
</header> <!--HEADER END-->

<!--Main area of categories-->
<section class="container py-2 mb-4">
	<div class="row">
		<div class="row">
			<!-- Left Area -->
			<div class="col-md-3">
				<div class="card">
					<div class="card-header bg-dark text-light">
						<h3><?php echo $ExistingName; ?></h3>
					</div>
					<div class="card-body">
						<img src="images/<?php echo $ExistingImage; ?>" class="block img-fluid mb-3">
						<div class="">
							<?php echo $ExistingBio;  ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Right Area -->
		<div class="col-md-9" style="min-height: 440px;">
			
			<?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>
			<form action="MyProfile.php" method="post" enctype="multipart/form-data">  <!--  Here we using enctype in form this use for handle images in database table   -->
				<div class="card bg-dark text-light">
					<div class="card-header bg-secondary text-light">
						<h4> Edit Profile</h4>
					</div>
					<div class="card-body">
						<div class="form-group">
							<input class="form-control" type="text" name="Name" id="title" value="" placeholder="Enter Your Name">
						</div>
						<div class="form-group">
							<input class="form-control" type="text" id="title" value="" placeholder="Headline" name="Headline">
							<small class="text-muted">Add a Professional headline like, 'Engineer' at XYZ or 'Archetech' </small>
							<span class="text-danger">Not more then 12 characters</span>
						</div>
						<div class="form-group">
							<textarea name="Bio" placeholder="Here Enter Your Bio" rows="8" cols="80" class="form-control" id="Post"></textarea>
						</div>
						<div class="form-group">
						<!--	<label for="imageSelect"> <span class="Fieldinfo">Select Image</span></label> -->
							<div class="custom-file">
							<input class="custom-file-input" type="File" name="Image" id="imageSelect">
							<label for="imageSelect" class="custom-file-label">Select Image</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 mb-2">
								<a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back To Dashboard</a>
							</div>
							<div class="col-lg-6 mb-2">
								<button type="submit" name="Submit" class="btn btn-success btn-block">
									<i class="fas fa-check"></i>Publish
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>


<!--MAin area end -->

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