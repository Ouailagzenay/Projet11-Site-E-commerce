<?php
	include 'gestionEcommerce.php';
// Trouver tous les employés depuis la base de données 
$gestionCatégorie = new EcommerceManager();


if(!empty($_POST)){
    $catégorie = new Ecommerce();
    $catégorie->setIdCategory($_POST['id']);
    $catégorie->setNomCategory($_POST['Nom']);
    $catégorie->setDescriptionsCategory($_POST['descriptions']);
    $gestionCatégorie->insertCategorie($catégorie);

    // Redirection vers la page index.php
    header("Location: index.php");
}
?>

<form action="" method="POST">
id: <input type="number" name="id" >
Nom: <input type="text" name="Nom" >
descriptions : <input type="text" name="descriptions" >


<button type="submit">ajouter</button>
</form>
