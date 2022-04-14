<?php
session_start();
include 'ecommerceManager.php';
$gestion = new EcommerceManager ;


$gestion->delete($_GET["id"]);
header('location:panier1.php');