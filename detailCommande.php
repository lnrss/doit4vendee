<?php
session_start();
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Commande réussie';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
$idCommande = $_SESSION['idc'];
if($idCommande != ''){
?>

<section id="detailOrderContainer">
    <!--
        - Génerer un reçu
        - Déplacer le panier dans commande
        - Envoyer un mail de confirmation à Do it & au client
        - Déduire le stock
     -->
</section>
        
<?php 
    echo $idCommande;
}else{
    header('HTTP/1.0 404 Not Found');
    exit;
}
require('assets/template/footer.php'); ?>