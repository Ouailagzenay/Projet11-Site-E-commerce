<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php 
include 'gestionProduit.php';
$gestionProduit = new GestionProduit();
$data= $gestionProduit->afficher();

foreach($data as $value){

?>


<div class="card " style="width: 18rem;">
  <img src="../img/cta-2-368x420.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $value->getNom();?></h5>
    <p class="card-text"><?= $value->getPrix();?> dh</p>
    <a href="detail de produit.php?id=<?= $value->getId();?>" class="btn btn-primary">Detail de produit</a>
  </div>
</div>


<?php } ?>

<a href="panier.php">panier</a>
