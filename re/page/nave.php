 <!-- Start Navbar Area -->
 <div class="navbar-area">
            <div class="xton-responsive-nav">
                <div class="container">
                    <div class="xton-responsive-menu">
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets/img/logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xton-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="index.php" class="nav-link active">Home </a>
                                </li>

                                <li class="nav-item"><a href="#" class="nav-link">Categorie <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <?php    $cartManager = new CartManager();
                                                 $dataCategorie = $cartManager->getAllCategorie();
                                                 foreach($dataCategorie as $value){ ?>
                                        
                                        <li class="nav-item"><a href="gategorie.php?id=<?php echo $value->getIdCategory() ?>" class="nav-link"><?= $value->getCategory()?></a></li>
                                        <?php } ?>
                                        
                                    </ul>
                                </li>

                                <li class="nav-item megamenu"><a href="#" class="nav-link">Pages </a>
                                </li>

                                <li class="nav-item megamenu"><a href="#" class="nav-link">Women's</a>
                                </li>

                                <li class="nav-item megamenu"><a href="#" class="nav-link">Men's </a>
                                </li>

                                <li class="nav-item"><a href="#" class="nav-link">Blog</i></a>
                                </li>
                            </ul>

                            <div class="others-option">
                                <div class="option-item">
                                    <div class="search-btn-box">
                                        <i class="search-btn bx bx-search-alt"></i>
                                    </div>
                                </div>

                                <div class="option-item">
                                    <div class="cart-btn">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i class='bx bx-shopping-bag'></i><span>0</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

        
       
