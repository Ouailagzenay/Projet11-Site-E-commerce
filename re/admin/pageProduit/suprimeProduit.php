<?php
    include "../logic/gestionEcommerce.php";
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $ecommerceManager = new EcommerceManager();
            $ecommerceManager->deleteProduit($id);
            header('Location: ../index.php');   
    }
?>