<?php
      include "gestionEcommerce.php";
      
      $gestionCatégorie = new EcommerceManager();
      $data = $gestionCatégorie->getAllCategorie();

?>    
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand btn">Admin</a>
            
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="insert.php" class="nav-link px-0 align-middle">
                            <i class="bi bi-plus-square"></i> <span class="ms-1 d-none d-sm-inline">Ajoute categorie</span> </a>
                        </li>
                        <li>
                            <a href="indexp.php" class="nav-link px-0 align-middle">
                            <i class="bi bi-table"></i> <span class="ms-1 d-none d-sm-inline">Table produit </span> </a>
                        </li>
                    </ul>
                    
                    
                </div>
        </div>
        
        <div class="col py-3 container-fluid">
        <div class="card mb-4">
    <div class="card-header">
        <div>Table categorie</div>
    </div>
        <div class="card-body">            
            <table class="table">
                <tr>
                    
                    <th class="d-none d-lg-table-cell">Id </th>
                    <th class="d-none d-lg-table-cell">Nom</th>
                    <th class="d-none d-md-table-cell">Description</th>
                    
                </tr>

                <?php
                        foreach($data as $value){
                ?>

                <tr>
                    <td class="d-none d-lg-table-cell"><?= $value->getIdCategory()?></td>
                    <td class="d-none d-lg-table-cell"><?= $value->getNomCategory()?></td>
                   
            
                </tr>
                <?php }?>
            </table>
        </div>
    </div>       
</div>
    


    
</body>
</html>