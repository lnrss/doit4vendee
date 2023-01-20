<?php
session_start();
if((isset($_SESSION['lastName']) && $_SESSION['lastName'] != '')){
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Panier';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
$delivery = 6;
$priceMinDelivery = 50;
?>
<section id="shoppingCard">
    <div id="topContent">
        <?php
        $query = $PDO->prepare('SELECT b.*, a.*, SUM(quantity) AS sumQuantity FROM bag b INNER JOIN article a ON b.idArticle = a.idArticle WHERE b.idClient = :idClient GROUP BY a.idArticle, b.size');
        $query->bindValue(':idClient', $_SESSION['idClient']);
        $query->execute();
        $totalPrice = 0;
        if($query->rowCount() > 0){ ?>
            <h2 class="titlePage">
                Mon panier
            </h2> <?php
            while($row = $query->fetch(PDO::FETCH_ASSOC)) { 
                if($row['stock'.strtoupper($row['size'])] > 0){
                    $stockSize = $row['sumQuantity'] > $row['stock'.strtoupper($row['size'])] ? $row['stock'.strtoupper($row['size'])] : $row['sumQuantity'];
                    if($row['sumQuantity'] > $row['stock'.strtoupper($row['size'])]){
                        $query = $PDO->prepare("UPDATE bag SET quantity = :quantity WHERE idArticle = :idArticle");
                        $query->bindValue(':quantity', ($row['stock'.strtoupper($row['size'])]));
                        $query->bindValue(':idArticle', $row['idArticle']);
                        $query->execute();
                    }
                    ?>
                    <div class="itemCardContainer">
                        <div class="descriptionItemContainer" onclick="window.location='article?id=<?=$row['idArticle']?>'">
                            <img src="assets/img/<?=$row['nom']?>/img1.jpg" alt="<?=$row['altOne']?>">
                            <div class="detailItemContainer">
                                <span class="titleItem">
                                    <?=$row['nom']?>
                                </span>
                                <p class="detailItem">
                                    Taille : <span id="sizeDetail"><?=$row['size'] == 'CL' ? '33 CL' : $row['size']?></span><br/>
                                    Genre : <?=$row['user']?>
                                    <span id="idCmd" style="display:none"><?=$row['idArticle']?></span>
                                </p>
                                <span class="priceItem">
                                    <?=number_format($row['price']*$stockSize, 2);?>€
                                </span>
                            </div>
                        </div>
                        <div class="quantitySelectContainer">
                            <svg onclick="addRemoveArticle(this, 'add', <?=$row['stock'.strtoupper($row['size'])]?>, <?=$row['idBag']?>, <?=$row['price']?>, <?=$delivery?>, <?=$priceMinDelivery?>)" width="16" height="16" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.04175 4.33333C7.04175 4.03418 6.79924 3.79167 6.50008 3.79167C6.20093 3.79167 5.95841 4.03418 5.95841 4.33333V5.95833H4.33341C4.03426 5.95833 3.79175 6.20085 3.79175 6.5C3.79175 6.79915 4.03426 7.04167 4.33341 7.04167H5.95841V8.66667C5.95841 8.96582 6.20093 9.20833 6.50008 9.20833C6.79924 9.20833 7.04175 8.96582 7.04175 8.66667V7.04167H8.66675C8.9659 7.04167 9.20841 6.79915 9.20841 6.5C9.20841 6.20085 8.9659 5.95833 8.66675 5.95833H7.04175V4.33333Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.5C0 11.8528 1.14725 13 6.5 13C11.8528 13 13 11.8528 13 6.5C13 1.14725 11.8528 0 6.5 0C1.14725 0 0 1.14725 0 6.5ZM1.08333 6.5C1.08333 7.81346 1.15513 8.795 1.32043 9.53879C1.48299 10.2703 1.72124 10.7037 2.00875 10.9912C2.29626 11.2788 2.72973 11.517 3.46121 11.6796C4.205 11.8449 5.18654 11.9167 6.5 11.9167C7.81346 11.9167 8.795 11.8449 9.53879 11.6796C10.2703 11.517 10.7037 11.2788 10.9912 10.9912C11.2788 10.7037 11.517 10.2703 11.6796 9.53879C11.8449 8.795 11.9167 7.81346 11.9167 6.5C11.9167 5.18654 11.8449 4.205 11.6796 3.46121C11.517 2.72973 11.2788 2.29626 10.9912 2.00875C10.7037 1.72124 10.2703 1.48299 9.53879 1.32043C8.795 1.15513 7.81346 1.08333 6.5 1.08333C5.18654 1.08333 4.205 1.15513 3.46121 1.32043C2.72973 1.48299 2.29626 1.72124 2.00875 2.00875C1.72124 2.29626 1.48299 2.72973 1.32043 3.46121C1.15513 4.205 1.08333 5.18654 1.08333 6.5Z" fill="black"/></svg>
                            <span class="quantityItem"><?=$stockSize?></span>
                            <svg id="testtt" onclick="addRemoveArticle(this, 'rem', <?=$row['stock'.strtoupper($row['size'])]?>, <?=$row['idBag']?>, <?=$row['price']?>, <?=$delivery?>, <?=$priceMinDelivery?>)" width="16" height="16" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3.79175" y="5.95833" width="5.41667" height="1.08333" rx="0.541667" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.5C0 11.8528 1.14725 13 6.5 13C11.8528 13 13 11.8528 13 6.5C13 1.14725 11.8528 0 6.5 0C1.14725 0 0 1.14725 0 6.5ZM1.08333 6.5C1.08333 7.81346 1.15513 8.795 1.32043 9.53879C1.48299 10.2703 1.72124 10.7037 2.00875 10.9912C2.29626 11.2788 2.72973 11.517 3.46121 11.6796C4.205 11.8449 5.18654 11.9167 6.5 11.9167C7.81346 11.9167 8.795 11.8449 9.53879 11.6796C10.2703 11.517 10.7037 11.2788 10.9912 10.9912C11.2788 10.7037 11.517 10.2703 11.6796 9.53879C11.8449 8.795 11.9167 7.81346 11.9167 6.5C11.9167 5.18654 11.8449 4.205 11.6796 3.46121C11.517 2.72973 11.2788 2.29626 10.9912 2.00875C10.7037 1.72124 10.2703 1.48299 9.53879 1.32043C8.795 1.15513 7.81346 1.08333 6.5 1.08333C5.18654 1.08333 4.205 1.15513 3.46121 1.32043C2.72973 1.48299 2.29626 1.72124 2.00875 2.00875C1.72124 2.29626 1.48299 2.72973 1.32043 3.46121C1.15513 4.205 1.08333 5.18654 1.08333 6.5Z" fill="black"/></svg>
                        </div>
                    </div>
                    <?php $totalPrice += $row['price']*$stockSize;
                }
             }
        ?>
        <div class="reducContainer">
            <input type="text" class="reducInput" placeholder="Code de réduction">
            <input type="button" value="Activer" class="reducButton" onclick='addReduction($(".reducInput").val());'>
        </div>
        <div class="recapCardContainer">
            <span class="recapCard">
                Sous Total
            </span>
            <span class="recapCardAmount" id="priceSubTotal">
                <?=number_format((float)$totalPrice, 2, '.', '');?>€
            </span>
        </div>
        <div class="recapCardContainer" id="rowReduc">
            <span class="recapCard">
                Réduction
            </span>
            <span class="recapCardAmount" id="amountReduction">
                <?=$totalPrice >= $priceMinDelivery ? number_format((float)$delivery, 2, '.', '').'€' : '0.00€'?>
            </span>
        </div>
        <div class="recapCardContainer" style="margin-bottom: 0;">
            <span class="recapCard">
                Livraison à Domicile
            </span>
            <span class="recapCardAmount" id="amountDelivery">
                <?=$totalPrice >= $priceMinDelivery ? 'GRATUIT' : number_format((float)$delivery, 2, '.', '').'€'?>
            </span>
        </div>
        <span id="freeDeliveryRemaining">
                <?=$totalPrice >= $priceMinDelivery ? 'Vous bénéficiez de la livraison offerte' : 'Plus que <span id="priceFreeDelivery">'.number_format((float)($priceMinDelivery - $totalPrice), 2, '.', '').'</span>€ pour la livraison offerte'?>
        </span>
        <div class="recapCardContainer" style="margin-bottom: 100px">
            <span class="recapCard">
                Total
            </span>
            <span class="recapCardAmount" id="amountTotal"><?=number_format((float)$totalPrice >= $priceMinDelivery ? $totalPrice : $totalPrice + $delivery, 2, '.', '')?>€</span>
        </div>
    </div>
    <div id="buyButtonContainer">
        <form id="formCheckout" action="createPayment" method="POST">
            <input type="button" id="buyButton" value="Passer la commande">
        </form>
    </div>   
    <?php
    }else{ ?>
    </div>
    <div id="containerEmptyBag">
        <span id="titleEmptyBag">Votre panier est vide</span>
        <input id="favoriteButton" type="button" value="Voir les articles sauvegardés" onclick="checkConnexion('favorite')">
        <input id="homeButton" type="button" value="Continuer mon shopping" onclick="window.location = '/'">
    </div>
    <?php } ?>
</section>
        
<?php 
require('assets/template/footer.php');
}else{
    header('Location: login.php');
    exit;
}