<main class="container">
     <?php
     if ($data["page"] == "detail") {
          include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_Item_Detail_Component.php";
     } else {
          include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_List_Component.php";
     }
     ?>
</main>