<?php
session_start();
include 'cartManager.php';
$gestion = new CartManager ;


$gestion->delete($_GET["id"]);
header('location:../panier1.php');