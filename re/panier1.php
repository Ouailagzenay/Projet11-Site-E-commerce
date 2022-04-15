<?php
include 'sestam/cartManager.php';
session_start();

$cartManager = new CartManager();

$cartManager->initCode();
$cart = $cartManager->getCart($_COOKIE['cartCookie']);
$quantity = $cartManager->getCartQuantity();
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
          <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>
    <body>
   <?php include "page/nave.php" ?>
   
   <div id="content">
          <div class="breadcrumb">
            <div class="container">
              <h2>Cart</h2>
              <ul><li>Home</li><li>Shop</li><li class="active">Cart</li></ul>
            </div>
          </div>
      <div class="shop">
        <div class="container">
          <div class="cart">
            <div class="container">
              <div class="cart__table">
                <div class="cart__table__wrapper">
                  <table>
                    <colgroup>
                      <col style="width: 17%"/>
                      <col style="width: 17%"/>
                      <col style="width: 17%"/>
                      <col style="width: 17%"/>
                      <col style="width: 17%"/>
                      <col style="width: 17%"/>
                      <col style="width: 9%"/>
                    </colgroup>
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <?php 
            
$cartLineList = $cart->getCartLineList()[0];

$cartQuantity = $cartManager->getCartQuantity();
$totalPrice = 0;
if($cartLineList != null){
foreach($cartLineList as $value){
    
?>
                <?php $totalPrice = ($totalPrice + $value->getProduct()->getPrice()) * $value->getProductCartQuantity()?>

            
                    <tbody>
                      <tr>
                        <td>
                          <div class="cart-product">
                            
                              <a href="product-detail.html"><?= $value->getProduct()->getId() ?></a>
                              
                            
                          </div>
                        </td>
                        <td><?= $value->getProduct()->getName() ?></td>
                        
                        <td><?= $value->getProduct()->getPrice() ?> DH </td>
                        <td>
                              <div class="quantity-controller ">
                                <div class="quantity-controller__number"><?=$value->getProductCartQuantity();?></div>
                              </div>
                        </td>
                        <td><?= substr($value->getProduct()->getDescription(), 0, 28)  ?></td>
                        <td><a href="sestam/supprimer.php?id=<?php echo $value->getIdCartLine()?>">X</a></td>
                      </tr>
                      
                    </tbody>
                    <?php } }?>
                  </table>
                </div>
              </div>
              
                  <div class="col-12 col-md-4">
                    <div class="cart__total__content">
                      <h3>Cart</h3>
                      <table>
                        <tbody>
                          <tr>
                            <th>Subtotal</th>
                            <td><?=  $totalPrice?>dh</td>
                          </tr>
                          <tr>
                            <th>SHIPPING</th>
                            <td>3.00 DH</td>
                          </tr>
                          <tr>
                            <th>Total</th>
                            <td class="final-price"><?=  $totalPrice + 3 ?>dh</td>
                          </tr>
                        </tbody>
                      </table><a class="btn -dark" href="/checkout.html">Proceed to checkout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

