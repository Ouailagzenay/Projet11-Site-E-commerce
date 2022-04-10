<?php
    include 'ecommerce.php';
 

    class EcommerceManager {

        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'root', '', 'ecommerce');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
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
        public function getAllProduits(){
            
            $sqlGetData = 'SELECT p.idProduit , p.NomProduit, p.DescriptionsDeProduit ,p.Prix , c.Nom  FROM produits p , categorie c  WHERE p.id_category = c.id_categorie'   ;
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $ProduitsList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $Produits = array();
            foreach($ProduitsList as $Produit_list){
                $Produit = new Ecommerce();
                $Produit->setIdProduit($Produit_list['idProduit']);
                $Produit->setNomProduit($Produit_list['NomProduit']);
                $Produit->setDescriptionProduit($Produit_list['DescriptionsDeProduit']);
                $Produit->setPrix($Produit_list['Prix']);
                $Produit->setNomCategory($Produit_list['Nom']);


                array_push($Produits, $Produit);
            }

            return $Produits;
        }
        
        public function getProduit($id){
            $sqlGetQuery = "SELECT * FROM produits WHERE idProduit= $id";
            // get result
            $result = mysqli_query($this->getConnection(), $sqlGetQuery);
            // fetch to array
            $produit_data = mysqli_fetch_assoc($result);

            $produit = new Ecommerce();
            $produit->setIdProduit($produit_data['idProduit']);
            $produit->setNomProduit($produit_data['NomProduit']);
            $produit->setDescriptionProduit($produit_data['DescriptionsDeProduit']);
            $produit->setPrix($produit_data['Prix']);
           
            return $produit;
        }
        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM produits WHERE idProduit =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $TableData = array();
            foreach ($produits_data as $value) {
                $produit = new Ecommerce();
                $produit->setIdProduit($value['idProduit']);
                $produit->setNomProduit($value['NomProduit']);
                $produit->setPrix($value['Prix']);
                $produit->setDescriptionProduit($value['DescriptionsDeProduit']);

               
                array_push($TableData, $produit);
            }
              return $TableData;
        }
        
       //supprimer session
       public function delete($id){
        if(isset($_SESSION["paniers"]["produits"][$id])){
            unset($_SESSION["paniers"]["produits"][$id]);
        }
    }
        
    }
?>