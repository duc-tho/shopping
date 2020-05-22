<?php
$productItem = $data["product"];
$id = $productItem["ProductID"];
$name = $productItem["ProductName"];
$price = $productItem["Price"];
$description = $productItem["Description"];
$picture = $productItem["Picture"];
$discount = $productItem["Discount"];
$quantily = $productItem["Quantily"];
$rating = $productItem["Rating"];
$saleOff = number_format($price - $price * ($discount / 100), 0, ",", ".");
?>
<div class="row mt-4">
     <div class="col-lg-5">
          <img class="w-100" src="<?php echo $picture; ?>" alt="<?php echo $name; ?>">
     </div>
     <div class="col-lg-7 d-flex flex-column justify-content-between">
          <div>
               <a href="/product/detail/<?php echo $id; ?>" id="ms-product-name" class="font-weight-light h2"><?php echo $name; ?></a>
               <br>
               <div class="text-secondary lead d-inline">
                    <h4 class="text-danger font-weight-light m-0 d-inline"><?php echo $saleOff; ?> đ</h4>
                    <del><?php echo number_format($price, 0, ",", "."); ?> đ</del><span> -<?php echo $discount; ?>%</span>
               </div>
               <div>
                    <b>Tình trạng</b>
                    <p>Còn <?php echo $quantily; ?> sản phẩm</p>
                    <!-- <b>Bảo Hành</b>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, nihil vero veritatis sapiente omnis porro veniam aut distinctio ut atque assumenda animi, similique nam non illo placeat natus velit. Ipsa.</p> -->
               </div>
          </div>
          <div>
               <div class="d-flex align-items-center pb-3">
                    <div class="badge badge-dark p-2 mr-2">
                         <?php echo $rating; ?> <i class="fa fa-star text-right text-warning" aria-hidden="true"></i>
                    </div>
                    <div>Đánh giá!</div>
               </div>
               <div class="row col-lg-12 p-0">
                    <div class="col-lg-6">
                         <button class="w-100 btn btn-large btn-info">Mua ngay</button>
                    </div>
                    <div class="col-lg-6">
                         <button id="ms-add-to-cart" class="w-100 btn btn-large btn-primary">Thêm vào giỏ hàng</button>
                    </div>
               </div>
          </div>
     </div>
</div>
<div class="row">
     <div class="col-lg-12">
          <hr>
          <h3><?php echo $name; ?></h3>
          <!-- <div class="d-none"><?php #echo $description; 
                                   ?></div> -->
          <div id="description"></div>
     </div>
</div>
<div class="row mb-4">
     <div class="col-lg-12">
          <hr>
          <div class="form-group">
               <label for="comment" class="h3">Đánh giá và Bình luận về sản phẩm!</label>
               <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
               <button class="w-100 mt-2 btn btn-info">Bình Luận</button>
          </div>
          <p class="text-center text-secondary lead">Chưa có bình luận nào! Hãy để lại ý kiến hoặc thắc mắc cùa bạn!</p>
     </div>
</div>

<?php include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_Item_Relate_Component.php" ?>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
     let editor = new Quill('#description', {
          readOnly: true
     });

     editor.setContents(JSON.parse(`<?php echo str_replace("\\n", "\\\\n", $description) ?>`));
</script>