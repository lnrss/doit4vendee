<?php
session_start();
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Mes favoris';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
?>
<section id="legalPage">
    <h2 class="titlePage">
        Mes favoris
    </h2>
    <div class="gridArticle" style="margin: 12px 0 0 0;">
        <?php
        $query = $PDO->prepare('SELECT a.*, f.* FROM article a INNER JOIN favorite f ON a.idArticle = f.idArticle WHERE f.idClient = :idClient');
        $query->bindValue(':idClient', $_SESSION['idClient']);
        $query->execute();
        if($query->rowCount() > 0){
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {?>
                        <div class="articleContainer">
                                <div>
                                        <img onclick="window.location='article?id=<?=$row['idArticle']?>'" src="assets/img/<?=$row["nom"]?>/img1.jpg" alt="<?=$row['altOne']?>">
                                        <div id="infoArticleContainer">
                                                <div id="infoArticle" onclick="window.location='article?id=<?=$row['idArticle']?>'">
                                                        <span class="pricePresentation"><?php echo number_format((float)$row['price'], 2, '.', '').'€';?></span>
                                                        <span class="namePresentation"><?=$row['nom']?></span>
                                                </div>
                                                <svg onclick="favoriteSetting(this, 1, <?=$row['idArticle']?>, <?=$_SESSION['idClient']?>, 1);" width="12" height="10" viewBox="0 0 12 10" fill="var(--red-color)" xmlns="http://www.w3.org/2000/svg"><path d="M3.8 0.5C4.64519 0.5 5.41617 0.920709 6 1.4C6.58383 0.920709 7.35481 0.5 8.2 0.5C10.0225 0.5 11.5 1.85525 11.5 3.52693C11.5 6.8975 7.66371 8.86052 6.39903 9.41607C6.14429 9.52798 5.85571 9.52798 5.60097 9.41607C4.33629 8.86049 0.5 6.89742 0.5 3.52685C0.5 1.85517 1.97746 0.5 3.8 0.5Z" stroke="none" stroke-width="0.8"/></svg>
                                        </div>
                                        
                                </div>
                        </div>
                <?php }
        }?>
    </div>    
</section>

<?php require('assets/template/footer.php'); ?>