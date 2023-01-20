<?php
session_start();
define('BASEPATH', true);
require('assets/constante.php');
$favArray = [];
$query = $PDO->prepare('SELECT a.*, f.* FROM article a INNER JOIN favorite f ON a.idArticle = f.idArticle WHERE f.idClient = :idClient');
$query->bindValue(':idClient', $_SESSION['idClient']);        
$query->execute();
if($query->rowCount() > 0){
        while($row2 = $query->fetch(PDO::FETCH_ASSOC)) {
                $favArray[$row2['idArticle']] = $row2['idFavorite'];
        }
}
$query = $PDO->prepare('SELECT * FROM article WHERE idArticle = :idArticle');
$query->bindValue(":idArticle", $_GET["id"]);
$query->execute();
$idClient = isset($_SESSION['idClient']) ? ', ' . $_SESSION['idClient'] : '';
if($query->rowCount() > 0){
while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $name =  $row['nom'];
        $user = $row['user'];
        $description = $row['description'];
        $price = $row['price'];
        $sizeSelected = $row['sizeSelected'];
        $stockXS = $row['stockXS'];
        $stockS = $row['stockS'];
        $stockM = $row['stockM'];
        $stockL = $row['stockL'];
        $stockXL = $row['stockXL'];
        $stockCL = $row['stockCL'];
        $stockUNI = $row['stockUNI'];
}
$title = 'Do It 4 Vendée - '.$name;
require('assets/template/header.php');
require('assets/template/head.php');
?>
  <section class="detailArticle">
        <div id="photoArticleGaleryContainer">
                <div class="slidershow">
                        <div class="slides">
                                <input type="radio" name="radioArticle" id="radioArticle1" checked>
                                <input type="radio" name="radioArticle" id="radioArticle2">
                                <input type="radio" name="radioArticle" id="radioArticle3">
                                <input type="radio" name="radioArticle" id="radioArticle4">
                                <input type="radio" name="radioArticle" id="radioArticle5">
                                <div class="slide slide1">
                                <?='<img data-zoom="first" src="assets/img/'.$name.'/img1.jpg" alt="'.$name.'">'?>
                                </div>
                                <div class="slide">
                                <?='<img src="assets/img/'.$name.'/img2.jpg" alt="'.$name.'">'?>
                                </div>
                                <div class="slide">
                                <?='<img src="assets/img/'.$name.'/img3.jpg" alt="'.$name.'">'?>
                                </div>
                                <div class="slide">
                                        <?='<img src="assets/img/'.$name.'/img4.jpg" alt="'.$name.'">'?>
                                </div>
                                <svg class="heartDetail" onclick="favoriteSetting(this, 2, <?=$_GET["id"]?><?=$idClient?>);checkConnexion('')" width="24" height="21" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 7.99645C4.20975 7.74235 3.8817 7.47804 3.53475 7.19685H3.53025C2.30851 6.21069 0.923858 5.09481 0.31231 3.75771C0.111393 3.33202 0.00491705 2.86888 5.13268e-06 2.39928C-0.00133667 1.75494 0.260457 1.13725 0.726222 0.685826C1.19199 0.234403 1.82241 -0.0126519 2.475 0.000499426C3.00629 0.00132781 3.52613 0.152903 3.9726 0.437167C4.16879 0.562867 4.34629 0.714917 4.5 0.888938C4.65457 0.715601 4.83212 0.56364 5.02785 0.437167C5.47413 0.152847 5.99384 0.00126284 6.525 0.000499426C7.17759 -0.0126519 7.80801 0.234403 8.27378 0.685826C8.73954 1.13725 9.00134 1.75494 9 2.39928C8.9954 2.86963 8.88892 3.33356 8.68769 3.75993C8.07614 5.09703 6.69195 6.21246 5.4702 7.19685L5.4657 7.20041C5.1183 7.47982 4.7907 7.74413 4.50045 8L4.5 7.99645Z" fill="<?= isset($favArray[$_GET['id']]) ? "var(--red-color)" : "#fff";?>"/></svg>
                        </div>
                        <div class="navigation">
                                <label for="radioArticle1" onclick="currentSlide(this);switchSlide(1)" style="background: var(--background-color);" id="bar1" class="bar"></label>
                                <label for="radioArticle2" onclick="currentSlide(this);switchSlide(2)" id="bar2" class="bar"></label>
                                <label for="radioArticle3" onclick="currentSlide(this);switchSlide(3)" id="bar3" class="bar"></label>
                                <label for="radioArticle4" onclick="currentSlide(this);switchSlide(4)" id="bar4" class="bar"></label>
                        </div>
                </div>
                <div id="galeryDetailArticle">
                        <?='<div class="photoGaleryDetailArticle" onclick="switchSlide(1)"><div class="layerArticleGalery"></div><img src="assets/img/'.$name.'/img1.jpg" alt="'.$altFour.'"></div>
                        <div class="photoGaleryDetailArticle" onclick="switchSlide(2)"><div class="layerArticleGalery"></div><img src="assets/img/'.$name.'/img2.jpg" alt="'.$altFour.'"></div>
                        <div class="photoGaleryDetailArticle" onclick="switchSlide(3)"><div class="layerArticleGalery"></div><img src="assets/img/'.$name.'/img3.jpg" alt="'.$altFour.'"></div>
                        <div class="photoGaleryDetailArticle" onclick="switchSlide(4)"><div class="layerArticleGalery"></div><img src="assets/img/'.$name.'/img4.jpg" alt="'.$altFour.'"></div>'?>
                </div>
        </div>
        <div class="mainInfoContainer">
                <div class="NameContainer">
                        <h4 class="nameArticle"><?=$name?></h4>
                        <span class="userArticle"><?=$user?></span><br/>
                        <span class="descArticle"><?=$description?></span>
                </div>
                <span class="priceArticle"><span id="priceArticle" class="<?=$price?>"><?=number_format((float)$price, 2, '.', '')?></span>€</span>
        </div>


      <div class="sizeContainer">
        <?php
        if(isset($stockXS)){
                echo '<span onclick="selectSize(this, '.$stockXS.', '.$price.', \'XS\');" class="patternSize"';
                if($sizeSelected == 'xs'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockXS == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>XS</span>';
        }
        if(isset($stockS)){
                echo '<span onclick="selectSize(this, '.$stockS.', '.$price.', \'S\');" class="patternSize"';
                if($sizeSelected == 's'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockS == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>S</span>';
        }
        if(isset($stockM)){
                echo '<span onclick="selectSize(this, '.$stockM.', '.$price.', \'M\');" class="patternSize"';
                if($sizeSelected == 'm'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockM == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>M</span>';
        }
        if(isset($stockL)){
                echo '<span onclick="selectSize(this, '.$stockL.', '.$price.', \'L\');" class="patternSize"';
                if($sizeSelected == 'l'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockL == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>L</span>';
        }
        if(isset($stockXL)){
                echo '<span onclick="selectSize(this, '.$stockXL.', '.$price.', \'XL\');" class="patternSize"';
                if($sizeSelected == 'xl'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockXL == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>XL</span>';
        }
        if(isset($stockCL)){
                echo '<span onclick="selectSize(this, '.$stockCL.', '.$price.', \'CL\');" class="patternSize"';
                if($sizeSelected == 'cl'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockCL == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>33 Cl</span>';
        }
        if(isset($stockUNI)){
                echo '<span onclick="selectSize(this, '.$stockUNI.', '.$price.', \'Uni\');" class="patternSize"';
                if($sizeSelected == 'uni'):
                     echo 'style="border-color:var(--text-color);"';
                elseif($stockUNI == 0):
                    echo 'style="border-color:var(--grey-color); color: var(--grey-color); pointer-events: none; cursor: not-allowed;"';
                endif;  
                echo '>Uni</span>';
        }
        ?>
        </div>
      <div class="productInfoContainer">
              <span class="titleProductInfo">
                      Infos produit
              </span>
              <p class="descProductInfo">
                      Livraison offerte à partir de 50€ d'achat. <br/>
                      <span id="stock"> <?=$stockCL > 0 ? '<span id="quantityStock">'.$stockCL.'</span> en stock' : ($stockUNI > 0 ? '<span id="quantityStock">'.$stockUNI.'</span> en stock' : null)?></span>
              </p>
      </div>
      <?php if(!$stockXS > 0 && !$stockS > 0 && !$stockM > 0 && !$stockL > 0 && !$stockXL > 0 && !$stockCL > 0 && !$stockUNI > 0){}else{ ?>
        <div class="cardProductContainer">
                <div class="selectorQuantity">
                        <span class="minus" onclick="quantitySetting('minus');">-</span>
                        <span id="quantityNumber">1</span>
                        <span class="more" onclick="quantitySetting('more');">+</span>
                </div>
                <div class="addCardContainer">
                        <label for="buttonAddCard"><svg id="iconCard" width="18.75" height="15" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.69194 1.02426C6.93602 0.789945 6.93602 0.410048 6.69194 0.175735C6.44786 -0.0585784 6.05214 -0.0585784 5.80806 0.175735L2.05806 3.77572C1.81398 4.01003 1.81398 4.38993 2.05806 4.62424C2.30214 4.85855 2.69786 4.85855 2.94194 4.62424L6.69194 1.02426Z" fill="var(--text-color)"/><path d="M9.19194 0.175735C8.94786 -0.0585784 8.55214 -0.0585784 8.30806 0.175735C8.06398 0.410048 8.06398 0.789945 8.30806 1.02426L12.0581 4.62424C12.3021 4.85855 12.6979 4.85855 12.9419 4.62424C13.186 4.38993 13.186 4.01003 12.9419 3.77572L9.19194 0.175735Z" fill="var(--text-color)"/><path d="M1.81622 4.74058L1.76347 4.30003H1.31977H0.625C0.536529 4.30003 0.5 4.23622 0.5 4.20003C0.5 4.16385 0.536529 4.10004 0.625 4.10004H1.86686V4.10008L1.8737 4.09999L1.87786 4.09999L1.87786 4.10004H1.88471H13.1153V4.10008L13.1221 4.09999L13.1263 4.09999V4.10004H13.1331H14.375C14.4635 4.10004 14.5 4.16385 14.5 4.20003C14.5 4.23622 14.4635 4.30003 14.375 4.30003H13.6802H13.2365L13.1838 4.74058C13.1149 5.31616 13.0586 5.84344 13.0079 6.32615L13.0079 6.32624L12.988 6.51531L12.988 6.51535C12.9304 7.06559 12.8789 7.55643 12.8225 7.99263C12.6971 8.96128 12.5454 9.68057 12.2335 10.2044C11.9158 10.7383 11.4343 11.0659 10.6753 11.2565C9.92732 11.4442 8.90585 11.5 7.5 11.5C6.09415 11.5 5.07268 11.4442 4.32467 11.2565C3.56572 11.0659 3.08422 10.7383 2.76646 10.2044C2.45463 9.68057 2.30287 8.96128 2.17753 7.99263C2.12108 7.55638 2.06961 7.06548 2.01194 6.51517L2.01194 6.51513L1.99213 6.32623L1.99212 6.32615C1.94141 5.84344 1.88515 5.31616 1.81622 4.74058ZM2.57787 4.30003H2.01546L2.08131 4.85858C2.14312 5.38279 2.19457 5.86549 2.24127 6.31015C2.24128 6.31017 2.24128 6.3102 2.24128 6.31022L2.26094 6.4976L2.26094 6.49764L2.26143 6.50229C2.31891 7.05075 2.37002 7.53839 2.42626 7.97303C2.55186 8.94363 2.70133 9.63145 2.99247 10.1206C3.27694 10.5985 3.69884 10.89 4.39743 11.0654C5.10606 11.2433 6.09377 11.3 7.5 11.3C8.90623 11.3 9.89394 11.2433 10.6026 11.0654C11.3012 10.89 11.7231 10.5985 12.0075 10.1206C12.2987 9.63145 12.4481 8.94363 12.5737 7.97303C12.63 7.53834 12.6811 7.05064 12.7386 6.50209L12.7391 6.49747L12.7391 6.49743L12.7587 6.31022C12.7587 6.3102 12.7587 6.31017 12.7587 6.31014C12.8054 5.86548 12.8569 5.38279 12.9187 4.85858L12.9845 4.30003H12.4221H2.57787Z" fill="var(--text-color)" stroke="var(--text-color)"/><path d="M6.25 6C5.90482 6 5.625 6.26863 5.625 6.6V8.99998C5.625 9.33135 5.90482 9.59998 6.25 9.59998C6.59518 9.59998 6.875 9.33135 6.875 8.99998V6.6C6.875 6.26863 6.59518 6 6.25 6Z" fill="var(--text-color)"/><path d="M8.75 6C8.40482 6 8.125 6.26863 8.125 6.6V8.99998C8.125 9.33135 8.40482 9.59998 8.75 9.59998C9.09518 9.59998 9.375 9.33135 9.375 8.99998V6.6C9.375 6.26863 9.09518 6 8.75 6Z" fill="var(--text-color)"/></svg></label>
                        <input type="button" value="Ajouter au panier" id="buttonAddCard" onclick="addArticleBag('<?=$_SESSION['idClient']?>', '<?=$_GET['id']?>', sizeSelected);">
                </div>
        </div>
      <?php } ?>
      </div>
  </section>

 <?php  
  require('assets/template/footer.php');
}else{
  header('HTTP/1.0 404 Not Found');
  exit;
}