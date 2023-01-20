<?php
session_start();
define('BASEPATH', true);
include('../constante.php');
$arrArticles = [];
$arrArticlesDetails = [];
$i = 0;

$query = $PDO->prepare('SELECT b.*, a.* FROM bag b INNER JOIN article a ON b.idArticle = a.idArticle WHERE b.idClient = :idClient');
$query->bindValue(':idClient', $_SESSION['idClient']);
$query->execute();
if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        $arrArticlesDetails = [];
        $arrArticlesDetails += ["idArticle" => $row['idArticle']];
        $arrArticlesDetails += ["size" => $row['size']];
        $arrArticlesDetails += ["stock" => $row['stock'.strtoupper($row['size'])]];
        $arrArticlesDetails += ["quantity" => $row['quantity']];
        $arrArticlesDetails += ["price" => ($row['quantity'] * $row['price'])];
        $arrArticles[$i] = $arrArticlesDetails;
        $i++;
    }
}

echo json_encode($arrArticles);