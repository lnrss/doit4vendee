<?php
session_start();
require_once('vendor/autoload.php');
$clientID = '1094043147612-rq2g4po1vnurqctenhkdhk57aeo29ajm.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUrl = 'https://doit4vendee.fr/login.php';

$client = new Google_Client();
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if(isset($_GET['code'])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userinfo->get();
    $idClientGoogle = substr($google_info['id'], 0, 10);

    $query = $PDO->prepare("SELECT * FROM users WHERE idClientGoogle = :idClientGoogle");
    $query->bindValue(':idClientGoogle', $idClientGoogle);
    $query->execute();       
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if(!isset($row['idClientGoogle'])){
        $query= $PDO->prepare("INSERT INTO users (idClientGoogle, firstName, lastName, email, password) VALUES (?,?,?,?,?)");
        try{
            $query->execute([$idClientGoogle, $google_info['given_name'], $google_info['family_name'], $google_info['email'], password_hash('@!$^@*$', PASSWORD_BCRYPT, ['cost' => 12])]);
        } catch (Exception $e) {}  
    }

    if(!empty($idClientGoogle)){
        $_SESSION['idClient'] = $idClientGoogle;
    }
    if(!empty($google_info['given_name'])){
        $_SESSION['firstName'] = $google_info['given_name'];
    }
    if(!empty($google_info['family_name'])){
        $_SESSION['lastName'] = $google_info['family_name'];
    }
    if(!empty($google_info['email'])){
        $_SESSION['user'] = $google_info['email'];
        $_SESSION['email'] = $google_info['email'];
    }
    if(!empty($google_info['picture'])){
        $_SESSION['googleImage'] = $google_info['picture'];
    }

    // echo '<script>alert("idClient : '.$_SESSION['idClient'].' & Email : '.$_SESSION['email'].' & Prénom : '.$_SESSION['firstName'].' & USER : '.$_SESSION['user'].' ")</script>';
    echo '<script>window.location.replace("profile.php")</script>';
}
?>