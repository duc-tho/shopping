<?php
foreach ($data['category'] as $item) {
     $cateId = $item["CateID"];
     $name = $item["CategoryName"];
     $picture = $item["Picture"];
?>

     <div class="col-lg-3 col-sm-6 my-1 mx-auto">
          <a href="/product/category/<?php echo $cateId ?>" class="btn btn-light w-100">
               <img class="d-inline-block" src="<?php echo $picture ?>" width="70px">
               <h5 class="ms-white-space-nowrap d-inline ml-3"><?php echo $name ?></h5>
          </a>
     </div>

<?php } ?>