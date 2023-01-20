<?php
session_start();
define('BASEPATH', true);
$title = 'Mes commandes';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
?>
<section id="legalPage">
    <h2 class="titlePage">
        Mes commandes
    </h2>
    <div class="buttonContainer">
        <input type="button" value="En cours" class="optionSelected optionButton" id="prButton" onclick="switchOrder('progress')">
        <input type="button" value="Terminée" class="optionButton" id="fiButton" onclick="switchOrder('finish')">
    </div>
    <hr style="margin: 20px 0 0 0;">
<?php 
$query = $PDO->prepare('SELECT count(orderarticle.idOrder) as sumArticle, orders.*, article.* FROM orderarticle INNER JOIN orders on orderarticle.idOrder = orders.idOrder INNER JOIN article on orderarticle.idArticle = article.idArticle WHERE orders.idClient = :idClient AND orders.orderSafe = 1 GROUP BY orderarticle.idOrder');
$query->bindValue(':idClient', $_SESSION['idClient']);
$query->execute();
if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) { 
?>
    <div class="orderListContainer <?=$row['progress'] == 2 ? 'finish' : 'progress'?>" onclick="window.location.replace('orderDetail?orderId=<?=$row['idOrder']?>')">
        <div class="orderListLeftPart">
            <div class="orderListTitleContainer">
                <span class="orderListId">#<?=$row['idOrder']?></span>
                <span class="orderListTitle"><?=$row['nom']?><br/><?=$row['sumArticle'] > 1 ? '+ '.($row['sumArticle']-1).' articles' : '&nbsp'?></span>
            </div>
            <span class="orderListOrderDate">Commandé le <?=date('d M. Y', strtotime($row['dateOrder']))?></span>
        </div>
        <div class="orderListImgContainer">
            <img src="assets/img/<?=$row['nom']?>/img1" alt="<?=$row['nom']?>">
            <div class="orderListDescImgContainer">
                <span class="orderListDescImg"><?=$row['sumArticle'] > 1 ? '+ '.($row['sumArticle']-1).' Autres' : '1 Article'?></span>
            </div>
        </div>
    </div>
<?php }} ?>
</section>

<?php require('assets/template/footer.php'); ?>