<?php
require_once "google-api/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("");
$gClient->setClientSecret("");
$gClient->setApplicationName("Vicode Media Login");
$gClient->setRedirectUri("http://localhost/login-with-google/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// login URL
$login_url = $gClient->createAuthUrl();
?>