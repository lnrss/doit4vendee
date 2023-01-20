<?php
session_start();

define('BASEPATH', true);

require_once '../constante.php';

$query = $PDO->prepare("SELECT * FROM reduction WHERE codeReduction = :codeReduction");

$query->bindValue(':codeReduction', htmlspecialchars($_POST['codeReduction']));

if(!$query->execute()){
    echo 'ko';
}
            
$row = $query->fetch(PDO::FETCH_ASSOC);

if($row['used'] == 0){
    echo isset($row['amountReduction']) ? number_format($row['amountReduction'], 2) : 'incorrectCode';
}else{
    echo 'used';
}