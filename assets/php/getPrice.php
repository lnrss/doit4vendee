<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';
$query = $PDO->prepare('SELECT idClient FROM users WHERE email=:email');
$query->execute(['email' => htmlspecialchars($_POST['email'])]);
echo $query->fetch()[0];