<?php
session_start();
define('BASEPATH', true);
$title = 'Mon carnet d\'adresse';
require('assets/template/header.php');
require('assets/template/head.php');
include('assets/constante.php');
$query = $PDO->prepare('SELECT * FROM address WHERE idClient = :idClient');
$query->bindValue(":idClient", $_SESSION['idClient']);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
$address = $row['street'];
$addressSup = $row['addressSup'];
$city = $row['city'];
$postalCode =  $row['postalCode'];
$update = $row['postalCode'] > 0 ? 1 : 0;
if(isset($_POST['submit'])){
    try{
        $address = htmlspecialchars($_POST['address']);
        $addressSup = htmlspecialchars($_POST['addressSup']);
        $city = htmlspecialchars($_POST['city']);
        $postalCode = htmlspecialchars($_POST['postalCode']);
        $query = $update == 1 ? $PDO->prepare("UPDATE address SET street = :street, city = :city, addressSup = :addressSup, postalCode = :postalCode WHERE idClient = :idClient") : $PDO->prepare("INSERT INTO address (idClient, street, city, addressSup, postalCode) VALUES (:idClient,:street,:city,:addressSup,:postalCode)");
        $query->bindValue(':idClient', $_SESSION['idClient']);
        $query->bindValue(':street', $address);
        $query->bindValue(':city', $city);
        $query->bindValue(':addressSup', $addressSup);
        $query->bindValue(':postalCode', $postalCode);
        if($query->execute()){
            if(htmlspecialchars($_POST['bag'])){
                echo '<script>window.location.replace("/bag")</script>';
            }
        }
    }catch(PDOException $e){
        echo '<script>errorModal("error", "Oops...", "'.$e->getMessage().'", "Ok", "");</script>';
    }
}
?>
<section id="legalPage">
    <h2 class="titlePage">
        Mon carnet d'adresse
    </h2>
    <?=$_GET['b']?'<span style="color: #D10000;font-style: italic;">Saisissez vos informations de livraison afin de procéder au paiement</span>':null?>
    <form method="POST" action="addressBook.php" <?=$_GET['b']?'style="margin-top: 14px"':null?>>
        <input type="hidden" name="bag" value="<?=htmlspecialchars($_GET['b']);?>">
        <div class="inputModuleContainer">
            <span class="titleInputModule">Adresse *</span><br/>
            <input name="address" id="address" type="text" class="inputModule" required value="<?=$address?>">
        </div>
        <div class="inputModuleContainer">
            <span class="titleInputModule">Complément d'adresse</span><br/>
            <input name="addressSup" id="addressSup" type="text" class="inputModule" value="<?=$addressSup?>">
        </div>
        <div class="inputModuleContainer">
            <span class="titleInputModule">Ville *</span><br/>
            <input name="city" id="city" type="text" class="inputModule" required value="<?=$city?>">
        </div>
        <div class="inputModuleContainer">
            <span class="titleInputModule">Code Postal *</span><br/>
            <input name="postalCode" id="postalCode" type="tel" class="inputModule" maxlength="5" minlength="5" required value="<?=$postalCode?>">
        </div>
        <div class="userDataButton" id="buyButtonContainer">
            <input type="button" value="Retour" class="buttonBottom" onclick="history.go(-1)">
                <input name="submit" type="submit" value="Enregistrer" class="buttonBottom">
        </div>
        <div>
    </form>
</section>

<script>
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
            });
        });
    }

    setInputFilter(document.getElementById("postalCode"), function(value) {
        return /^\d*?\d*$/.test(value);
    });
</script>

<?php require('assets/template/footer.php'); ?>