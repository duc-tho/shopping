<?php
foreach ($data['productData']['productList'] as $product) {
     $productId = $product['ProductID'];
     $name = $product['ProductName'];
     $rating = $product['Rating'];
     $price = $product['Price'];
     $discount = $product['Discount'];
     $imageURL = $product['Picture'];
     $saleOff = number_format($price - $price * ($discount / 100), 0, ",", ".");
?>
     <div class="col-md-6 col-lg-3 my-2">
          <div class="card ms-hover">
               <div class="card-img-top ms-center-image my-4 ms-zoom" style="height: 250px;">
                    <img id="ms-product-image" class="mw-100 mh-100" src="<?php echo $imageURL ?>" alt="Ảnh minh họa">
               </div>
               <div class="card-body">
                    <div class="row">
                         <div class="col-8 text-center text-md-left" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                              <h5 class="card-title d-inline text-center">
                                   <a id="ms-product-name" title="<?php echo $name ?>" href="./product/detail/<?php echo $productId ?>"><?php echo $name ?></a>
                              </h5>
                         </div>
                         <div class="col-4 my-auto">
                              <div class="badge badge-light w-100 py-2">
                                   <?php echo $rating ?> <i class="fa fa-star text-right text-warning" aria-hidden="true"></i>
                              </div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-8 text-center ms-white-space-nowrap text-md-left">
                              <span class="text-secondary"><?php echo number_format($price, 0, ",", ".") ?> đ
                                   <div class="badge badge-success">-<?php echo $discount ?>%</div>
                              </span>
                              <h4 id="ms-product-price" class="card-text text-danger">
                                   <?php echo $saleOff ?> đ
                              </h4>
                         </div>
                         <div class="col-4 justify-content-center d-flex">
                              <button id="ms-add-to-cart" class="btn btn-outline-success h-100">
                                   <i class="fa fa-cart-plus fa-lg"></i>
                              </button>
                         </div>
                    </div>
               </div>
          </div>
     </div>

<?php } ?>