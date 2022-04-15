  <!-- Start Products Area -->
  <section class="products-area pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Recent Products</h2>
                </div>
              
                <div class="row">
                <?php
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
                                <span class="category"><?= $value->getName();?>EcoSmart</span>
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