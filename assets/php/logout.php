<?php
session_start();
// include('../googleOauth/googleOauth.php');
isset($google_client) ? $google_client->revokeToken() : '' ;
session_destroy();
header('Location: ../../login.php');
exit;