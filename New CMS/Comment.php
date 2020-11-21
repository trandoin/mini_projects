<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>



<?php Confirm_password(); ?>  <!-- Called Confirm password function Jaha bhi login Required ho ja yah function call karna hai  -->




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>Comments</title>
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
<header class="bg-dark text-white py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h1><i class="fas fa-comments" style="color: #27aae1;"></i> Manage Comment</h1>
			</div>
		</div>
	</div>
</header> <!--HEADER END-->
<div class="container py-2 mb-4">
	<div class="row" style="min-height: 30px;">
		<div class="col-md-12" style="min-height: 400px;">
			<?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>
		<h2>Un-Approved Comments</h2>
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>DateTime</th>
						<th>Comments</th>
						<th>Action</th>
						<th>Action</th>
						<th>Details</th>
					</tr>
				</thead>

			<!--- Php for Fetchin comments from database -->
			<?php 
              
              global $ConnectingDB;
              $sql = "SELECT * FROM  comments WHERE status='OFF' ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
              $SrNo = 0;
              while ($DataRows=$Execute->fetch()) {
              	
                 $CommentId = $DataRows["id"];
                 $DateTimeComment = $DataRows["datetime"];
                 $CommenterName = $DataRows["name"];
                 $CommentContent = $DataRows["comment"];
                 $CommentPostId = $DataRows["post_id"];
                 $SrNo++;

                 if (strlen($CommenterName)>10) { $CommenterName = substr($CommenterName,0,10).'...';}
                    if (strlen($DateTimeComment)>11) { $DateTimeComment = substr($DateTimeComment,0,11).'...';}
                 
			 ?>
			 <tbody>
			 	<tr>
			 		<td><?php echo htmlentities($SrNo) ; ?></td>
			 		<td><?php echo htmlentities($CommenterName) ; ?></td>
			 		<td><?php echo htmlentities($DateTimeComment) ; ?></td>
			 		<td><?php echo htmlentities($CommentContent) ; ?></td>
			 		<td><a href="ApproveComment.php?id=<?php echo $CommentId; ?>" class="btn btn-success">Approve</a></td>
			 		<td><a href="DeleteComment.php?id=<?php echo $CommentId; ?>" class="btn btn-danger">Delete</a></td>
			 		<td><a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentId ; ?>" target="_blank">Live Preview</a></td>
			 	</tr>
			 </tbody>
			<?php } ?>
			</table>
			<h2>Approved Comments</h2>
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>DateTime</th>
						<th>Comments</th>
						<th>Revert</th>
						<th>Action</th>
						<th>Details</th>
					</tr>
				</thead>

			<!--- Php for Fetchin comments from database -->
			<?php 
              
              global $ConnectingDB;
              $sql = "SELECT * FROM  comments WHERE status='ON' ORDER BY id desc ";
              $Execute = $ConnectingDB->query($sql);
              $SrNo = 0;
              while ($DataRows=$Execute->fetch()) {
              	
                 $CommentId = $DataRows["id"];
                 $DateTimeComment = $DataRows["datetime"];
                 $CommenterName = $DataRows["name"];
                 $CommentContent = $DataRows["comment"];
                 $CommentPostId = $DataRows["post_id"];
                 $SrNo++;

                 if (strlen($CommenterName)>10) { $CommenterName = substr($CommenterName,0,10).'...';}
                    if (strlen($DateTimeComment)>11) { $DateTimeComment = substr($DateTimeComment,0,11).'...';}
                 
			 ?>
			 <tbody>
			 	<tr>
			 		<td><?php echo htmlentities($SrNo) ; ?></td>
			 		<td><?php echo htmlentities($CommenterName) ; ?></td>
			 		<td><?php echo htmlentities($DateTimeComment) ; ?></td>
			 		<td><?php echo htmlentities($CommentContent) ; ?></td>
			 		<td><a href="DisApproveComment.php?id=<?php echo $CommentId; ?>" class="btn btn-warning">Dis-Approve</a></td>
			 		<td><a href="DeleteComment.php?id=<?php echo $CommentId; ?>" class="btn btn-danger">Delete</a></td>
			 		<td><a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentId ; ?>" target="_blank">Live Preview</a></td>
			 	</tr>
			 </tbody>
			<?php } ?>
			</table>
		</div>
	</div>
</div>
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