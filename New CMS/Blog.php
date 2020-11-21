<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/96ab48350d.js" crossorigin="anonymous"></script>
	<title>Blog Page</title>
	<style type="text/css">
		.heading{
	font-family: Bitter,Georgia,"Times New Roman",Times,serif;
	font-weight: bold;
	color: #005E90;
}
.heading:hover{
	color: #0090DB;
}
	</style>
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
			<li class="nav-item">
				<a href="Login.php" class="nav-link">Login</a>
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
<div class="container">
	<div class="row mt-4">
		<div class="col-sm-8 " style="min-height: 40px;">
			<h1>The Complete Responsive Cms Blog</h1>
			<h1 class="lead">The complete blog using php by govind suman</h1>
             
             <?php 
                  echo ErrorMessage();
                  echo SuccessMessage(); 

			 ?>


            <?php 
             global  $ConnectingDB;
             // SQL query when search button is active 

            if (isset($_GET["SearchButton"])) {
            	
            	$Search = $_GET["Search"];
            	$sql = "SELECT * FROM posts WHERE datetime LIKE :search 
            	OR title LIKE :search  
            	OR category LIKE :search 
            	OR post LIKE search";
            	$stmt = $ConnectingDB->prepare($sql);
            	$stmt->bindValue(':search', '%'.$Search.'%');
            	$stmt->execute();

            } // Query When pagination is active i.e Blog.php?page=1
            elseif (isset($_GET["page"])) {
            	$Page = $_GET["page"];
            	if ($Page==0 || $Page<1) {
            		$ShowPostFrom =0;
            	}else{ 
            	$ShowPostFrom = ($Page*4)-4;
               }
            	$sql = "SELECT * FROM posts ORDER By id desc LIMIT $ShowPostFrom,4";
            	$stmt = $ConnectingDB->query($sql);
            }
            // Query when Category Button is Active in URL Tab
            elseif (isset($_GET["category"])) {
            	$Category = $_GET["category"];
            	$sql = "SELECT * FROM posts WHERE category='$Category' ORDER BY id desc ";
            	$stmt = $ConnectingDB->query($sql);
            }

            // Default SQL query 
            else{
             $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,3";
               $stmt = $ConnectingDB->query($sql);
            }
              //$stmt = $ConnectingDB->query($sql);
            while ($DataRows = $stmt->fetch()) {
            	$PostId = $DataRows["id"];
                $DateTime = $DataRows["datetime"];
            	$PostTitle = $DataRows["title"];
            	$Category = $DataRows["category"];
            	$Admin = $DataRows["author"];
            	$Image = $DataRows["image"];
                $PostDescription = $DataRows["post"];
     
            ?>
        
<!-- Showing post on public directory from database table -->
<div class="card">
	<img class="img-fluid card-img-top" src="Upload/<?php echo $Image;?>">
	<div class="card-body">
		<h4 class="card-title"><?php echo htmlentities($PostTitle);  ?></h4>
		<small class="text-muted">Category : <span class="text-dark"><a href="Blog.php?category=<?php echo $Category; ?>"><?php echo $Category; ?></a></span> & Written By <span class="text-dark"><a href="Profile.php?username=<?php echo htmlentities($Admin);?>"> <?php echo htmlentities($Admin); ?></a></span> On <span class="text-dark"> <?php echo $DateTime; ?></span></small>
		<span style="float:right" class="badge badge-dark text-light">Comments  <?php echo ApproveCommentsAccordingToPost($PostId); ?></span>
		<hr>
		<p class="card-text">
          <?php 
          if (strlen($PostDescription)>150) {
           	#
           	$PostDescription = substr($PostDescription,0,150).'...';
           } 
			echo htmlentities($PostDescription); ?></p>
		<a href="FullPost.php?id=<?php echo $PostId; ?>" style="float: right;">
			<span class="btn btn-info">Read More >></span>
		</a>
	</div>
</div>
 <?php } ?>
 <br>
 <!-- Ending of public directory -->

 <!-- Pagination Start Here -->
