<?php
include "product.php";
include "cart.php";
include "cartLine.php";


class CartManager {

    public $name ;

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'root', '', 'e-commerce');
           
         
       
        
        return $this->Connection;
    }


  public function initCode() {
    if(!isset($_COOKIE['cartCookie']))
    {
        $expire=time() + (86400 * 30);//however long you want
        $cookieId = uniqid();
        setcookie('cartCookie', $cookieId, $expire);
        $_SESSION["product"] = array();
        $_SESSION["quantity"] = 0;
        $_SESSION["product"] = array();
        $this->addCartCookie($cookieId);
    }
  }
    
    // Add product to cart
    public function addProduct($cart, $product, $quantity){
        $cartId = $cart->getId();
        $productId = $product->getId();
        $sql = "INSERT INTO cart_line(idProduct,idCart, productCartQuantity) VALUES('$productId', '$cartId', '$quantity')";
        $result = mysqli_query($this->getConnection(), $sql);
        if($result){
            $this->getConnection()->close();
        }

    }

    public function getCartLine($id){
        $sql = "SELECT * FROM cart_line INNER JOIN produit on produit.id_produit=cart_line.idProduct WHERE idCart='$id'";
        $query = mysqli_query($this->getConnection(), $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
       
        $cartLineList = array();
        foreach($result as $value){
            $product = new Product();
            $cartLine = new CartLine();
            $cartLine->setIdCartLine($value['idCartLine']);
            $cartLine->setIdCart($value['idCart']);
            $cartLine->setIdProduct($value['idProduct']);
            $cartLine->setProductCartQuantity($value['productCartQuantity']);
            $product->setId($value['id_produit']);
            $product->setName($value['nom_produit']);
            $product->setPrice($value['prix']);
            $product->setDescription($value['descriptions']);
            $product->setQuantity($value['quantite_stock']);
            $product->setCategory($value['id_category']);
            $cartLine->setProduct($product);
            array_push($cartLineList, $cartLine);
        }
        return $cartLineList;
    }
    
    // pour ajouter session
    public function set($cart, $product, $quantity){
        session_start();
        $_SESSION["cart"] = $cart;
        array_push($_SESSION["product"], $product);
        if(!isset($_SESSION["quantity"])){
            $_SESSION["quantity"] = 0;
        }
        $_SESSION["quantity"] += $quantity; 

    }

      // afficher session

      public function getCartProducts($cartId){

        $sql = "SELECT * FROM cart_line INNER JOIN produit on cart_line.idCartLine = produit.id_produit WHERE idCart = $cartId";
        $query = mysqli_query($this->getConnection(), $sql);
        $result =  mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
        $product = new Product();
        $productsList = array();
        foreach ($result as $value_Data) {
            $product->setId($value_Data['id_produit']);
            $product->setName($value_Data['nom_produit']);
            $product->setPrice($value_Data['prix']);
            $product->setDescription($value_Data['descriptions']);
            $product->setQuantity($value_Data['quantite_stock']);
            $product->setCategory($value_Data['id_category']);
            array_push($productsList, $product);
        }
          return $productsList;
        // if(isset($_SESSION["product"])){
        //     return $_SESSION["product"];
        // }

      }

      public function getCartQuantity(){
          if(isset($_SESSION["quantity"])){
              return $_SESSION["quantity"];
          }
      }

          //supprimer session
    public function delete($id){
        if(isset($_SESSION["paniers"]["products"][$id])){
            unset($_SESSION["paniers"]["products"][$id]);
        }
        $sqlDeleteQuery = "DELETE FROM cart_line WHERE idCartLine= '$id'";
        mysqli_query($this->getConnection(), $sqlDeleteQuery);
    }
    


    
    // pour afficher  session 
    public function getProductCart($idCartLine){
        $sql = "SELECT * FROM cart_line INNER JOIN produit on cart_line.idProduct = produit.id_produit WHERE idCartLine = $idCartLine";
        $query = mysqli_query($this->getConnection(),$sql);
        $result = mysqli_fetch_assoc($query);

        $cartLine = new CartLine();
        $cartLine->setIdCartLine($result['idCartLine']);
        $cartLine->setIdCart($result['idCart']);
        $cartLine->setIdProduct($result['idProduct']);
        $cartLine->setProductCartQuantity($result['productCartQuantity']);
        
        $product = new Product();
        $product->setId($result['id_produit']);
        $product->setName($result['nom_produit']);
        $product->setPrice($result['prix']);
        $product->setDescription($result['descriptions']);
        $product->setQuantity($result['quantite_stock']);
        $product->setCategory($result['id_category']);

        $cartLine->setProduct($product);

        return $cartLine;
    }

    // Edit  cart line
    public function editCartLine($idCartLine, $quantity){
        $sql = "UPDATE cart_line SET productCartQuantity = '$quantity' WHERE idCartLine=$idCartLine";
        mysqli_query($this->getConnection(), $sql);
        
    }

  

// afficher  les produits : page index
    public function afficher(){
        $SelctRow = 'SELECT *  FROM produit';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $product = new Product();
            $product->setId($value_Data['id_produit']);
            $product->setName($value_Data['nom_produit']);
            $product->setPrice($value_Data['prix']);
            $product->setDescription($value_Data['descriptions']);
            $product->setQuantity($value_Data['quantite_stock']);
            $product->setCategory($value_Data['id_category']);
            $product->setPhoto($value_Data['photo']);
            array_push($TableData, $product);
        }
          return $TableData;
 
        }
  
 
        
