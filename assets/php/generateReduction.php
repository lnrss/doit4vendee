<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';

function genId(){
    $arr = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];
    
    $currentId = '';

    for($i=0; $i < 4; $i++){ //? Pour un id de 4 charactères
        $currentId .= $arr[rand(0, 61)];
    }

    return $currentId;
}

for($i=0; $i < 20; $i++){
    $reductionCode = genId();

    $query = $PDO->prepare("INSERT INTO reduction (codeReduction, amountReduction) VALUES (:codeReduction,:amountReduction)");

    $query->bindValue(':codeReduction', $reductionCode);

    $query->bindValue('amountReduction', 6);

    if($query->execute()){
        echo $reductionCode.'<br/>';
    }
}