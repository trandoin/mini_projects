<?php

session_start();

if (isset($_POST['submit'])) {
    
    if ($_POST['pass'] == 'govind') {
        $_SESSION['loggedin'] = true;
        header('location:' .$_SESSION['redirectURL'] );
    }
}

 ?>

 <form method="post" action="">
     <input type="password" name="pass">
     <input type="submit" name="submit">
 </form>