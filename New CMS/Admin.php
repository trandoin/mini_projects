<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>


<?php Confirm_password(); ?> <!-- Called Confirm password function Jaha bhi login Required ho ja yah function call karna hai  -->



<?php 

if (isset($_POST['Submit'])) {
	
	$UserName = $_POST["Username"];
	$Name = $_POST["Name"];
	$Password = $_POST["Password"];
	$ConfirmPassword = $_POST["ConfirmPassword"];
	$Admin = "GOVIND"; # Default name
    date_default_timezone_set("Asia/Kolkata"); //You can chage time Zone As you wish
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y  %H: %M: %S",$CurrentTime);


	if (empty($UserName)||empty($Password)||empty($ConfirmPassword)) {
		
		$_SESSION["ErrorMessage"] = "All Fields must filled out";
		Redirect_to("Admin.php");
	}

	elseif (strlen($Password)<4) {
		
		$_SESSION["ErrorMessage"] = "Category Password should be greater than 3 characters";
		Redirect_to("Admin.php");
	}
	elseif($Password !== $ConfirmPassword) {
		
		$_SESSION["ErrorMessage"] = "Password and ConfirmPassword should match";
		Redirect_to("Admin.php");
	}elseif(CheckUserNameExistOrNot($UserName)) {
		
		$_SESSION["ErrorMessage"] = "Username Already exist Please try another username!";
		Redirect_to("Admin.php");
	}
	else{

		#Query to insert new admin  in DB when everything is fine
		global $ConnectingDB; // FOR OLD VERSION OF PHP LIKE 5.6 ect
		$sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
		$sql .= "VALUES(:dateTime,:userName,:password,:aName,:adminName)";
		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':dateTime',$DateTime);
		$stmt->bindValue(':userName',$UserName);
		$stmt->bindValue(':password',$Password);
		$stmt->bindValue(':aName',$Name);
		$stmt->bindValue(':adminName',$Admin);

        $Execute =$stmt->execute();


        if ($Execute) {
        	$_SESSION["SuccessMessage"] = "New Admin with the Name ".$Name." Successfully";
        	Redirect_to("Admin.php"); // You Can Send Admin to Any PAge YOU Want
        }else{
        	$_SESSION["ErrorMessage"] = "Something Went to Wrong! Try Again!";
		    Redirect_to("Admin.php");
        }
	}

}


 ?>






<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>Admin Registration</title>
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
		<div class="row">
			<div class="col-md-12">
				<h1><i class="fas fa-user" style="color: #27aae1;"></i> Manage Admin</h1>
			</div>
		</div>
	</div>
</header> <!--HEADER END-->

<!--Main area of categories-->
<section class="container py-2 mb-4">
	<div class="row">
		<div class="offset-lg-1 col-lg-10" style="min-height: 440px;">
			
			<?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>
			<form action="Admin.php" method="post">
				<div class="card bg-secondary text-light mb-3">
					<div class="card-header">
						<h1>Add New Admin</h1>
					</div>
					<div class="card-body bg-dark">
						<div class="form-group">
						<label for="username"> <span class="Fieldinfo">User Name</span></label>
						<input class="form-control" type="text" name="Username" id="username" value="">
						</div>
						<div class="form-group">
						<label for="Name"> <span class="Fieldinfo">Name</span></label>
						<input class="form-control" type="text" name="Name" id="Name" value="" >
						<small class="text-warning text-muted">Optional</small>
						</div>
						<div class="form-group">
						<label for="Password"> <span class="Fieldinfo">Password</span></label>
						<input class="form-control" type="password" name="Password" id="Password" value="" >
						</div>
						<div class="form-group">
						<label for="ConfirmPassword"> <span class="Fieldinfo">ConfirmPassword</span></label>
						<input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" value="">
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
			<h2 style="font-weight: bold;">Existing Admins</h2>
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>DateTime</th>
						<th>UserName</th>
						<th>Admin Name</th>
						<th>Added By</th>
						<th>Action</th>
					</tr>
				</thead>

			<!--- Php for Fetchin comments from database -->
			<?php 
              
              global $ConnectingDB;
              $sql = "SELECT * FROM admins ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
              $SrNo = 0;
              while ($DataRows=$Execute->fetch()) {
              	
                 $AdminId = $DataRows["id"];
                 $DateTime = $DataRows["datetime"];
                 $AdminUserName = $DataRows["username"];
                 $AdminName = $DataRows["aname"];
                 $AddedBy = $DataRows["addedby"];
                 $SrNo++;
                 
			 ?>
			 <tbody>
			 	<tr>
			 		<td><?php echo htmlentities($SrNo) ; ?></td>
			 		<td><?php echo htmlentities($DateTime) ; ?></td>
			 		<td><?php echo htmlentities($AdminUserName) ; ?></td>
			 		<td><?php echo htmlentities($AdminName) ; ?></td>
			 		<td><?php echo htmlentities($AddedBy) ; ?></td>
			 		<td><a href="DeleteAdmin.php?id=<?php echo $AdminId; ?>" class="btn btn-danger">Delete</a></td>
			 	</tr>
			 </tbody>
			<?php } ?>
			</table>
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