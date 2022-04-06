<?php
      include "gestionEcommerce.php";
      
      $gestionCatégorie = new EcommerceManager();
      $data = $gestionCatégorie->getAllCategorie();

?>


<body>
    <div>
        <a href="insert.php">Add</a>
       
        <table>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>description</th>
                
            </tr>
            <?php 
                   foreach($data as $value){

                    ?>
                    <tr>
                       <td><?= $value->getIdCategory() ?></td>
                        <td><?= $value->getNomCategory() ?></td>
                        <td><?= $value->getDescriptionsCategory() ?></td>
                    </tr>
             <?php } ?>
        </table>
    </div>
    
</body>
</html>