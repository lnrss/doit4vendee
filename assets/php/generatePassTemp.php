<?php

session_start();

define('BASEPATH', true);

require_once '../constante.php';

$newPass =  substr(str_shuffle('abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789'),0,8);

$passCrypted = password_hash($newPass, PASSWORD_BCRYPT, ['cost' => 12]);

$email = htmlspecialchars($_POST['email']);

$query = $PDO->prepare('UPDATE users SET passwordTemp=? WHERE email=?');

$query->execute([$passCrypted, $email]);

echo $newPass;