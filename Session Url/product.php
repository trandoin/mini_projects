<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URL'];
    header('location:login.php');
}


 ?>