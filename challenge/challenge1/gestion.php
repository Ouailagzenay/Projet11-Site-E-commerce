<?php



include "cartLine.php";
include "product.php";


class Gestion {

    public $name ;

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'root', '', 'e-commerce');
            // $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'e-commerce');
           
         
       
        
        return $this->Connection;
    }


    public function getTotalAjoutProduitAuPanier(){
        $sql = "SELECT nom_produit ,SUM(productCartQuantity) AS total FROM cart_line INNER JOIN produit on produit.id_produit=cart_line.idProduct GROUP BY  idProduct  ";
        // $sql = "SELECT * ,SUM(productCartQuantity) FROM cart_line  GROUP BY  idProduct ";
        $query = mysqli_query($this->getConnection(), $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
       
        $TotalAjoutProduitAuPanier = array();
        foreach($result as $value){


            $value['total'];
            $value['nom_produit'];

           
            // $cartLine = new CartLine();
            // $cartLine->setProductCartQuantity($value['total']);
            // $cartLine->setProduct($value['nom_produit']);
           

            
            array_push($TotalAjoutProduitAuPanier, $value);
        }
        return $TotalAjoutProduitAuPanier;
    }
}