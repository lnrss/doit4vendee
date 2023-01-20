<?php
session_start();
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('1094043147612-rq2g4po1vnurqctenhkdhk57aeo29ajm.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/doit4vendee/login.php');
$google_client->addScope('email');
$google_client->addScope('profile');
?>