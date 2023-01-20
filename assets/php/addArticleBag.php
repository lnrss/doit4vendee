<?php
session_start();
define('BASEPATH', true);
require_once '../constante.php';

if(htmlspecialchars($_POST['addRemoveArticle']) == 'add' || htmlspecialchars($_POST['addRemoveArticle']) == 'rem'){ //? Add / Reduce manual in bag page

    $quantity = htmlspecialchars($_POST['addRemoveArticle']) == 'add' ? htmlspecialchars($_POST['quantity'])+1 : htmlspecialchars($_POST['quantity'])-1;

    $query = $PDO->prepare("UPDATE bag SET quantity = :quantity WHERE idBag = :idBag");

    $query->bindValue(':quantity', $quantity);

    $query->bindValue(':idBag', htmlspecialchars($_POST['idBag']));

}else if(htmlspecialchars($_POST['addRemoveArticle']) == 'remAll'){ //? Remove one article in bag

    $query = $PDO->prepare("DELETE FROM bag WHERE idBag = :idBag");

    $query->bindValue(':idBag', htmlspecialchars($_POST['idBag']));

}else{ //? Add with détail article

    $idClient = htmlspecialchars($_POST['idClient']);

    $idArticle = htmlspecialchars($_POST['idArticle']);

    $quantity = htmlspecialchars($_POST['quantity']);

    $size = htmlspecialchars($_POST['size']) == '33 Cl' ? 'CL' : htmlspecialchars($_POST['size']);

    $query = $PDO->prepare("SELECT * FROM bag WHERE idClient = :idClient AND size = :size");

    $query->bindValue(':idClient', $idClient);

    $query->bindValue(':size', $size);

    $query->execute();
                
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if(isset($row['quantity']) && $row['quantity'] > 0 && $row['idArticle'] == $idArticle){
        $query = $PDO->prepare("UPDATE bag SET quantity = :quantity WHERE idBag = :idBag AND idArticle = :idArticle");

        $query->bindValue(':quantity', ($quantity + $row['quantity']));

        $query->bindValue(':idBag', $row['idBag']);

        $query->bindValue(':idArticle', $row['idArticle']);
    }else{
        $query = $PDO->prepare("INSERT INTO bag (idClient, idArticle, quantity, size) VALUES (:idClient,:idArticle,:quantity,:size)");

        $query->bindValue(':idClient', $idClient);

        $query->bindValue(':idArticle', $idArticle);

        $query->bindValue(':quantity', $quantity);

        $query->bindValue(':size', $size);
    }

}

if($query->execute()){
    echo 'ok';
}