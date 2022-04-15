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
        public function getCategorie($id){
            $sqlGetQuery = "SELECT * FROM categorie WHERE id_category= $id";
        
            // get result
            $result = mysqli_query($this->getConnection(), $sqlGetQuery);
        
            // fetch to array
            $categori_data = mysqli_fetch_assoc($result);
    
            $categori = new Ecommerce();
    
            $categori->setIdCategory($categori_data['id_category']);
            $categori->setNomCategory($categori_data['nom_categorie']);
            
            return $categori;
        }  
        public function editCategorie($categori,$id){
            $nomCategory = $categori->getNomCategory();
     
            // Update query
            $sqlUpdateQuery = "UPDATE categorie SET nom_categorie='$nomCategory' WHERE id_category=$id";
     
             // Make query 
             mysqli_query($this->getConnection(), $sqlUpdateQuery);

             
       
        }
        
        public function insertCategorie($categorie){
            $nomCategory = $categorie->getNomCategory();
            
                 // sql insert query
        $sqlInsertQuery = "INSERT INTO categorie(nom_categorie) 
                            VALUES('$nomCategory')";

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
        public function getProduit($id){
            $sqlGetQuery = "SELECT id_produit , nom_produit,descriptions ,photo ,prix,quantite_stock    FROM produit   WHERE id_produit= $id";
        
            // get result
            $result = mysqli_query($this->getConnection(), $sqlGetQuery);
        
            // fetch to array
            $produit_data = mysqli_fetch_assoc($result);
    
            $produit = new Ecommerce();
    
            $produit->setIdProduit($produit_data['id_produit']);
            $produit->setNomProduit($produit_data['nom_produit']);
            $produit->setDescriptionProduit($produit_data['descriptions']);
            $produit->setPrix($produit_data['prix']);
            $produit->setQuantiteStock($produit_data['quantite_stock']);
            $produit->setPhoto($produit_data['photo']);
            return $produit;
        }  
        public function editProduit($produit,$id){
            $NomProduit = $produit->getNomProduit();
            $Description = $produit->getDescriptionProduit();
            $Prix = $produit->getPrix();
            $QuantiteStock = $produit->getQuantiteStock();
            $IdCategory = $produit->getIdCategory();
            $Photo = $produit->getPhoto();
     
            // Update query
            $sqlUpdateQuery = "UPDATE produit   SET 
                         nom_produit='$NomProduit', 
                         descriptions='$Description', 
                         prix='$Prix',
                         quantite_stock = '$QuantiteStock',
                         id_category    =  ' $IdCategory',
                         photo = '$Photo'
                         WHERE id_produit=$id";
     
             // Make query 
             mysqli_query($this->getConnection(), $sqlUpdateQuery);

             
       
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

            $folder = '../img/'.$fileName;
            move_uploaded_file($tempname, $folder);
        } 

        public function deleteCategori($id){
            $sqlDeleteQuery = "DELETE FROM categorie   WHERE id_category= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }
        public function deleteProduit($id){
            $sqlDeleteQuery = "DELETE FROM produit   WHERE id_produit= '$id'";

            mysqli_query($this->getConnection(), $sqlDeleteQuery);
        }

    }