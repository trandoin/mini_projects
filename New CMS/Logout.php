<?php require_once("include/Function.php"); ?>
<?php require_once("include/Session.php"); ?>

<?php 

    $_SESSION["UserId"]=null;
    $_SESSION["UseRName"]= null;
    $_SESSION["AdminName"]= null;
  
  session_destroy();
  Redirect_to("Login.php");
    



 ?>