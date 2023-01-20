<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';
$query = $PDO->prepare("DELETE FROM users WHERE idClient=:idClient");
$query->bindValue(':idClient', $_SESSION['idClient']);
echo $query->execute() ? true : false;