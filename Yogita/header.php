<?php
  //  define('BASE_URL', 'http://nitjintranet.ac.in');
    define('BASE_URL', 'http://localhost/cc_store');
?>
    <div class="container-fluid" style="background-color:#003A6A;">
  <div class="row" style="background-color:#FECD0B; height:4px"> </div>

  <div class="container">
    <div class="row">
        <div class="col-md-8" style="padding-top:12px">
            <div class="logo">
                <a href="index" title="NIT Jalandhar" rel="home">
                    <img src="Images/logo.png" alt="NIT Jalandhar"/>
                </a>
            </div> <!-- /.logo -->

            <div class="logo2">
                <a href="index" title="NIT Jalandhar" rel="home">
                    <img src="images/logo2.png" alt="NIT Jalandhar"/></a><br /><br />
                    <p style="width:100%; font-family:Times New Roman; letter-spacing:1px; font-size:22px; color:white; line-height:30px;">
                      डॉ बी आर अम्बेडकर राष्ट्रीय प्रौद्योगिकी संस्थान, जालंधर<br />
                      Dr B R Ambedkar National Institute of Technology, Jalandhar</p>

            </div> <!-- Responsive .logo -->
        </div> <!-- /.col-md-8 -->
    </div>
  </div>
</div>

<nav class="navbar navbar-inverse" style="background-color:#052344;">
<div class="container">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index" style="color:#F7DC6F; font-family:Trebuchet MS; font-size:22px;"  data-toggle="tooltip" data-placement="bottom" title="Computer Centre Store">| Computer Centre |</a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">




    <?php
    if(isset($_SESSION['i_login']))
    {
      $username = $_SESSION['i_login'];

      $login = $con->prepare("SELECT email_id, pwd FROM login WHERE email_id = :email");
      $login->execute(['email' => $username]);

      if($login->rowCount() == 1)
      {
    ?>
    <ul class="nav navbar-nav">
      <li><a href="user_home">Home</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
   <?php
      }
   }
   ?>

</div>

</div>
</nav>