<nav>
	<ul class="pagination pagination-md">
		 <!-- Creating Backword Button -->
		 <?php 
          
          if (isset($Page)) {
          	if ($Page>1) {
          		# code...
          	
          	?>
         	<li class="page-item ">
			<a href="Blog.php?page=<?php echo $Page-1; ?>" class="page-link">&laquo;</a>
		</li>
          <?php } } ?>
		<?php 
         
         global $ConnectingDB;
         $sql = "SELECT  COUNT(*) FROM posts";
         $stmt = $ConnectingDB->query($sql);
         $RowPagination = $stmt->fetch();
          $TotalPosts = array_shift($RowPagination);
         // echo  $TotalPosts.'<br>';
          $PostPagination = $TotalPosts/4;
          $PostPagination =ceil($PostPagination);
         // echo $PostPagination;
          for ($i=1; $i<= $PostPagination ; $i++) { 
           
           if (isset($Page)) {
           	
           	if ($i==$Page) { ?>
           
		
		<li class="page-item active">
			<a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
		</li>
		<?php
	}else{
		?>
			<li class="page-item ">
			<a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
		</li>
	
		 <?php } } } ?>
		 <!-- Creating Forword Button -->
		 <?php 
          
          if (isset($Page)&&!empty($Page)) {
          	if ($Page+1<=$PostPagination) {
          		# code...
          	
          	?>
         	<li class="page-item ">
			<a href="Blog.php?page=<?php echo $Page+1; ?>" class="page-link">&raquo;</a>
		</li>
          <?php } } ?>
		 
	</ul>
</nav>

 <!--- PAgination Ending Here -->

		</div>
		<!-- Side Area Start Here -->

		<div class="col-sm-4">
			<div class="card mt-4">
				<div class="card-body">
					<img src="images/startblog.jpg" class="d-block img-fluid mb-3">
					<div class="text-center">
						I can hear your objections already. “But Dan, I have to blog for a cardboard box manufacturing company.” I feel your pain, I really do. During the course of my career, I’ve written content for dozens of clients in some less-than-thrilling industries (such as financial regulatory compliance and corporate housing), but the hallmark of a professional blogger is the ability to write well about any topic, no matter how dry it may be. Blogging is a lot easier, however, if you can muster at least a little enthusiasm for the topic at hand.
                        You also need to be able to accept that not every post is going to get your motor running. Some posts will feel like a chore, but if you have editorial control over what you write about, then choose topics you’d want to read – even if they relate to niche industries. The more excited you can be about your topic, the more excited your readers will be when they’re reading it
					</div>
				</div>
			</div>
			<br>
			<div class="card-header bg-dark text-light">
				<h2 class="lead">Sign Up !</h2>
			</div>
			<div class="card-body">
				<button type="Submit" class="btn btn-success btn-block text-center text-white mb-3" name="">Join the Forum</button>
				<button type="Submit" class="btn btn-danger btn-block text-center text-white mb-3" name="">Login</button>
				<div class="input-group mb-3">
					<input type="text" name="" class="form-control" placeholder="Enter Your Email">
					<div class="input-group-append">
						<button type="Submit" class="btn btn-primary btn-sm text-center text-white">Subscribe Now !</button>
					</div>
				</div>
			</div>
			<div class="card">
			<div class="card-header bg-primary lext-light">
				<h2 class="lead">Categories</h2></div>
				<div class="card-body">
					<!--- Fetching Categories From database -->
					<?php 

                    global $ConnectingDB;
                    $sql = "SELECT * FROM category ORDER BY id desc";
                    $stmt = $ConnectingDB->query($sql);
                    while ($DataRows = $stmt->fetch()) {
                    	
                    	$CategoryId = $DataRows["id"];
                    	$CategoryName = $DataRows["title"];
					 ?>
					 <!-- Showing Categories on html page -->
				<a href="Blog.php?category=<?php echo $CategoryName; ?>"><span class="heading"><?php echo $CategoryName; ?></span></a><br>
					<?php } ?>


				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-header bg-info text-white">
					<h2 class="lead"> Recent Posts</h2>
				</div>
				<div class="card-body">
					<!-- Fetching Recent Posts -->
					<?php 
                    
                    global $ConnectingDB;
                    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,4";
                    $stmt = $ConnectingDB->query($sql);
                    while ($DataRows = $stmt->fetch()) {
                    	
                    	$Id = $DataRows["id"];
                    	$Title = $DataRows["title"];
                    	$DateTime  = $DataRows["datetime"];
                    	$Image = $DataRows["image"];
					 ?>
					<div class="media">
						<img class="d-block img-fluid align-self-start" width="90" height="94" src="Upload/<?php echo htmlentities($Image); ?>">
					<div class="media-body ml-2">
						<a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><h6 class="lead"><?php echo htmlentities($Title); ?></h6></a>
						<p class="small"><?php echo htmlentities($DateTime); ?></p>
					</div>
				</div>
				<hr>
				<?php } ?>
				</div>
			</div>
		</div>
		
		<!-- Side Area End --->
	</div>
</div>



 <!--HEADER END-->
<br>
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