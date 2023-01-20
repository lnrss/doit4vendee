<?php
session_start();
define('BASEPATH', true);
$title = 'Backoffice';
require('assets/template/header.php');
require('assets/template/head.php');
require('assets/constante.php');
?>
<section style="padding: 100px 20px 30px 20px;">
    <form action="backoffice.php" method="POST">
        <fieldset>
            <legend>Gestion commande</legend>
            <label for="searchOrder">ID Commande</label><br>
            <input type="text" id="searchOrder" name="searchOrder">
            <input type="submit" id="searchButton" value="Chercher"><br>
            <?php if($_POST['searchOrder']){
                echo 'ID Commande : '.$_POST['searchOrder'].'<br>
                Statut de la commande : En préparation<br>
                Etat du paiement : <span style="color:green">Payé</span><br>
                Changer le statut de la commande :
                <input type="button" value="En traitement" onclick="orderManagement(0, \''.$_POST['searchOrder'].'\', \''.$_SESSION['email'].'\')">
                <input type="button" value="Expédié" onclick="orderManagement(1, \''.$_POST['searchOrder'].'\', \''.$_SESSION['email'].'\', \''.$_SESSION['firstName'].'\')">
                <input type="button" value="Abandonner" onclick="orderManagement(3, \''.$_POST['searchOrder'].'\', \''.$_SESSION['email'].'\')">
                <input type="button" value="Finalisé" onclick="orderManagement(2, \''.$_POST['searchOrder'].'\', \''.$_SESSION['email'].'\')">';
            } ?>
        </fieldset>
    </form>
    <form action="backOffice.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Ajout d'un article</legend>

            <label for="nameArticle">Nom</label><br/>
            <input type="text" id="nameArticle" name="nameArticle">
            <br/><br/>

            <label for="descArticle">Description</label><br/>
            <input type="text" id="descArticle" name="descArticle">
            <br/><br/>

            <label for="">Public visé</label><br/>
            <input type="radio" name="userRadio" id="userRadioMen" value="Homme" checked>
            <label for="userRadioMen">Homme</label>
            <input type="radio" name="userRadio" id="userRadioWomen" value="Femme">
            <label for="userRadioWomen">Femme</label>
            <input type="radio" name="userRadio" id="userRadioMixte" value="Mixte">
            <label for="userRadioMixte">Mixte</label>
            <input type="radio" name="userRadio" id="userRadioUnisexe" value="Unisexe">
            <label for="userRadioUnisexe">Unisexe</label>
            <input type="radio" name="userRadio" id="userRadioDivers" value="Divers">
            <label for="userRadioDivers">Divers</label>
            <br/><br/>
            
            <label for="priceArticle">Prix</label><br/>
            <input type="text" id="priceArticle" name="priceArticle">
            <br/><br/>

            <label for="">Taille disponible</label><br/>
            <!-- <input type="checkbox" name="sizes[]" value="xs">XS
            <input type="checkbox" name="sizes[]" value="s">S
            <input type="checkbox" name="sizes[]" value="m">M
            <input type="checkbox" name="sizes[]" value="l">L
            <input type="checkbox" name="sizes[]" value="xl">XL
            <input type="checkbox" name="sizes[]" value="c">25cl
            <input type="checkbox" name="sizes[]" value="u">Uni -->
            <label for="">XS</label>
            <input type="number" name="stockXS"><br/>
            <label for="">S</label>
            <input type="number" name="stockS"><br/>
            <label for="">M</label>
            <input type="number" name="stockM"><br/>
            <label for="">L</label>
            <input type="number" name="stockL"><br/>
            <label for="">XL</label>
            <input type="number" name="stockXL"><br/>
            <label for="">25 Cl</label>
            <input type="number" name="stockCL"><br/>
            <label for="">Uni</label>
            <input type="number" name="stockUNI">
            <br/><br/>

            <label for="">Taille sélectionné</label><br/>
            <input type="radio" name="sizeSelected" id="sizeSelectedXs" value="xs" checked>
            <label for="sizeSelectedXs">XS</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedS" value="s">
            <label for="sizeSelectedS">S</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedM" value="m">
            <label for="sizeSelectedM">M</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedL" value="l">
            <label for="sizeSelectedL">L</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedXL" value="xl">
            <label for="sizeSelectedXL">XL</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedCl" value="cl">
            <label for="sizeSelectedCl">25cl</label>
            <input type="radio" name="sizeSelected" id="sizeSelectedUnisexe" value="uni">
            <label for="sizeSelectedUnisexe">Uni</label>
            <br/><br/>

            <label for="">Filtre accueil</label><br/>
            <input type="radio" name="mixFilter" id="mixFilterOne" value="mixFilterOne" checked>
            <label for="mixFilterXs">Aucun</label>
            <input type="radio" name="mixFilter" id="mixFilterTwo" value="mixFilterTwo">
            <label for="mixFilterS">Promotion</label>
            <input type="radio" name="mixFilter" id="mixFilterThree" value="mixFilterThree">
            <label for="mixFilterM">Editions limités</label>
            <input type="radio" name="mixFilter" id="mixFilterFour" value="mixFilterFour">
            <label for="mixFilterL">Tendances</label>
            <input type="radio" name="mixFilter" id="mixFilterFive" value="mixFilterFive">
            <label for="mixFilterL">Offre</label>
            <br/><br/>

            <label for="">Image N°1</label><br/>
            <input type="file" name="image1"><br/>
            <br/><br/>

            <label for="">Image N°2</label><br/>
            <input type="file" name="image2"><br/>
            <br/><br/>

            <label for="">Image N°3</label><br/>
            <input type="file" name="image3"><br/>
            <br/><br/>

            <label for="">Image N°4</label><br/>
            <input type="file" name="image4"><br/>
            <br/><br/>

            <input type="submit" value="Ajouter" name="submit">
        </fieldset>
    </form>
