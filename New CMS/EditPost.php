<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>



<?php Confirm_password(); ?>  <!-- Called Confirm password function Jaha bhi login Required ho ja yah function call karna hai  -->


<?php 
 $SearchQueryParameter = $_GET["id"];
if (isset($_POST['Submit'])) {
	
	$PostTitle = $_POST['PostTitle'];
	$Category = $_POST['Category'];
	$Image = $_FILES['Image']['name'];
	$Target = "Upload/".basename($_FILES['Image']['name']);
	$PostText = $_POST['PostDescription'];
	//$Admin = "Govind";
	$Admin = $_SESSION["UseRName"]; # Using Dynamically By session variables
    date_default_timezone_set("Asia/Kolkata"); //You can chage time Zone As you wish
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y  %H: %M: %S",$CurrentTime);


	if (empty($PostTitle)) {
		
		$_SESSION["ErrorMessage"] = "Title can't be Empty !";
		Redirect_to("Post.php");
	}

	elseif (strlen($PostTitle)<5) {
		
		$_SESSION["ErrorMessage"] = "Post Title should be greater than 5 characters";
		Redirect_to("Post.php");
	}
	elseif (strlen($PostTitle)>9999) {
		
		$_SESSION["ErrorMessage"] = "Post Description should be less than 10000 characters";
		Redirect_to("Post.php");
	}
	else{

		#Query to Update post in DB when everything is fine
		global $ConnectingDB; // FOR OLD VERSION OF PHP LIKE 5.6 ect
		if (!empty($Image)) {
			
	       $sql = "UPDATE posts SET title='$PostTitle', category='$Category', image='$Image', post='$PostText'
		   WHERE id='$SearchQueryParameter' ";	
		}
		else{
			$sql = "UPDATE posts SET title='$PostTitle', category='$Category', post='$PostText'
		WHERE id='$SearchQueryParameter' ";
		}

         $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
      //  var_dump($Execute);

       if ($Execute) {
        	$_SESSION["SuccessMessage"] = "Post Updated Successfully";
        	Redirect_to("Post.php"); // You Can Send Admin to Any PAge YOU Want
        }else{
        	$_SESSION["ErrorMessage"] = "Something Went to Wrong! Try Again!";
		    Redirect_to("Post.php");
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
	<title>Edit Post</title>
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
				<h1><i class="fas fa-edit" style="color: #27aae1;"></i>Edit Post</h1>
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

                  // Fetching Existing Content according to our
                  global $ConnectingDB;
               //   $SearchQueryParameter = $_GET["id"];
                  $sql = "SELECT * FROM posts WHERE id = '$SearchQueryParameter'";
                  $stmt = $ConnectingDB ->query($sql);
                  while ($DataRows = $stmt->fetch()) {
                  	
                  	$TittleToBeUpdated = $DataRows["title"];
                  	$CategoryToBeUpdated = $DataRows["category"];
                  	$ImageToBeUpdated = $DataRows["image"];
                  	$PostToBeUpdated = $DataRows["post"];
                  }

			 ?>
			<form action="EditPost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">  <!--  Here we using enctype in form this use for handle images in database table   -->
				<div class="card bg-secondary text-light mb-3">
					<div class="card-body bg-dark">
						<div class="form-group">
							<label for="title"> <span class="Fieldinfo">Post Tittle</span></label>
							<input class="form-control" type="text" name="PostTitle" id="title" value=" <?php echo $TittleToBeUpdated; ?> " placeholder="Type title here">
						</div>
						<div class="form-group">
							<span class="Fieldinfo">Existing category :</span>
							<?php echo $CategoryToBeUpdated; ?>
							<br>
							<label for="CategotyTitle"> <span class="Fieldinfo">Choose Categroy</span></label>
							<select class="form-control" id="CategotyTitle" name="Category">
								<?php 

                                 // fetching all the categaries from categery table
								global $ConnectingDB;
								$sql ="SELECT id,title FROM category";
								$stmt = $ConnectingDB->query($sql);
								while ($DateRows = $stmt->fetch()) {
									
									$Id = $DateRows["id"];
									$CategoryName = $DateRows["title"];

								 ?>
								 <option> <?php echo $CategoryName; ?> </option>
								<?php  } ?> <!-- This bracess is ending of while loop  becoz we can see every categories  -->
							</select>
						</div>
						<div class="form-group mb-1">
						<!--	<label for="imageSelect"> <span class="Fieldinfo">Select Image</span></label> -->
						   <span class="Fieldinfo">Existing Image :</span>
							<img class="mb-1" src="Upload/<?php echo $ImageToBeUpdated; ?>" width="170px"; height="70px";> 
							<div class="custom-file">
							<input class="custom-file-input" type="File" name="Image" id="imageSelect">
							<label for="imageSelect" class="custom-file-label">Select Image</label>
							</div>
						</div>
						<div class="form-group">
							<label for="Post"> <span class="Fieldinfo">Post:</span></label>
							<textarea name="PostDescription" rows="8" cols="80" class="form-control" id="Post">
								<?php echo $PostToBeUpdated; ?>
							</textarea>
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