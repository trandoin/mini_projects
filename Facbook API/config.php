<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '566576664224173',
  'app_secret'     => 'dc93761e876ae8e2f6e561a903b8dea3',
  'default_graph_version'  => 'v2.10'
]);

?>