</section>
        
<?php
if(isset($_POST['nameArticle'])){
    //? Image to assets/img
    for($i=1; $i<5;$i++){
        if(!empty($_FILES["image".$i]["name"])) { 
            $fileName = basename($_FILES["image".$i]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $allowTypes = array('png'); 
            if(in_array($fileType, $allowTypes)){ 
                $nameArticle = $_POST["nameArticle"];
                if(!file_exists("assets\\img\\".$nameArticle)){
                    mkdir("assets\\img\\".$nameArticle, 0777, true);
                }
                $target = 'assets/img/'.$nameArticle.'/img'.$i.'.'.$fileType;
                move_uploaded_file($_FILES["image".$i]['tmp_name'], $target);
                echo 'Image ajoutée<br/>';
            }else{ 
                echo 'Le format de l\'image n\'est pas en png.<br/>'; 
            } 
        }else{ 
            echo 'Sélectionnez une image à upload.<br/>'; 
        } 
    }

    /*? Sizes Available
    $sizesArray = array("xs","s","m","l","xl", "c", "u");
    $sizes = isset($_POST['sizes']) ? $_POST['sizes'] : [];
    $sizesAvailable = "";

    foreach($sizesArray as $val){
        if(in_array($val, $sizes)){
         $sizesAvailable .= $val;
        } else {
         $sizesAvailable .= "x";
        }
    } */

    //? Initialisation 
    // $sizesAvailable = implode(' ',str_split($sizesAvailable));
    $nameArticle = $_POST['nameArticle'];
    $descArticle = $_POST['descArticle'];
    $userRadio = $_POST['userRadio'];
    $priceArticle = $_POST['priceArticle'];
    $sizeSelected = $_POST['sizeSelected'];
    $mixFilter = $_POST['mixFilter'];
    $stockXS = $_POST['stockXS'] != '' ? $_POST['stockXS'] : null;
    $stockS = $_POST['stockS'] != '' ? $_POST['stockS'] : null;
    $stockM = $_POST['stockM'] != '' ? $_POST['stockM'] : null;
    $stockL = $_POST['stockL'] != '' ? $_POST['stockL'] : null;
    $stockXL = $_POST['stockXL'] != '' ? $_POST['stockXL'] : null;
    $stockCL = $_POST['stockCL'] != '' ? $_POST['stockCL'] : null;
    $stockUNI = $_POST['stockUNI'] != '' ? $_POST['stockUNI'] : null;

    echo 'Nom de l\'article : ' . $nameArticle . '<br/>Description de l\'article : ' . $descArticle . '<br/>Utilisateur : ' . $userRadio . '<br/>Prix de l\'article : ' . $priceArticle . '<br/>Taille sélectionnée : ' . $sizeSelected . '<br/>Mixfilter : ' . $mixFilter . '<br/>Stock XS : ' . $stockXS;

    $query= $PDO->prepare("INSERT INTO article (nom, user, description, price, sizeSelected, mixFilter, stockXS, stockS, stockM, stockL, stockXL, stockCL, stockUNI) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    try{
        $query->execute([$nameArticle, $userRadio, $descArticle, $priceArticle, $sizeSelected, $mixFilter, $stockXS, $stockS, $stockM, $stockL, $stockXL, $stockCL, $stockUNI]);
    } catch (Exception $e) {
        die("<br/>Error : " . $e);
    }   
}
require('assets/template/footer.php');