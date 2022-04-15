<?php
    include "../logic/gestionEcommerce.php";
    
        if(isset($_GET['id'])){
            $id = $_GET['id'];
           
            $ecommerceManager = new EcommerceManager();
            $ecommerceManager->deleteCategori($id);
            header('Location: indexCategori.php');   
    }
?>