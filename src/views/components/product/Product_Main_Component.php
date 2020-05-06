<main class="container">
     <?php
     switch ($data["page"]) {
          case 'detail':
               include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_Item_Detail_Component.php";
               break;
          case 'category':
               include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_Category_Component.php";
               break;
          default:
               include_once "{$_(PATH_APPLICATION)}/views/components/product/Product_List_Component.php";
               break;
     }
     ?>
</main>