<?php include_once "{$_(PATH_APPLICATION)}/views/components/home/Category_Component.php" ?>

<div id="ms-product-list" class="row bg-light py-3 rounded my-3">
     <div class="col-12">
          <h3 class="text-success text-center text-lg-left"><i class="fa fa-paper-plane" aria-hidden="true"></i> Danh mục Sản phẩm <?php echo $data["title"]; ?></h3>
          <hr>
     </div>



     <?php include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_Item_Component.php" ?>
     <?php include_once "{$_(PATH_APPLICATION)}/views/components/home/Category_Pageination_Component.php" ?>
</div>