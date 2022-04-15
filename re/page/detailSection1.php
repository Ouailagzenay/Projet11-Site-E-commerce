
  
<div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="products-details-image">
                            <ul class="products-details-image-slides">
                                <li><img style="width: 650PX;height: 800PX;"  src="<?php echo './admin/img/' .$data->getPhoto(); ?>" alt="image"></li>
                                
                                
                            </ul>

                            <div class="slick-thumbs">
                                <ul>
                                    <li><img src="<?php echo './admin/img/' .$data->getPhoto(); ?>" alt="image"></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="products-details-desc">
                            <h2 style="margin-top:50PX;"><?= $data->getName();?></h2>

                            <div style="margin-top:50PX;"class="price">
                                <H3 class="new-price"><?= $data->getPrice();?> DH</H3>
                            </div>



                            <div style="margin-top:50PX;" class="products-size-wrapper">
                                <span>Size:</span>
                                <ul>
                                    <li><a href="#">XS</a></li>
                                    <li class="active"><a href="#">S</a></li>
                                    <li><a href="#">M</a></li>
                                    
                                </ul>
                            </div>

                            
                            <form  class="" action="sestam/addTocart.php" method="POST">
                            <div class="products-add-to-cart">
                                <div style="margin-top:50PX;" class="input-counter">
                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                    <input type="text" name="quantite" value="1">
                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                </div>
                              <button style="margin-top:50PX;" type="submit" class="default-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                              <input type="hidden" name="id" value="<?=  $data->getId(); ?>">
                            </div>
                            </form>

                            <div style="margin-top:50PX;" class="wishlist-compare-btn">
                                <a href="#" class="optional-btn"><i class='bx bx-heart'></i> Add to Wishlist</a>
                                <a href="#" class="optional-btn"><i class='bx bx-refresh'></i> Add to Compare</a>
                            </div>

                            <div class="buy-checkbox-btn">
                                

                                <div style="margin-top:50PX;" class="item">
                                    <a href="#" class="default-btn">Buy it now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>