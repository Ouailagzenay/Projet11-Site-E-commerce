<?php
session_start();
include 'ecommerceManager.php';
$gestionProduit = new EcommerceManager();

$id=$_POST['id'];

$data = $gestionProduit->afficherProduit($id);

foreach($data as $value);

$valeurs = array(
    "nomProduit" => $value->getNomProduit(),
    'prix' => $value->getPrix(),
    'qnt' => $_POST["qnt"] ,
    'idProduit' => $value->getIdProduit(),
    'descriptionsDeProduit' => $value-> getDescriptionProduit(),
);

$gestionProduit->set( $_POST["id"], $valeurs);

header("location: panier1.php");
?>