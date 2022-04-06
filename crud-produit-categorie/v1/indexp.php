<?php
    include 'gestionEcommerce.php';

    $produitManager = new EcommerceManager();
    $data = $produitManager->getAllProduits();

?>

<body>

    <div>
        <a href="insertp.php">Insert Data</a>
        <table>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>DCATIGORE</th>
            </tr>

            <?php
                    foreach($data as $produit){
            ?>

            <tr>
                <td><?= $produit->getIdProduit()?></td>
                <td><?= $produit->getNomProduit()?></td>
                <td><?= $produit->getDescriptionProduit()?></td>
                <td><?= $produit->getPrix()?></td>
                <td><?= $produit->getNomCategory()?></td>
                
               
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>
