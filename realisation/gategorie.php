<?php 
include 'sestam/cartManager.php';
?>
<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/boxicons.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="assets/css/nice-select.min.css">
        <link rel="stylesheet" href="assets/css/slick.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/rangeSlider.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">

        <title>Xton - eCommerce HTML Template</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>
    <body>

    <?php include "page/nave.php" ;?>

      <!-- Start Page Title -->
      <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Long Sleeve Leopard T-Shirt</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Products Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        
<!-- Start Products Area -->
<section class="products-area pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Recent Products</h2>
                </div>
              
                <div class="row">
                <?php
               
                if(isset($_GET['id'])){
                    $id = $_GET['id']; 
                 $cartManager = new CartManager();
                 $data = $cartManager->getAllCategorieProduits($id);}
                        foreach($data as $value){
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
               
                        <div class="single-productsBox">
                            <div class="products-image">
                                <a href="detail de produit.php?id=<?= $value->getId();?>">
                                    <img src="<?php echo 'admin/img/' .$value->getPhoto(); ?>" class="main-image" alt="image">
                                    <img src="<?php echo 'admin/img/' .$value->getPhoto(); ?>" class="hover-image" alt="image">
                                </a>

                                <div class="products-button">
                                    <ul>
                                        <li>
                                            <div class="wishlist-btn">
                                                <a href="#">
                                                    <i class='bx bx-heart'></i>
                                                    <span class="tooltip-label">Add to Wishlist</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="compare-btn">
                                                <a href="#">
                                                    <i class='bx bx-refresh'></i>
                                                    <span class="tooltip-label">Compare</span>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="quick-view-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView">
                                                    <i class='bx bx-search-alt'></i>
                                                    <span class="tooltip-label">Quick View</span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="products-content">
                                <span class="category"><?= $value->getCategory();?>EcoSmart</span>
                                <h3><a href="products-type-3.html"><?= $value->getName();?></a></h3>
                                <div class="price">
                                    <span class="new-price"><?= $value->getPrice();?>dh</span>
                                </div>
                                <a href="detail de produit.php?id=<?= $value->getId();?>"  class="add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php }?> 
                </div>
                
            </div>
        </section>
        <!-- End Products Area -->


















    <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <!-- Links of JS files -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/magnific-popup.min.js"></script>
        <script src="assets/js/parallax.min.js"></script>
        <script src="assets/js/rangeSlider.min.js"></script>
        <script src="assets/js/nice-select.min.js"></script>
        <script src="assets/js/meanmenu.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/sticky-sidebar.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/form-validator.min.js"></script>
        <script src="assets/js/contact-form-script.js"></script>
        <script src="assets/js/ajaxchimp.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
