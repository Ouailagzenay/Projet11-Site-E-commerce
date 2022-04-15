<?php
class Product{
private $name ; 
private $Photo ;
private $quantity;

public function getName() {
    return $this->name;
}
public function setName($name) {
    $this->name = $name;
}
public function getPhoto() {
    return $this->Photo;
}
public function setPhoto($Photo) {
    $this->Photo = $Photo;
}
public function getQuantity() {
    return $this->quantity;
}
public function setQuantity($quantity) {
    $this->quantity = $quantity;
}
}

?>

