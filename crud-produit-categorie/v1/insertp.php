<?php
	include 'gestionEcommerce.php';

    if(!empty($_POST)){
		$produit = new Ecommerce();	
		$produitManager = new EcommerceManager();
		

        $produit->setNomProduit($_POST['fname']);
        $produit->setDescriptionProduit($_POST['lname']);
        $produit->setPrix($_POST['age']);
        $produit->setIdCategory($_POST['Category']);
        

		$produitManager->insertProduit($produit);
		;
     
        header("Location: indexp.php");

    }
?>

<div>
        <div>
		<div><h3>Create a User</h3>
        <form method="POST" action="">
			<div>
				<label for="inputFName">Nom</label>
				<input type="text" required="required" id="inputFName" name="fname" placeholder="First Name">
				<span></span>
			</div>
			
			<div>
				<label for="inputLName">Description</label>
				<input type="text" required="required" id="inputLName" name="lname" placeholder="Last Name">
        		<span></span>
			</div>
			
			<div>
				<label for="inputAge">Prix</label>
				<input type="number" required="required" class="form-control" id="inputAge" name="age" placeholder="Age">
				<span></span>
			</div>
			<div class="col-6">
                                    <label for="workType" class="form-label">Type</label>

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
    
			<div class="form-actions">
					<button type="submit">Create</button>
					<a href="index.php">Back</a>
			</div>
			
		</form>
        </div></div>        
</div>
</body>
</html>