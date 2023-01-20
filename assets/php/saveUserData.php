<?php

session_start();

define('BASEPATH', true);

require_once '../constante.php';

$idClient = htmlspecialchars($_POST['idClient']);
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$password = htmlspecialchars($_POST['password']) != '' ? password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT, ['cost' => 12]) : 'notSet';

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;

if($password != 'notSet'){
    $query = $PDO->prepare("UPDATE users SET firstName=:firstName, lastName=:lastName, password=:password WHERE idClient = :idClient");
    $query->bindValue(':password', $password);
}else{
    $query = $PDO->prepare("UPDATE users SET firstName=:firstName, lastName=:lastName WHERE idClient = :idClient");
}

$query->bindValue(':firstName', $firstName);
$query->bindValue(':lastName', $lastName);
$query->bindValue(':idClient', $_SESSION['idClient']);

if($query->execute()){
    echo 'ok';
}