<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
	include '../logic/gestionEcommerce.php';

    if(!empty($_POST)){
        $filename = $_FILES["image"]["name"];
		$produit = new Ecommerce();	
		$produitManager = new EcommerceManager();
		

        $produit->setNomProduit($_POST['NomProduit']);
        $produit->setDescriptionProduit($_POST['Description']);
        $produit->setPrix($_POST['Prix']);
        $produit->setQuantiteStock($_POST['quantite_stock']);
        $produit->setIdCategory($_POST['Category']);
        $produit->setPhoto($filename);
        $tempname = $_FILES["image"]["tmp_name"];

		$produitManager->insertProduit($produit);
        $produitManager->upload_photo($filename, $tempname);
     
        header("Location: ../index.php");

    }
?>


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
                            <a href="../index.php" class="nav-link px-0 align-middle">
                            <i class="bi bi-table"></i><span class="ms-1 d-none d-sm-inline">Table produit</span> </a>
                        </li>
                        <li>
                            <a href="../pageCategorie/indexCategori.php" class="nav-link px-0 align-middle">
                            <i class="bi bi-table"></i> <span class="ms-1 d-none d-sm-inline">Table categorie</span> </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
<div class="col py-3 container-fluid ">
	<section>       
<form class= "col-lg-9 " method="POST" enctype='multipart/form-data' action="">
<div class=" mb-3 col-lg-6 col-sm-10">
    <label for="inputEmail3" class="col-sm-2 col-form-label">photo</label>
    
    <input type="file" class="form-control" name="image" value="UPLOAD PRODUCT IMAGE" id="inputEmail3">

  </div>
<div class=" mb-3 col-lg-6 col-sm-10">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nom</label>
    
    <input type="text" class="form-control" name="NomProduit" id="inputEmail3">

  </div>
  <div class="mb-3 col-lg-6 col-sm-10">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
  <div class=" mb-3 col-lg-4 col-sm-10">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Prix</label>
      <input type="number" name="Prix" class="form-control" id="inputPassword3">
  </div>
  <div class=" mb-3 col-lg-4 col-sm-10">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantite_stock</label>
      <input type="number" name="quantite_stock" class="form-control" id="inputPassword3">
  </div>
  <div class="col-6">
    <label for="workType" class="form-label">Categorie</label>

	<?php 
	$produitManager = new EcommerceManager();
	$data = $produitManager->getAllCategorie();
	foreach($data as $value){ ?>
    <div class="form-check">
    <input required class="form-check-input" name="Category" value="<?= $value->getIdCategory()?>"
    type="radio" id="gridCheck">
	<label for=""><?= $value->getNomCategory()?></label>
                                        
    </div>
    <?php } ?>

    </div>
 
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
    
</section>
        </div>
          
	</div>
	

    
</body>
</html>