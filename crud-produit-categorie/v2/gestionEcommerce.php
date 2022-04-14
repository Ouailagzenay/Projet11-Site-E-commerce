<?php
    include 'ecommerce.php';
 

    class EcommerceManager {

        private $Connection = null;

        private function getConnection(){
            if(is_null($this->Connection)){
                $this->Connection = mysqli_connect('localhost', 'root', '', 'e-commerce');

                if(!$this->Connection){
                    $message = 'Connection Error: ' .mysqli_connect_error();
                    throw new Exception($message);
                }
            }
            return $this->Connection;
        }

        public function getAllCategorie(){
            $sqlGetData = 'SELECT id_category ,nom_categorie FROM categorie ';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $categoriesList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $categories = array();
            foreach($categoriesList as $categorie_list){
                $categorie = new Ecommerce();
                $categorie->setIdCategory($categorie_list['id_category']);
                $categorie->setNomCategory($categorie_list['nom_categorie']);
                array_push($categories, $categorie);
            }

            return $categories;
        }


        public function insertCategorie($categorie){
            $nomCategory = $categorie->getNomCategory();
            $descriptionsCategory = $categorie->getDescriptionsCategory();
            
                 // sql insert query
        $sqlInsertQuery = "INSERT INTO categorie(nom_categorie) 
                            VALUES('$nomCategory', 
                                    '$descriptionsCategory')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }

        public function getAllProduits(){
            
            $sqlGetData = 'SELECT p.id_produit , p.nom_produit,p.descriptions ,p.photo ,p.prix,p.quantite_stock , c.nom_categorie  FROM produit p , categorie c  WHERE p.id_category = c.id_category'   ;
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $ProduitsList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $Produits = array();
            foreach($ProduitsList as $Produit_list){
                $Produit = new Ecommerce();
                $Produit->setIdProduit($Produit_list['id_produit']);
                $Produit->setNomProduit($Produit_list['nom_produit']);
                $Produit->setDescriptionProduit($Produit_list['descriptions']);
                $Produit->setPrix($Produit_list['prix']);
                $Produit->setPhoto($Produit_list['photo']);
                $Produit->setQuantiteStock($Produit_list['quantite_stock']);
                $Produit->setNomCategory($Produit_list['nom_categorie']);


                array_push($Produits, $Produit);
            }

            return $Produits;
        }

        public function insertProduit($produit){
            $Nom = $produit->getNomProduit();
            $Description = $produit->getDescriptionProduit();
            $Prix = $produit->getPrix();
            $quantite_stock = $produit->getQuantiteStock();
            $photo = $produit->getPhoto();
            $id_category = $produit->getIdCategory();
            

                 // sql insert query
        $sqlInsertQuery = "INSERT INTO produit(nom_produit,descriptions, prix , quantite_stock ,photo, id_category) 
                            VALUES('$Nom', 
                                    '$Description',
                                    '$Prix',
                                    '$quantite_stock',
                                    '$photo',
                                    '$id_category')";

        mysqli_query($this->getConnection(), $sqlInsertQuery);
        }

        public function upload_photo($fileName, $tempname){

            $folder = 'img/'.$fileName;
            move_uploaded_file($tempname, $folder);
        } 

    }