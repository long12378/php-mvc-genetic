<?php
ob_start();
?>
<main class="ps-main">
  <div class="ps-content pt-80 pb-80">
    <div class="ps-container">
      <div class="ps-cart-listing">
        <table class="table ps-cart__table">
          <thead>
            <tr>
              <th>All Products</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $totalprice = 0;
            for ($i = 0; $i < count($_SESSION['id_prode']); $i++) {
            ?>
              <tr>
                <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" style="width: 100px; height: 100px;" src="\php-mvc-master\public\asset\images\shoe\<?php echo $_SESSION['title_cat'][$i] ?>\<?php echo $_SESSION['title_subcat'][$i] ?>\<?php echo $_SESSION['image'][$i] ?>" alt=""> <?php echo $_SESSION['productname'][$i]?></a></td>
                <td><?php echo number_format($_SESSION['price'][$i],3,".",",")?> VND</td>
                <td>
                  <div class="form-group--number">
                    <button class="minus"><span>-</span></button>
                    <input class="form-control" type="text" value="<?php echo $_SESSION['quantity'][$i]?>">
                    <button class="plus"><span>+</span></button>
                  </div>
                </td>
                <td><?php echo number_format($_SESSION['price'][$i]*$_SESSION['quantity'][$i],3,".",",")?> VND</td>
                <td>
                  <div class="ps-remove"></div>
                </td>
              </tr>
            <?php
            $totalprice += $_SESSION['price'][$i]*$_SESSION['quantity'][$i];
            }
            ?>
            <!-- <tr>
                  <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="images/product/cart-preview/2.jpg" alt=""> The Crusty Croissant</a></td>
                  <td>$150</td>
                  <td>
                    <div class="form-group--number">
                      <button class="minus"><span>-</span></button>
                      <input class="form-control" type="text" value="2">
                      <button class="plus"><span>+</span></button>
                    </div>
                  </td>
                  <td>$300</td>
                  <td>
                    <div class="ps-remove"></div>
                  </td>
                </tr>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" src="images/product/cart-preview/3.jpg" alt="">The Rolling Pin</a></td>
                  <td>$150</td>
                  <td>
                    <div class="form-group--number">
                      <button class="minus"><span>-</span></button>
                      <input class="form-control" type="text" value="2">
                      <button class="plus"><span>+</span></button>
                    </div>
                  </td>
                  <td>$300</td>
                  <td>
                    <div class="ps-remove"></div>
                  </td>
                </tr> -->
          </tbody>
        </table>
        <div class="ps-cart__actions">
          <div class="ps-cart__promotion">
            <div class="form-group">
              <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                <input class="form-control" type="text" placeholder="Promo Code">
              </div>
            </div>
            <div class="form-group">
              <button class="ps-btn ps-btn--gray">Continue Shopping</button>
            </div>
          </div>
          <div class="ps-cart__total">
            <h3>Total Price: <span> <?php echo number_format($totalprice,3,".",",")?> VND</span></h3><a class="ps-btn" href="checkout.html">Process to checkout<i class="ps-icon-next"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>