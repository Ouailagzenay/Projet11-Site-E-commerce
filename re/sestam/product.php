<?php

class Product{

    private $name ; 
    private $price ; 
    private $id ; 
    private $description;
    private $quantity;
    private $Photo;
    private $category;
    private $idCategory;

    
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getPhoto(){
        return $this->Photo;
    }

    public function setPhoto($value){
        $this->Photo= $value;
    }

    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

    
    public function getQuantity() {
        return $this->quantity;
    }
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
    

    public function getCategory() {
        return $this->category;
    }
    public function setCategory($category) {
        $this->category = $category;
        
    } public function getIdCategory() {
        return $this->IdCategory;
    }
    public function setIdCategory($IdCategory) {
        $this->IdCategory = $IdCategory;
    }

    

}