<?php
if(isset($_POST['nameArticle'])){
    //? Image to assets/img
    for($i=1; $i<5;$i++){
        if(!empty($_FILES["image".$i]["name"])) { 
            $fileName = basename($_FILES["image".$i]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $allowTypes = array('png'); 
            if(in_array($fileType, $allowTypes)){ 
                $nameArticle = htmlspecialchars($_POST["nameArticle"]);
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
    $sizes = isset(htmlspecialchars($_POST['sizes'])) ? htmlspecialchars($_POST['sizes']) : [];
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
    $nameArticle = htmlspecialchars($_POST['nameArticle']);
    $descArticle = htmlspecialchars($_POST['descArticle']);
    $userRadio = htmlspecialchars($_POST['userRadio']);
    $priceArticle = htmlspecialchars($_POST['priceArticle']);
    $sizeSelected = htmlspecialchars($_POST['sizeSelected']);
    $mixFilter = htmlspecialchars($_POST['mixFilter']);
    $stockXS = htmlspecialchars($_POST['stockXS']) != '' ? htmlspecialchars($_POST['stockXS']) : null;
    $stockS = htmlspecialchars($_POST['stockS']) != '' ? htmlspecialchars($_POST['stockS']) : null;
    $stockM = htmlspecialchars($_POST['stockM']) != '' ? htmlspecialchars($_POST['stockM']) : null;
    $stockL = htmlspecialchars($_POST['stockL']) != '' ? htmlspecialchars($_POST['stockL']) : null;
    $stockXL = htmlspecialchars($_POST['stockXL']) != '' ? htmlspecialchars($_POST['stockXL']) : null;
    $stockCL = htmlspecialchars($_POST['stockCL']) != '' ? htmlspecialchars($_POST['stockCL']) : null;
    $stockUNI = htmlspecialchars($_POST['stockUNI']) != '' ? htmlspecialchars($_POST['stockUNI']) : null;

    echo 'Nom de l\'article : ' . $nameArticle . '<br/>Description de l\'article : ' . $descArticle . '<br/>Utilisateur : ' . $userRadio . '<br/>Prix de l\'article : ' . $priceArticle . '<br/>Taille sélectionnée : ' . $sizeSelected . '<br/>Mixfilter : ' . $mixFilter . '<br/>Stock XS : ' . $stockXS;

    $query= $PDO->prepare("INSERT INTO article (nom, user, description, price, sizeSelected, mixFilter, stockXS, stockS, stockM, stockL, stockXL, stockCL, stockUNI) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    try{
        $query->execute([$nameArticle, $userRadio, $descArticle, $priceArticle, $sizeSelected, $mixFilter, $stockXS, $stockS, $stockM, $stockL, $stockXL, $stockCL, $stockUNI]);
    } catch (Exception $e) {
        die("<br/>Error : " . $e);
    }   
}