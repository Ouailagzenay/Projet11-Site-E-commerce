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

        public function getAllCategorie(){
            $sqlGetData = 'SELECT id_categorie,Nom, Descriptions FROM categorie ';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $categoriesList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $categories = array();
            foreach($categoriesList as $categorie_list){
                $categorie = new Ecommerce();
                $categorie->setIdCategory($categorie_list['id_categorie']);
                $categorie->setNomCategory($categorie_list['Nom']);
                $categorie->setDescriptionsCategory($categorie_list['Descriptions']);
                array_push($categories, $categorie);
            }

            return $categories;
        }


        public function insertCategorie($categorie){
            $nomCategory = $categorie->getNomCategory();
            $descriptionsCategory = $categorie->getDescriptionsCategory();
            
                 // sql insert query
        $sqlInsertQuery = "INSERT INTO categorie(Nom, Descriptions) 
                            VALUES('$nomCategory', 
                                    '$descriptionsCategory')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
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

        public function insertProduit($produit){
            $Nom = $produit->getNomProduit();
            $Description = $produit->getDescriptionProduit();
            $Prix = $produit->getPrix();
            $id_category = $produit->getIdCategory();
            

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO produits(NomProduit,DescriptionsDeProduit, Prix ,id_category) 
                            VALUES('$Nom', 
                                    '$Description',
                                    '$Prix',
                                    '$id_category')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }



    }