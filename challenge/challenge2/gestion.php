<?php
include "produit.php";

class Gestion {

public $name ;

private $Connection = Null;

private function getConnection(){
  
        $this->Connection = mysqli_connect('localhost', 'root', '', 'e-commerce');
        // $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'e-commerce');
       
     
   
    
    return $this->Connection;
}
 public function afficherlesproduitPopuler(){
    $sqlGetData = "SELECT nom_produit,photo ,productCartQuantity FROM cart_line INNER JOIN produit on produit.id_produit=cart_line.idProduct ORDER BY productCartQuantity DESC, idProduct ASC LIMIT 3";
    $result = mysqli_query($this->getConnection() ,$sqlGetData);
     $ProduitsList = mysqli_fetch_all($result,MYSQLI_ASSOC);

     $Produits = array();
            foreach($ProduitsList as $Produit_list){
                $Produit = new Product();
                $Produit->setName($Produit_list['nom_produit']);
                $Produit->setQuantity($Produit_list['nom_produit']);
                $Produit->setPhoto($Produit_list['photo']);
                


                array_push($Produits, $Produit);
    
 }
 return $Produits;
}

}




