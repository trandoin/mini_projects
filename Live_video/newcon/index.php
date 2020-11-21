<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video capture</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style type="text/css">
        .peoples  li{
            list-style-type: none;
            padding-top: 10px;
            margin-left: -19px;
        }
        .message li{
            list-style-type: none;
            padding-top: 10px;
            margin-left: -25px;
        }
        .message li span{
            
            font-size: 15px; 
            font-weight: bold;
        }
    </style>
</head>

<script type="text/javascript">
              var fxn = function() {
var now = new Date(), // current date
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; // you get the idea
        time = now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds(), // again, you get the idea

        // a cleaner way than string concatenation
        date = [now.getDate(),
                months[now.getMonth()],
                now.getFullYear()].join(' ');

  document.getElementById('time').innerHTML = [ time].join(' / '); // If you want to print date also then pass date with time eg. document.getElementById('time').innerHTML = [date, time].join(' / '); 
}
setInterval(fxn, 1000);
              </script>

<script type="text/javascript" src="chat.js"></script>

<body>
    <?php include('../header.php'); ?>
     <h3 class="py-2 px-2 bg-success">Trando video conference</h3>
<div class="container-fluid ">
    <div class="row">

        <div class="col-lg-7 py-2 mb-3" style="border: 3px solid red;">
            <p>
             <button class="btn btn-success" id="btnStart"><i class="fas fa-video"></i> Start</button>
             <button class="btn btn-danger" id="btnStop"><i class="fas fa-stop-circle"></i> Stop </button></p>
        
        <video controls style="width: 100%; height: 600px; border: 5px solid red"></video>
        
        <video id="vid2" controls style="width: 70px; height: 70px; float: right;"></video>
        </div>
<div class="col-lg-5 btn-info py-2" >
     <ul class="nav nav-pills mb-3 bg-warning" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-users"></i> 33</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-comments"></i> chat <sup>20</sup> </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-clock"></i><span  id="time"></span></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="card border-success " style="min-height: 500px; ">
                 <div class="card-header bg-info border-success">
                     <i class="fas fa-users"></i> All joined peoples here <span class="text-light" style="float: right;"><a href="" class="text-light"><i class="fas fa-user-plus"></i> Add</a> </span>
                 </div>
                 <div class="card-body text-success" style="overflow: auto; max-height: 500px;">
                   <ul class="peoples">
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                     <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li>
                      <li><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" style="width: 40px; height: 40px; border-radius: 50%;"> <span>&nbsp;&nbsp;Name of People 1</span> </li> 
                   </ul>
                 </div>
                 <!-- <div class="card-footer bg-transparent border-success">
                     
                 </div> -->
               </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div class="card border-success " style="min-height: 500px;">
                 <div class="card-header bg-info border-success">
                     <i class="fas fa-comments"></i> Type message here
                 </div>
                 <div class="card-body text-success" id="chatlogs" style="overflow: auto; max-height: 500px;">
                  <!-- this div for all chat -->
                 </div>
                 <div class="card-footer bg-transparent border-success">
                     <form name="form1">
                      <input type="hidden" name="uname" class="form-control" value="Govind" placeholder="Enter name...">
                      <!-- <input type="hidden" name="vid" class="form-control" value="testing" placeholder="Enter name..."> -->
                         <input type="text" name="msg" class="form-control" placeholder="Enter text...">
                         <a href="#" onclick="submitChat()" class="btn btn-primary">Send</a>
                     </form>
                 </div>
               </div>

          
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      Others testing purpose i am testing space

  </div>
</div>

            <!--  <div class="card border-success " style="min-height: 500px;">
                 <div class="card-header bg-primary border-success">
                     <i class="fas fa-comments"></i>
                 </div>
                 <div class="card-body text-success">
                   <h5 class="card-title">Success card title</h5>
                   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                 </div>
                 <div class="card-footer bg-transparent border-success">
                     <form>
                         <input type="text" name="" class="form-control" placeholder="Enter text...">
                     </form>
                 </div>
               </div> -->


       
    </div>
</div>
</div>

  <?php include('../footer.php'); ?>

    <script src="main.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>