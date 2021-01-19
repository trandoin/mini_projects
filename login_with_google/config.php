<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('656668489769-u3v3qf51hcj2oa9ta0i4dacbnqldlj0d.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('Z3x3RlgGHLPP__tz6cDeBTpy');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Learn%20PHP/login_with_google/');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>
