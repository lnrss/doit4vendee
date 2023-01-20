<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';

$query = $PDO->prepare('SELECT * FROM address WHERE idClient = :idClient');
$query->execute(['idClient' => $_SESSION['idClient']]);
            
$row = $query->fetch(PDO::FETCH_ASSOC);
$addressArray = [];
$addressArray += ['city' => $row['city']];
$addressArray += ['street' => $row['street']];
$addressArray += ['addressSup' => $row['addressSup']];
$addressArray += ['postalCode' => $row['postalCode']];

echo $row['city'] == '' || $row['city'] == '' || $row['city'] == '' ? json_encode([]) : json_encode($addressArray);