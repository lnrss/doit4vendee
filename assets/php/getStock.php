<?php
session_start();
define('BASEPATH', true);
include('../constante.php');

$query = $PDO->prepare('SELECT * FROM article WHERE idArticle = :idArticle');
$query->bindValue(":idArticle", htmlspecialchars($_POST["idArticle"]));
$query->execute();
if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $sizeSelected = $row['sizeSelected'];
    }
}
echo $sizeSelected;