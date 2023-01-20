 <?php
session_start();
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Boutique officielle';
$pageDescription = 'Découvrez une marque unique en lien avec la Vendée. Choisissez parmi des articles riches et variés pour tous les goûts !.';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
$favArray = [];
$query = $PDO->prepare('SELECT a.*, f.* FROM article a INNER JOIN favorite f ON a.idArticle = f.idArticle WHERE f.idClient = :idClient');
$query->bindValue(':idClient', $_SESSION['idClient']);        
$query->execute();
if($query->rowCount() > 0){
        while($row2 = $query->fetch(PDO::FETCH_ASSOC)) {
                $favArray[$row2['idArticle']] = $row2['idFavorite'];
        }
}
?>
<section id="homePage">
        <div id="filterContainer">
                <span class="filter filterActive" data-filter="all">Tous nos produits</span>
                <span class="filter" data-filter=".mixFilterOne">Tendances</span>
                <span class="filter" data-filter=".mixFilterTwo">Editions limités</span>
                <span class="filter" data-filter=".mixFilterThree">Nouveautés</span>
                <span class="filter" data-filter=".mixFilterFour">Promotions</span>
        </div>
        <div id="presentationContainer">
                <?php
                $query = $PDO->prepare('SELECT * FROM article');
                $query->execute();
                if($query->rowCount() > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {?>
                                <div class="articleContainer mix <?=$row['mixFilter']?>">
                                        <div>
                                                <img onclick="window.location='article?id=<?=$row['idArticle']?>'" src="assets/img/<?=$row["nom"]?>/img1.jpg" alt="<?=$row['altOne']?>">
                                                <div id="infoArticleContainer">
                                                        <div id="infoArticle" onclick="window.location='article?id=<?=$row['idArticle']?>'">
                                                        <?php if(!$row['stockXS'] > 0 && !$row['stockS'] > 0 && !$row['stockM'] > 0 && !$row['stockL'] > 0 && !$row['stockXL'] > 0 && !$row['stockCL'] > 0 && !$row['stockUNI'] > 0){ ?>
                                                                <span style="font-size:11px">Out stock</span>
                                                        <?php } else { ?>
                                                                <div class="<?php if(isset($row['priceReduction'])){echo 'reductionActive';}else{echo 'reductionInactive';} ?>">
                                                                        <span class="pricePresentation"><?php echo number_format((float)$row['price'], 2, '.', '').'€';?></span>
                                                                        <span class="pricePresentation"><?php echo number_format((float)$row['priceReduction'], 2, '.', '').'€';?></span>
                                                                </div>
                                                        <?php } ?>
                                                                <span class="namePresentation"><?=$row['nom']?></span>
                                                        </div>
                                                        <svg onclick="favoriteSetting(this, 1, <?=$row['idArticle']?>, <?=$_SESSION['idClient']?>);" width="12" height="10" viewBox="0 0 12 10" fill="<?= isset($favArray[$row['idArticle']]) ? "var(--red-color)" : "none";?>" xmlns="http://www.w3.org/2000/svg"><path d="M3.8 0.5C4.64519 0.5 5.41617 0.920709 6 1.4C6.58383 0.920709 7.35481 0.5 8.2 0.5C10.0225 0.5 11.5 1.85525 11.5 3.52693C11.5 6.8975 7.66371 8.86052 6.39903 9.41607C6.14429 9.52798 5.85571 9.52798 5.60097 9.41607C4.33629 8.86049 0.5 6.89742 0.5 3.52685C0.5 1.85517 1.97746 0.5 3.8 0.5Z" stroke="<?= isset($favArray[$row['idArticle']]) ? "var(--red-color)" : "black";?>" stroke-width="0.8"/></svg>
                                                </div>
                                        </div>
                                </div>
                        <?php }
                }?>
        </div>
        <div onclick="checkConnexion('bag.php')" id="buttonShoppingCard" class="buttonDynamic">
                <svg id="iconCard" width="18.75" height="15" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.69194 1.02426C6.93602 0.789945 6.93602 0.410048 6.69194 0.175735C6.44786 -0.0585784 6.05214 -0.0585784 5.80806 0.175735L2.05806 3.77572C1.81398 4.01003 1.81398 4.38993 2.05806 4.62424C2.30214 4.85855 2.69786 4.85855 2.94194 4.62424L6.69194 1.02426Z" fill="var(--text-color)"/><path d="M9.19194 0.175735C8.94786 -0.0585784 8.55214 -0.0585784 8.30806 0.175735C8.06398 0.410048 8.06398 0.789945 8.30806 1.02426L12.0581 4.62424C12.3021 4.85855 12.6979 4.85855 12.9419 4.62424C13.186 4.38993 13.186 4.01003 12.9419 3.77572L9.19194 0.175735Z" fill="var(--text-color)"/><path d="M1.81622 4.74058L1.76347 4.30003H1.31977H0.625C0.536529 4.30003 0.5 4.23622 0.5 4.20003C0.5 4.16385 0.536529 4.10004 0.625 4.10004H1.86686V4.10008L1.8737 4.09999L1.87786 4.09999L1.87786 4.10004H1.88471H13.1153V4.10008L13.1221 4.09999L13.1263 4.09999V4.10004H13.1331H14.375C14.4635 4.10004 14.5 4.16385 14.5 4.20003C14.5 4.23622 14.4635 4.30003 14.375 4.30003H13.6802H13.2365L13.1838 4.74058C13.1149 5.31616 13.0586 5.84344 13.0079 6.32615L13.0079 6.32624L12.988 6.51531L12.988 6.51535C12.9304 7.06559 12.8789 7.55643 12.8225 7.99263C12.6971 8.96128 12.5454 9.68057 12.2335 10.2044C11.9158 10.7383 11.4343 11.0659 10.6753 11.2565C9.92732 11.4442 8.90585 11.5 7.5 11.5C6.09415 11.5 5.07268 11.4442 4.32467 11.2565C3.56572 11.0659 3.08422 10.7383 2.76646 10.2044C2.45463 9.68057 2.30287 8.96128 2.17753 7.99263C2.12108 7.55638 2.06961 7.06548 2.01194 6.51517L2.01194 6.51513L1.99213 6.32623L1.99212 6.32615C1.94141 5.84344 1.88515 5.31616 1.81622 4.74058ZM2.57787 4.30003H2.01546L2.08131 4.85858C2.14312 5.38279 2.19457 5.86549 2.24127 6.31015C2.24128 6.31017 2.24128 6.3102 2.24128 6.31022L2.26094 6.4976L2.26094 6.49764L2.26143 6.50229C2.31891 7.05075 2.37002 7.53839 2.42626 7.97303C2.55186 8.94363 2.70133 9.63145 2.99247 10.1206C3.27694 10.5985 3.69884 10.89 4.39743 11.0654C5.10606 11.2433 6.09377 11.3 7.5 11.3C8.90623 11.3 9.89394 11.2433 10.6026 11.0654C11.3012 10.89 11.7231 10.5985 12.0075 10.1206C12.2987 9.63145 12.4481 8.94363 12.5737 7.97303C12.63 7.53834 12.6811 7.05064 12.7386 6.50209L12.7391 6.49747L12.7391 6.49743L12.7587 6.31022C12.7587 6.3102 12.7587 6.31017 12.7587 6.31014C12.8054 5.86548 12.8569 5.38279 12.9187 4.85858L12.9845 4.30003H12.4221H2.57787Z" fill="var(--text-color)" stroke="var(--text-color)"/></svg>
        </div>
        <div id="vapeBottom"></div>
        <!-- <div id="maintenanceContainer">
                <div id="maintenanceContent">
                        Do it <span id="forContent">4</span> Vendée<br/>
                       <span id="maintenanceDesc">Arrive très vite..</span>
                </div>
        </div>         -->
</section>
        
<?php require('assets/template/footer.php'); ?>