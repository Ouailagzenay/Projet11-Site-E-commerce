<?php 

$cartManager = new CartManager();
$data= $cartManager->afficher();
 ?>
<div class="related-products">
                <div class="container">
                    <div class="section-title">
                        <span class="sub-title">Our Shop</span>
                        <h2>Related Products</h2>
                    </div>

                    <div class="products-slides owl-carousel owl-theme">
                    <?php
                        

                        foreach($data as $value){ ?>
                        <div class="single-products-box">
                        
                
                            <div class="products-image">
                                <a href="#">
                                    <img src="assets/img/products/img5.jpg" class="main-image" alt="image">
                                    <img src="assets/img/products/img-hover5.jpg" class="hover-image" alt="image">
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
                                    </ul>
                                </div>
                            </div>

                            <div class="products-content">
                                <h3><a href="#"><?= $value->getName();?></a></h3>
                                <div class="price">
                                    <span class="new-price"><?= $value->getPrice();?>dh</span>
                                </div>
                                <a href="#" class="add-to-cart">Add to Cart</a>
                            </div>
                           
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details Area -->