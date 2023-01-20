<?php
session_start();
define('BASEPATH', true);
$title = 'Détail Commande #'.$_GET['orderId'];
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
$query = $PDO->prepare('SELECT o.*, a.*, o.price as priceTotal FROM orders o INNER JOIN orderarticle a ON o.idOrder = a.idOrder WHERE o.idOrder = :orderId');
// $query = $PDO->prepare('SELECT * FROM orders WHERE idOrder = :orderId');
$query->bindValue(":orderId", $_GET["orderId"]);
$query->execute();
if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $price = $row['priceTotal'];
        $dateOrder = $row['dateOrder'];
        $reduction = $row['reductionPrice'];
        $portDelivery =  $row['portDeliveryPrice'];
        $idInvoice = $row['idInvoice'];
        $orderSafe = $row['orderSafe'];
        $progress = $row['progress'];
    }
    if($orderSafe != 1){
        echo '<script>window.location.replace("/bag.php")</script>';
    }

?>
<section id="legalPage">
    <h2 class="titlePage">
        Détail Commande
    </h2>
    <div class="categoryProfileContainer">
        <div class="categoryFirstBlock">
            <div class="svgContainer">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.54901 3.9185C8.83623 4.08433 8.93464 4.45159 8.76881 4.73881C8.60299 5.02603 8.23573 5.12443 7.94851 4.95861C7.66129 4.79278 7.56288 4.42552 7.72871 4.1383C7.89453 3.85109 8.2618 3.75268 8.54901 3.9185Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M3.27132 0.6859C2.61688 1.31396 -1.82839 7.89606 0.850944 10.5061C1.68267 11.3163 5.59762 13.5383 6.69833 13.8826C10.28 15.0029 13.8066 7.75914 13.9915 6.87611C14.1328 6.20127 12.4772 2.96908 11.4629 1.12688C11.0843 0.439133 10.305 -0.0288956 9.51382 0.00138824C7.44001 0.0807688 3.74922 0.227251 3.27132 0.6859ZM9.13235 2.90814C9.97757 3.39613 10.2672 4.47692 9.77918 5.32214C9.29119 6.16737 8.2104 6.45696 7.36517 5.96897C6.51995 5.48098 6.23035 4.4002 6.71834 3.55497C7.20634 2.70974 8.28712 2.42015 9.13235 2.90814ZM3.55754 7.85169C3.2758 7.68903 2.91554 7.78556 2.75288 8.0673C2.59021 8.34905 2.68674 8.70931 2.96849 8.87197L7.0505 11.2287C7.33224 11.3914 7.69251 11.2949 7.85517 11.0131C8.01783 10.7314 7.9213 10.3711 7.63956 10.2084L3.55754 7.85169Z" fill="black"/></svg>
            </div>
            <span class="titleCategory"><span id="descCategory">N° de commande :</span>&nbsp;<?=$_GET['orderId']?></span>
        </div>
    </div>
    <div class="categoryProfileContainer">
        <div class="categoryFirstBlock">
            <div class="svgContainer">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.75 0.579882C8.75 0.259622 9.01117 0 9.33333 0C9.6555 0 9.91667 0.259622 9.91667 0.579882V2.89941C9.91667 3.21967 9.6555 3.47929 9.33333 3.47929C9.01117 3.47929 8.75 3.21967 8.75 2.89941V0.579882Z" fill="black"/><path d="M8.16667 1.17974C7.80007 1.16602 7.41158 1.15976 7 1.15976C6.58842 1.15976 6.19993 1.16602 5.83333 1.17974V2.89941C5.83333 3.53993 5.311 4.05917 4.66667 4.05917C4.02233 4.05917 3.5 3.53993 3.5 2.89941V1.43558C1.45384 1.88039 0.529342 2.94117 0.179702 5.16148C0.126267 5.50081 0.398079 5.79882 0.743583 5.79882H13.2564C13.6019 5.79882 13.8737 5.50081 13.8203 5.16149C13.4707 2.94117 12.5462 1.88039 10.5 1.43558V2.89941C10.5 3.53993 9.97767 4.05917 9.33333 4.05917C8.689 4.05917 8.16667 3.53993 8.16667 2.89941V1.17974Z" fill="black"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7 15.0769C1.2355 15.0769 0 13.8487 0 8.11834C0 7.91205 0.00160111 7.7116 0.00495698 7.51683C0.010328 7.2051 0.268258 6.95858 0.581889 6.95858H13.4181C13.7317 6.95858 13.9897 7.2051 13.995 7.51683C13.9984 7.7116 14 7.91205 14 8.11834C14 13.8487 12.7645 15.0769 7 15.0769ZM2.91667 9.27811C2.91667 8.95785 3.17783 8.69822 3.5 8.69822H5.25C5.57217 8.69822 5.83333 8.95785 5.83333 9.27811C5.83333 9.59837 5.57217 9.85799 5.25 9.85799H3.5C3.17783 9.85799 2.91667 9.59837 2.91667 9.27811ZM3.5 11.0178C3.17783 11.0178 2.91667 11.2774 2.91667 11.5976C2.91667 11.9179 3.17783 12.1775 3.5 12.1775H5.25C5.57217 12.1775 5.83333 11.9179 5.83333 11.5976C5.83333 11.2774 5.57217 11.0178 5.25 11.0178H3.5ZM10.4317 8.87055C10.6595 8.64409 11.0289 8.64409 11.2567 8.87055C11.4845 9.097 11.4845 9.46416 11.2567 9.69062L8.90221 12.0312C8.78213 12.1505 8.62274 12.207 8.46548 12.2005C8.32167 12.1966 8.17905 12.14 8.0693 12.0309L7.24434 11.2108C7.01653 10.9844 7.01653 10.6172 7.24434 10.3908C7.47215 10.1643 7.84149 10.1643 8.0693 10.3908L8.48589 10.8049L10.4317 8.87055Z" fill="black"/><path d="M4.08333 0.579882C4.08333 0.259622 4.3445 0 4.66667 0C4.98883 0 5.25 0.259622 5.25 0.579882V2.89941C5.25 3.21967 4.98883 3.47929 4.66667 3.47929C4.3445 3.47929 4.08333 3.21967 4.08333 2.89941V0.579882Z" fill="black"/></svg>
            </div>
            <span class="titleCategory"><span id="descCategory">Date de commande :</span>&nbsp;<?=date('d M. Y', strtotime($dateOrder))?></span>
        </div>
    </div>
    <hr style="margin: 30px 0 24px 0;">
    <h4 class="categoryOrderDetailTitle">
        Détail Livraison
    </h4>
    <div class="categoryOrderDetailDescContainer">
        <p>
            Statut<br/>
            Livraison estimée
        </p>
        <p>
            <?=$progress == 0 ? 'En préparation' : ($progress == 1 ? 'Expédié' : ($progress == 2 ? 'Livrée' : ($progress == 3 ? 'Abandonnée' : 'Indisponible')))?><br/>
            <?=date('d M. Y', strtotime($dateOrder) + (24 * 3600 * 15));?>
        </p>
    </div>
    <hr style="margin: 30px 0 24px 0;">
    <h4 class="categoryOrderDetailTitle">
        Total Commande
    </h4>
    <div class="categoryOrderDetailDescContainer">
        <p>
            Sous Total<br/>
            Expedition<br/>
            <?=$reduction != 0 ? 'Réduction<br/>' : null; ?>
            <span class="miBoldText">Total</span>
        </p>
        <p>
            <?=number_format((float)($portDelivery > 0 ? $price - $portDelivery : $price), 2, '.', '')?>€<br/>
            <?=number_format((float)$portDelivery, 2, '.', '')?>€<br/>
            <?=$reduction != 0 ? number_format((float)$reduction, 2, '.', '').'€<br/>' : null; ?>
            <span class="boldText"><?=number_format((float)($price), 2, '.', '') < 0 ? 0 : number_format((float)$price, 2, '.', '')?>€</span>
        </p>
    </div>
    <hr style="margin: 30px 0 24px 0;">
    <h4 class="categoryOrderDetailTitle">
        Articles
    </h4>
    <div id="orderArticles">
        <?php
        $query = $PDO->prepare('SELECT a.*, o.* FROM article a INNER JOIN orderarticle o ON a.idArticle = o.idArticle WHERE o.idOrder = :orderId');
        $query->bindValue(":orderId", $_GET["orderId"]);
        $query->execute();
        if($query->rowCount() > 0){
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {?>
                        <div class="articleContainer">
                                <div>
                                        <img onclick="window.location='article?id=<?=$row['idArticle']?>'" src="assets/img/<?=$row["nom"]?>/img1.jpg" alt="<?=$row['altOne']?>">
                                        <div id="infoArticleContainer">
                                                <div id="infoArticle" onclick="window.location='article?id=<?=$row['idArticle']?>'">
                                                        <span class="pricePresentation"><?= number_format((float)$row['price']*$row['quantity'], 2, '.', '').'€';?></span>
                                                        <span class="namePresentation"><?=$row['nom'].' '.($row['size'] == 'CL' ? '33 Cl' : $row['size']) ?></span>
                                                </div>
                                                <span class="namePresentation">Qté. <?=$row['quantity']?></span>
                                        </div>
                                        
                                </div>
                        </div>
                <?php }
        }?>
    </div>
    <?php if (file_exists('assets/invoice/'.$idClient) && isset($idInvoice)) { ?>
        <div id="buyButtonContainer">
            <a href="assets/invoice/<?=$_SESSION['idClient']?>/FAC-<?=$idInvoice?>" download="Facture"><input type="button" value="Télécharger la facture" id="buttonDisconect"></a>
        </div>
    <?php } ?>
</section>

<?php } 
require('assets/template/footer.php'); ?>