// afficher  les produits : page panier

        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM produit WHERE id_produit =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $product = new Product();

            
            foreach ($produits_data as $value) {
            $product->setId($value['id_produit']);
            $product->setName($value['nom_produit']);
            $product->setPrice($value['prix']);
            $product->setDescription($value['descriptions']);
            $product->setQuantity($value['quantite_stock']);
            $product->setCategory($value['id_category']);
            $product->setPhoto($value['photo']);               
            }
              return $product;
        }
      
 

        function compteur(){ 
        if(isset($_SESSION["paniers"]) != null){
                $compteur = count($_SESSION["paniers"]["products"]) ;
            
            }else {
                $compteur = 0;
            
            }
            return $compteur;
        }

        function addCartCookie($cookie){
            $sql = "INSERT INTO carts(userReference) VALUES('$cookie')";
            mysqli_query($this->getConnection(), $sql);
        }

        function getCart($userRefe){
            $sql = "SELECT * from carts WHERE userReference = '$userRefe'";
            $query = mysqli_query($this->getConnection(), $sql);
            $result = mysqli_fetch_assoc($query);

            
            $cart = new Cart();
            $cart->setId($result["id"]);
            $cart->setUserReference($result["userReference"]);

            $cartLine = $this->getCartLine($cart->getId());
            $cart->setCartLineList($cartLine);
            return $cart;
        }
        public function getAllCategorie(){
            $sqlGetData = 'SELECT id_category ,nom_categorie FROM categorie ';
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $categoriesList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $categories = array();
            foreach($categoriesList as $categorie_list){
                $categorie = new Product();
                $categorie->setIdCategory($categorie_list['id_category']);
                $categorie->setCategory($categorie_list['nom_categorie']);
                array_push($categories, $categorie);
            }

            return $categories;
        }
        public function getAllCategorieProduits($id){
            
            $sqlGetData = "SELECT *  FROM produit    WHERE id_category = $id "   ;
            $result = mysqli_query($this->getConnection() ,$sqlGetData);
            $ProduitsList = mysqli_fetch_all($result,MYSQLI_ASSOC);

            $Produits = array();
            foreach($ProduitsList as $Produit_list){
                $Produit = new Product();
                $Produit->setId($Produit_list['id_produit']);
                $Produit->setName($Produit_list['nom_produit']);
                $Produit->setDescription($Produit_list['descriptions']);
                $Produit->setPrice($Produit_list['prix']);
                $Produit->setPhoto($Produit_list['photo']);


                array_push($Produits, $Produit);
            }

            return $Produits;
        }
    }
