<?php  


include 'gestionProduit.php';


if(isset($_GET["id"])){
$id=$_GET["id"];

}
$gestion = new GestionProduit();
$data = $gestion->afficherProduit($id);

foreach($data as $value){
?>
   <h1><?= $value->getNom();?></h1>
   <p> Prix:<?= $value->getPrix();?></p>
   <?php 
}
?>

<form action="ajouter.php" method="POST">
<p>
<label for=""> Quntite</label>
<input type="number" name="qnt" value="1" >
</p>
<p>
<input type="hidden" name="id" value="<?=  $value->getId() ?>">
<button type="submit">ajouter au panier</button>
</p>
</form>
