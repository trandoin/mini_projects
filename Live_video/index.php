<!DOCTYPE html>
<html>

<head>
  <title>Video chat</title>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/chat.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>



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

<body>
<?php include('header.php'); ?>
<div class="container-fluid">
  <h1 class="py-3"><!-- Trando live conference --></h1>
  <div class="row">
    <div class="col-lg-8">

<div class="card text-center" >
  <div class="card-header"><p><button class="btn btn-success" id="startButton">Start</button> 
    <button class="btn btn-primary" id="callButton">Join</button> 
    <button class="btn btn-danger" id="hangupButton">Hang Up</button></p></div>
  <div class="card-body" id="videobox" style="height: 300px; overflow: auto; overflow-x: hidden;">
   <video id="localVideo" autoplay playsinline controls ></video>
   <video id="remoteVideo" autoplay playsinline ></video>
  </div>
</div> <!-- card -->        
  </div> <!-- col-lg-8 -->

 
   <div class="col-lg-4" >


<ul class="nav nav-tabs " id="myTab" role="tablist">
  <li class="nav-item bg-warning ">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> <i class="fas fa-users">&nbsp;<span >8</span></i> Peoples</a>
  </li>
  <li class="nav-item bg-warning">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> <i class="fas fa-comments"></i> Chat&nbsp;<sup>3</sup> </a>
  </li>
  <li class="nav-item bg-light">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false"> <i class="fas fa-clock"></i>&nbsp;<span  id="time"></span> </a>
  </li>
 
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <ul class="py-2" style="list-style-type: none;">

     <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b>&nbsp;&nbsp;&nbsp; <button class="btn btn-warning  rounded"> <i class="fas fa-ban"></i> Hide</button> 
      </div></li>
     <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b>&nbsp;&nbsp;&nbsp; <button class="btn btn-warning rounded">Hide</button> 
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b> 
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b> 
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b> 
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b> 
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b>  
      </div></li>
      <li><div class="row py-2">
          <div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div> &nbsp;&nbsp;&nbsp;<b class="text-light mt-2"> GOVIND SUMAN</b>  
      </div></li>
    </ul>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
               <!--  <div class="img_cont">
                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div> -->
                <div class="user_info">
                  <span>Chat with Admin</span>
                  <p>17 Messages</p>
                </div>
                <!-- <div class="video_cam">
                  <span><i class="fas fa-video"></i></span>
                  <span><i class="fas fa-phone"></i></span>
                </div> -->
              </div>
              <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu">
                <ul>
                  <li><i class="fas fa-user-circle"></i> View profile</li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body msg_card_body">

              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                  Hi, how are you trando? we are comming with some intresting things
                  <span class="msg_time">8:40 AM, Today</span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text attach_btn"></span>
                </div>

                <textarea name="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn"> <a href="#" onclick="submitChat()"> <i class="fas fa-location-arrow"></i></a></span>
                </div>

              </div>
            </div>
         </div> 
       </div> 


  </div>
</div>



         <!-- <div class="card">
            <div class="card-header msg_head">
              <div class="d-flex bd-highlight">
                <div class="img_cont">
                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                  <span class="online_icon"></span>
                </div>
                <div class="user_info">
                  <span>Chat with Admin</span>
                  <p>17 Messages</p>
                </div>
                <div class="video_cam">
                  <span><i class="fas fa-video"></i></span>
                  <span><i class="fas fa-phone"></i></span>
                </div>
              </div>
              <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
              <div class="action_menu">
                <ul>
                  <li><i class="fas fa-user-circle"></i> View profile</li>
                  <li><i class="fas fa-users"></i> Add to close friends</li>
                  <li><i class="fas fa-plus"></i> Add to group</li>
                  <li><i class="fas fa-ban"></i> Block</li>
                </ul>
              </div>
            </div>
            <div class="card-body msg_card_body">

              <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                  <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                  Hi, how are you trando? we are comming with some intresting things
                  <span class="msg_time">8:40 AM, Today</span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text attach_btn"></span>
                </div>

                <textarea name="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
                <div class="input-group-append">
                  <span class="input-group-text send_btn"> <a href="#" onclick="submitChat()"> <i class="fas fa-location-arrow"></i></a></span>
                </div>

              </div>
            </div>
         </div> 
       </div>  -->


</div>
</div>



  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <script src="js/main.js"></script>
  <script src="js/chat.js"></script>

<?php include('footer.php'); ?>
<!-- Bootstrap js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
