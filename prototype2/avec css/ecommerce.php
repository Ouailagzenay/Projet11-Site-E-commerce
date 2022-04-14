<?php
    class Ecommerce {
        private $idProduit;
        private $NomProduit;
        private $DescriptionProduit;
        private $Prix;
        private $image ;
        private $IdCategory;
        private $NomCategory;
        private $DescriptionsCategory;
        
        public function getIdProduit(){
            return $this->idProduit;
        }
        public function setIdProduit($value){
            $this->idProduit = $value;
        }

        public function getNomProduit(){
            return $this->NomProduit;
        }

        public function setNomProduit($value){
            $this->NomProduit = $value;
        }
        public function getImage(){
            return $this->image;
        }
        public function setImage($value){
            $this->image = $value;
        }

        public function getDescriptionProduit(){
            return $this->DescriptionProduit;
        }

        public function setDescriptionProduit($value){
            $this->DescriptionProduit= $value;
        }

        public function getPrix(){
            return $this->Prix;
        }

        public function setPrix($value){
            $this->Prix= $value;
        }
        
        public function getIdCategory() {
            return $this->IdCategory;
        }
        public function setIdCategory($idCategory) {
            $this->IdCategory = $idCategory;
        }
    
        public function getNomCategory() {
            return $this->NomCategory;
        }
        public function setNomCategory($NomCategory) {
            $this->NomCategory = $NomCategory;
        }
    
        public function getDescriptionsCategory() {
            return $this->DescriptionsCategory;
        }
        public function setDescriptionsCategory($DescriptionsCategory) {
            $this->DescriptionsCategory = $DescriptionsCategory;
        }

        
    }
?>