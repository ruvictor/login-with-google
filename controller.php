<?php
require_once "core/controller.Class.php";
require_once "config.php";

if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
}else{
    header('Location: index.php');
    exit();
}
if(!isset($token["error"]) && ($token["error"] != "invalid_grant")){
    // get data from google
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

    //insert data in the database
    $Controller = new Controller;
    echo $Controller -> insertData(
        array(
            'email' => $userData['email'],
            'avatar' => $userData['picture'],
            'picture' => $userData['picture'],
            'familyName' => $userData['familyName'],
            'givenName' => $userData['givenName'],
        )
    );
}else{
    header('Location: index.php');
    exit();
}
?>
