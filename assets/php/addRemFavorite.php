<?php

session_start();

define('BASEPATH', true);

require_once '../constante.php';

$idClient = htmlspecialchars($_POST['idClient']);

$idArticle = htmlspecialchars($_POST['idArticle']);

$query = $PDO->prepare("SELECT count(idFavorite) as idFav FROM favorite WHERE idClient = :idClient AND idArticle = :idArticle GROUP BY idFavorite");

$query->bindValue(':idClient', $idClient);

$query->bindValue(':idArticle', $idArticle);

$query->execute();
            
$row = $query->fetch(PDO::FETCH_ASSOC);

if(!isset($row['idFav'])){
    $query = $PDO->prepare("INSERT INTO favorite (idClient, idArticle) VALUES (:idClient,:idArticle)");

    $query->bindValue(':idClient', $idClient);

    $query->bindValue(':idArticle', $idArticle);

    echo $query->execute() ? "okAdd" : "ko";
}else{
    $query = $PDO->prepare("DELETE FROM favorite WHERE idClient = :idClient AND idArticle = :idArticle");

    $query->bindValue(':idClient', $idClient);

    $query->bindValue(':idArticle', $idArticle);

    echo $query->execute() ? "okRem" : "ko";
}