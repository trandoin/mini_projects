<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>

<?php 
 // Yah  1st Wali IF Condition iss liye use ki hai Agr user logged in hai to wo login page prr nahi aa sakta hai
if (isset($_SESSION["UserId"])) {     
	Redirect_to("Post.php");
}


if (isset($_POST['submit'])) {
	
	$UserName = $_POST["Username"];
	$Password = $_POST["Password"];

	if (empty($UserName)||empty($Password)) {
		$_SESSION["ErrorMessage"] = "All Fields must filled out";
	}else{

		// code for checking username and password from database
		$Found_Account=Login_Attampt($UserName,$Password);
		if ($Found_Account) {
		
           $_SESSION["UserId"]= $Found_Account["id"];
           $_SESSION["UseRName"]= $Found_Account["username"];
           $_SESSION["AdminName"]= $Found_Account["aname"];

			$_SESSION["SuccessMessage"] = "Welcome " .$_SESSION["AdminName"]. "!";
			Redirect_to("Dashboard.php");
		}else{
			$_SESSION["ErrorMessage"] = "Incorrect Username and Password";
			Redirect_to("login.php");
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
	<title>Login</title>
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

		</div>
	</div>
</header> <!--HEADER END-->
<br>
<!-- Main Area -->

<section class="container py-2 mb-4">
	<div class="row">
		<div class="offset-sm-3 col-sm-6" style="min-height:470px; ">
			<br><br>
			<?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>
			<div class="card bg-secondary text-light">
				<div class="card-header">
					<h4>Welcome Back !</h4>
					</div>
					<div class="card-body bg-dark"> 
					<form class="" action="Login.php" method="post">
						<div class="form-group">
							<label for="username"><span class="Fieldinfo">Username</span></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span>
								</div>
								<input class="form-control" type="text" name="Username" id="username" value="">
							</div>
							<div class="form-group">
							<label for="password"><span class="Fieldinfo">Password</span></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-white bg-info"><i class="fas fa-lock"></i></span>
								</div>
								<input class="form-control" type="password" name="Password" id="password" value="">
							</div>
						</div>
						</div>
						<input type="submit" name="submit" class="btn btn-info btn-block" value="Login">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- MAin Area End -->
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