<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';

$dateShipping = date("Y-m-d H:i:s");
$query = $PDO->prepare("UPDATE orders SET progress = :progress, dateShipping = :dateShipping WHERE idOrder = :idOrder");
$query->bindValue(':progress', htmlspecialchars($_POST['progress']));
$query->bindValue(':dateShipping', $dateShipping);
$query->bindValue(':idOrder', htmlspecialchars($_POST['orderId']));
if($query->execute()){
    echo $dateShipping;
}else{
    echo 'ko';
}
    