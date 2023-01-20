<?php
session_start();
define('BASEPATH', true);
require_once 'assets/constante.php';
require 'assets/mollie/vendor/autoload.php';
try {
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("test_VTkeEsTweDwHhE2MV6bK8asqEPm99U");
    $orderId = time();
    $street = htmlspecialchars($_POST['street']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $city = htmlspecialchars($_POST['city']);
    $reductionPrice = number_format((float)htmlspecialchars($_POST['reductionPrice']), 2, '.', '');
    $portDeliveryPrice = number_format((float)htmlspecialchars($_POST['portDeliveryPrice']), 2, '.', '');
    $priceTotal = number_format((float)htmlspecialchars($_POST['priceTotal']), 2, '.', '');

    $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
    $hostname = $_SERVER['HTTP_HOST'];

    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => "{$priceTotal}",
        ],
        "description" => "Commande #{$orderId}",
        "redirectUrl" => "{$protocol}://{$hostname}/orderDetail.php?orderId={$orderId}",
        "webhookUrl" => "{$protocol}://{$hostname}/webhook.php",
        "metadata" => [
            "order_id" => $orderId,
            "idClient" => "{$_SESSION['idClient']}",
            "email" => "{$_SESSION['email']}",
            "price" => "{$priceTotal}",
            "reduction" => "{$reductionPrice}",
            "portDelivery" => "{$portDeliveryPrice}",
            "firstName" => "{$_SESSION['firstName']}",
            "lastName" => "{$_SESSION['lastName']}",
            "postalCode" => "{$postalCode}",
            "city" => "{$city}",
            "street" => "{$street}",
        ],
    ]);

    //? Create order
    $query = $PDO->prepare("INSERT INTO orders (idOrder, idClient, orderStatus, price, reductionPrice, portDeliveryPrice) VALUES (:idOrder,:idClient,:orderStatus,:price, :reductionPrice,:portDeliveryPrice)");
    $query->bindValue(':idOrder', $orderId);
    $query->bindValue(':idClient', $_SESSION['idClient']);
    $query->bindValue(':orderStatus', $payment->status);
    $query->bindValue(':price', $priceTotal);
    $query->bindValue(':reductionPrice', $reductionPrice);
    $query->bindValue(':portDeliveryPrice', $portDeliveryPrice);
    $query->execute();

    //? Insert order line & remove the stock
    for($i = 0; $i < htmlspecialchars($_POST['countArticles']); $i++){
        $query = $PDO->prepare("INSERT INTO orderarticle (idClient, idArticle, idOrder, quantity, size) VALUES (:idClient,:idArticle,:idOrder,:quantity,:size)");
        $query->bindValue(':idClient', $_SESSION['idClient']);
        $query->bindValue(':idArticle', htmlspecialchars($_POST['idArticle'.$i]));
        $query->bindValue(':idOrder', $orderId);
        $query->bindValue(':quantity', (htmlspecialchars($_POST['quantity'.$i])));
        $query->bindValue(':size', (htmlspecialchars($_POST['size'.$i])));
        $query->execute();

        // $query3 = $PDO->prepare("UPDATE article SET stockCL = :stock WHERE idArticle = :idArticle");
        // $query3->bindValue(':stock', (htmlspecialchars($_POST['quantity'.$i]) - htmlspecialchars($_POST['stock'])));
        // $query3->bindValue(':idArticle', htmlspecialchars($_POST['idArticle'.$i]));
        // $query3->execute();
    }   

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}