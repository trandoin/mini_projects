<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>

<?php Confirm_password(); ?> <!-- Called Confirm password function Jaha bhi login Required ho ja yah function call karna hai  -->

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>Dashboard</title>
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
				<a href="MyProfile.php" class="nav-link"><i class="fas fa-user text-success"></i> Profile</a>
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
<header class="bg-dark text-white py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><i class="fas fa-cog" style="color: #27aae1;"></i>  Dashboard</h1>
			</div>
			<div class="col-lg-3 mb-2">
				<a class="btn btn-primary btn-block" href="AddNewPost.php"> <i class="fas fa-edit"></i> Add New Post</a>
			</div>
			<div class="col-lg-3 mb-2">
				<a class="btn btn-info btn-block" href="Categories.php"> <i class="fas fa-folder-plus"></i> Add New Categories</a>
			</div>
			<div class="col-lg-3 mb-2">
				<a class="btn btn-warning btn-block" href="Admin.php"> <i class="fas fa-user-plus"></i> Add New Admin</a>
			</div>
			<div class="col-lg-3 mb-2">
				<a class="btn btn-success btn-block" href="Comment.php"> <i class="fas fa-check"></i> Approve Comments</a>
			</div>
		</div>
	</div>
</header> <!--HEADER END-->
<!--Main Are Start here --->
<section class="container py-2 mb-4">
		<?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>
	<div class="row">
		
		
			 <!-- Left Side Area Start -->
			 <div class="col-lg-2 d-none d-md-block">
			 	<div class="card text-center bg-dark text-white mb-3">
			 		<div class="card-body">
			 			<h1 class="lead">Posts</h1>
			 			<h4 class="display-5"><i class="fab fa-readme"></i> <?php TotalPosts(); ?></h4>
			 		</div>
			 	</div>
			 
			 	<div class="card text-center bg-dark text-white mb-3">
			 		<div class="card-body">
			 			<h1 class="lead">Categories</h1>
			 			<h4 class="display-5"><i class="fas fa-folder"></i> <?php TotalCategories(); ?></h4>
			 		</div>
			 	</div>
			
				<div class="card text-center bg-dark text-white mb-3">
			 		<div class="card-body">
			 			<h1 class="lead">Admins</h1>
			 			<h4 class="display-5"><i class="fas fa-users"></i> <?php TotalAdmins(); ?></h4>
			 		</div>
			 	</div>
			
			 	<div class="card text-center bg-dark text-white mb-3">
			 		<div class="card-body">
			 			<h1 class="lead">Comments</h1>
			 			<h4 class="display-5"><i class="fas fa-comments"></i> <?php TotalComments(); ?> </h4>
			 		</div>
			 	</div>
		</div>
		<!-- Left Area Ending -->
		<!-- Right Side Area Start --->
		<div class="col-lg-10">
			<h2 style="font-weight: bold;">Top Post</h2>
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>DataTime</th>
						<th>Author</th>
						<th>Comments</th>
						<th>Details</th>
					</tr>
				</thead>
				<?php 
                  $SrNO = 0;
                  global $ConnectingDB;
                  $sql = "SELECT * FROM  posts ORDER BY id desc LIMIT 0,5";
                  $stmt = $ConnectingDB->query($sql);
                  while ($DataRows = $stmt->fetch()) {
                  	
                  	$PostId = $DataRows["id"];
                  	$DateTime = $DataRows["datetime"];
                  	$Author = $DataRows["author"];
                  	$Title = $DataRows["title"];
                  	$SrNO++;
                  
				 ?>
				 <tbody>
				 	<tr>
				 		<td><?php echo $SrNO; ?></td>
				 		<td><?php echo $Title; ?></td>
				 		<td><?php echo $DateTime; ?></td>
				 		<td><?php echo $Author; ?></td>
				 		<td>
				 			<?php 
                               $Total =  ApproveCommentsAccordingToPost($PostId);
                              if ($Total>0) {
                              	?>
                              	<span class="badge badge-success">
                              		<?php
                              	 echo $Total; ?>
                           <?php   } ?>
                       </span>

                           <?php 
                              $Total = DisApproveCommnetsAccordingtoPost($PostId);
                              if ($Total>0) {
                              	?>
                              	<span class="badge badge-danger">
                              		<?php
                              	 echo $Total; ?>
                           <?php   } ?>
                       </span>

				 		</td>
				 		<td> <a target="_blank" href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">Preview</span></a></td>
				 	</tr>
				 </tbody>
				<?php } ?>
			</table>
		</div>
		<!-- Right Side Area End --->
</section>
<!-- Main area ending -->
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