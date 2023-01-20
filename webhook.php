<?php
session_start();
define('BASEPATH', true);
require_once 'assets/constante.php';
require 'assets/mollie/vendor/autoload.php';
try {
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("");
    
    $payment = $mollie->payments->get(htmlspecialchars($_POST["id"]));

    $orderId = $payment->metadata->order_id;
    $email = $payment->metadata->email;
    $firstName = $payment->metadata->firstName;
    $lastName = $payment->metadata->lastName;
    $postalCode = $payment->metadata->postalCode;
    $city = $payment->metadata->city;
    $street = $payment->metadata->street;
    $idClient = $payment->metadata->idClient;
    $price = $payment->metadata->price;
    $reduction = $payment->metadata->reduction;
    $portDelivery = $payment->metadata->portDelivery;
    $idInvoice = rand(10000000, 99999999);
    $dateOrder = date("Y-m-d H:i:s");

    $query = $PDO->prepare("UPDATE orders SET orderStatus = :orderStatus, idTransaction = :idTransaction WHERE idOrder = :idOrder");
    $query->bindValue(':orderStatus', $payment->status);
    $query->bindValue(':idTransaction', $payment->id);
    $query->bindValue(':idOrder', $orderId);
    $query->execute();

    if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
        //? Invoice generation
        include 'assets/pdf/index.php';
        $query = $PDO->prepare("SELECT orderSafe FROM orders WHERE idOrder = :idOrder");
        $query->bindValue(':idOrder', $orderId);
        $query->execute();       
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if($row['orderSafe'] != 1){
            //? Mail success
            include_once 'assets/mail/orderSuccess.php';
            include_once 'assets/mail/orderSuccessDoit4vendee.php';
        }
        //? Update order
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe, idInvoice = :idInvoice WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 1);
        $query->bindValue(':idOrder', $orderId);
        $query->bindValue(':idInvoice', $idInvoice);
        $query->execute();
        //? Delete bag
        $query1 = $PDO->prepare("DELETE FROM bag WHERE idClient = ?");
        $query1->execute([$idClient]);
    } elseif ($payment->isOpen()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 0);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->isPending()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 0);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->isFailed()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 0);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->isExpired()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 0);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->isCanceled()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 0);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->hasRefunds()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 2);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    } elseif ($payment->hasChargebacks()) {
        $query = $PDO->prepare("UPDATE orders SET orderSafe = :orderSafe WHERE idOrder = :idOrder");
        $query->bindValue(':orderSafe', 3);
        $query->bindValue(':idOrder', $orderId);
        $query->execute();
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}