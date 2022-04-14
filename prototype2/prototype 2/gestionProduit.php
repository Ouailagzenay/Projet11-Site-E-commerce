<?php
include "produit.php";




class GestionProduit {

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'Panier');
           
        return $this->Connection;
    }

    // pour ajouter session
    public function set($key,$value){
        $_SESSION["paniers"]["produits"][$key] = $value ;

    }

      // afficher session

      public function getPanier(){
        if(isset($_SESSION["paniers"]["produits"])){
            return $_SESSION["paniers"]["produits"];
            return array();
        }
    }

// afficher  les produits : page index
    public function afficher(){
        $SelctRow = 'SELECT *  FROM produits';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $produit = new Produit();
            $produit->setId($value_Data['id']);
            $produit->setNom($value_Data['Nom']);
            $produit->setPrix($value_Data['Prix']);
           
            array_push($TableData, $produit);
        }
          return $TableData;
 
        }
      
// afficher  les produits : page panier

        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM produits WHERE id =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $TableData = array();
            foreach ($produits_data as $value) {
                $produit = new Produit();
                $produit->setId($value['id']);
                $produit->setNom($value['Nom']);
                $produit->setPrix($value['Prix']);
               
                array_push($TableData, $produit);
            }
              return $TableData;
        }
      
 


    }
