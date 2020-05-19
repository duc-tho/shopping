<?php
$productCount = $data["info"]["productCount"];
$categoryCount = $data["info"]["categoryCount"];
?>

<div class="d-flex justify-content-around align-items-center">
     <div class="btn btn-primary" style="padding: 30px 0; width: 200px; border-radius: 10px;">
          <h3><?php echo $productCount; ?></h3>
          <h5>Sản phẩm</h5>
     </div>
     <div class="btn btn-danger" style="padding: 30px 0; width: 200px; border-radius: 10px;">
          <h3><?php echo $categoryCount; ?></h3>
          <h5>Danh Mục</h5>
     </div>
</div>