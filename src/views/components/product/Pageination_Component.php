<?php
$totalPage = $data['productData']['totalPage'];
$thisPage = $data['productData']['thisPage'];
?>
<!-- <1 3 4 5 10> -->
<nav class="w-100 d-flex justify-content-center pt-2">
     <ul class="pagination">
          <?php if ($thisPage > 1) { ?>
               <li class="page-item">
                    <a class="page-link" href="/product/list/<?php echo $thisPage - 1 ?>" aria-label="Previous">
                         <span aria-hidden="true">Trang Trước</span>
                    </a>
               </li>
               <li class="page-item"><a class="page-link" href="/product/list/1">1</a></li>
               <li class="page-item">
                    <div class="page-link">...</div>
               </li>

               <?php if ($thisPage <= $totalPage && $thisPage > 2) { ?>
                    <li class="page-item"><a class="page-link" href="/product/list/<?php echo $thisPage - 1 ?>"><?php echo $thisPage - 1  ?></a></li>
               <?php } ?>
          <?php } ?>

          <li class="page-item active">
               <div class="page-link"><?php echo $thisPage ?></div>
          </li>


          <?php if ($thisPage < $totalPage) { ?>
               <?php if ($thisPage >= 1 && $thisPage < ($totalPage - 1)) { ?>
                    <li class="page-item"><a class="page-link" href="/product/list/<?php echo $thisPage + 1 ?>"><?php echo $thisPage + 1  ?></a></li>
               <?php } ?>

               <li class="page-item">
                    <div class="page-link">...</div>
               </li>
               <li class="page-item"><a class="page-link" href="/product/list/<?php echo $totalPage ?>"><?php echo $totalPage ?></a></li>
               <li class="page-item">
                    <a class="page-link" href="/product/list/<?php echo $thisPage + 1 ?>" aria-label="Next">
                         <span aria-hidden="true">Trang Sau</span>
                    </a>
               </li>
          <?php } ?>
     </ul>
</nav>