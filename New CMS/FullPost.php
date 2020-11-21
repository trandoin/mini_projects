<?php require_once("include/DB.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>


<?php $SearchQueryParameter = $_GET["id"]; ?>

<?php

if (isset($_POST['Submit'])) {
	
	$Name = $_POST['CommenterName'];
	$Email = $_POST['CommenterEmail'];
	$Comment = $_POST['CommenterThoughts'];
	//$Admin = $_SESSION["UseRName"]; # Using Dynamically By session variables
    date_default_timezone_set("Asia/Kolkata"); //You can chage time Zone As you wish
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y  %H: %M: %S",$CurrentTime);


	if (empty($Name)||empty($Email)||empty($Comment)) {
		
		$_SESSION["ErrorMessage"] = "All Fields must filled out";
		Redirect_to("FullPost.php?id={$SearchQueryParameter}");
	}

	elseif (strlen($Comment)>500) {
		
		$_SESSION["ErrorMessage"] = "Comment length should be less then 500 characters";
		Redirect_to("FullPost.php?id={$SearchQueryParameter}");
	}
	else{

		#Query to insert Comments in DB when everything is fine
		global $ConnectingDB; // FOR OLD VERSION OF PHP LIKE 5.6 ect
		$sql = "INSERT INTO comments (datetime,name,email, comment,approvedby,status, post_id)";
		$sql .= "VALUES(:dateTime,:namE,:emaiL,:commentS,'pending','OFF',:PostIdFromURL)";
		$stmt = $ConnectingDB->prepare($sql);
		$stmt->bindValue(':dateTime',$DateTime);
		$stmt->bindValue(':namE',$Name);
		$stmt->bindValue(':emaiL',$Email);
		$stmt->bindValue(':commentS',$Comment);
		$stmt->bindValue(':PostIdFromURL',$SearchQueryParameter);
        $Execute =$stmt->execute();


       if ($Execute) {
        	$_SESSION["SuccessMessage"] = "Comment submited Successfully";
        	Redirect_to("FullPost.php?id={$SearchQueryParameter}"); // You Can Send Admin to Any PAge YOU Want
        }else{
        	$_SESSION["ErrorMessage"] = "Something Went to Wrong! Try Again!";
		    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
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
	<title>Full Post</title>
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

            if (isset($_GET["SearchButton"])) {
            	
            	$Search = $_GET["Search"];
            	$sql = "SELECT * FROM posts WHERE datetime LIKE :search 
            	OR title LIKE :search  
            	OR category LIKE :search 
            	OR post LIKE search";
            	$stmt = $ConnectingDB->prepare($sql);
            	$stmt->bindValue(':search', '%'.$Search.'%');
            	$stmt-execute();

            }


            else{

            	$PostIdFromURL = $_GET["id"];
            	if (!isset($PostIdFromURL)) {
            		
                 $_SESSION["ErrorMessage"] = "Bad Request !";
                 Redirect_to("Blog.php");

            	}
             $sql = "SELECT * FROM posts WHERE id = '$PostIdFromURL' ";
               $stmt = $ConnectingDB->query($sql);
               $Result = $stmt->rowCount();
               if ($Result!=1) {
               	
               	$_SESSION["ErrorMessage"] = "Bad Request !";
               	Redirect_to("Blog.php?page=1");
               }
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
		<small class="text-muted">Category : <span class="text-dark"><?php echo $Category; ?></span> & Written By <span class="text-dark"> <?php echo htmlentities($Admin); ?></span> On <span class="text-dark"> <?php echo $DateTime; ?></span></small>
		<hr>
		<p class="card-text">
          <?php 
          // HERE WE DELETED IF CONTIDITON COZ WE WANT TO FULL POST
			echo $PostDescription; ?></p>
	<!--	<a href="FullPost.php?id=<?php echo $PostId; ?>" style="float: right;">
			<span class="btn btn-info">Read More >></span>
		</a> -->
	</div>
</div>
 <?php } ?>
 <!-- Ending of public directory -->

 <!-- Fetching Existing Comments START -->
 	<span class="Fieldinfo">Comments</span>
 	<br><br>
<?php 

global $ConnectingDB;
$sql = "SELECT * FROM comments WHERE post_id= '$SearchQueryParameter' AND status='ON'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
	
	$CommentDate = $DataRows['datetime'];
	$CommenterName = $DataRows['name'];
	$CommentContent = $DataRows['comment'];




 ?>
 <div>
 
 	<div class="media CommnetBlock">
 		<img class="d-block img-fluid align-self-start" style="height: 100px; width: 70px;" src="images/blank.webp">
 		<div class="media-body ml-2">
 			<h6 class="lead"> <?php echo $CommenterName; ?> </h6>
 			<p class="small"> <?php echo  $CommentDate; ?></p>
 			<p> <?php echo $CommentContent; ?></p>
 		</div>
 	</div>
 </div><hr>
 <?php } ?>
 <!-- Fetching Existing Comments END -->

<!--  Comment par Start --->
<div class="">
	<form action="FullPost.php?id=<?php echo $SearchQueryParameter;?>" method="post" class="" >
		<div class="card mb-3">
        <div class="card-header">
        	<h5 class="Fieldinfo">Share Your Thoughts about this post</h5>
        </div>
        <div class="card-body">
        	<div class="form-group">
        		<div class="input-group">
        			<div class="input-group-prepend">
        				<span class="input-group-text"><i class="fas fa-user"></i></span>
        			</div>
        		<input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
        		</div>
        	</div>
        		<div class="form-group">
        		<div class="input-group">
        			<div class="input-group-prepend">
        				<span class="input-group-text"><i class="fas fa-envelope"></i></span>
        			</div>
        		<input class="form-control" type="email" name="CommenterEmail" placeholder="Email" value="">
        		</div>
        	</div>
        	<div class="form-group">
        		<textarea name="CommenterThoughts" class="form-control" rows="8" cols="88"></textarea>
        	</div>
        	<button class="btn btn-primary" type="submit" name="Submit">Submit</button>
        </div>
		</div>
	</form>
</div> 
<!-- Ending Comments section --->
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