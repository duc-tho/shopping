<!DOCTYPE html>
<html lang="vi">

<head>
     <?php include_once "{$_(PATH_APPLICATION)}\\views\components\common\Head_Component.php" ?>
</head>

<body>
     <?php include_once "{$_(PATH_APPLICATION)}\\views\components\common\Totop_Component.php" ?>
     <div class="container">
          <?php
          switch ($data["page"]) {
               case 'addProduct':
                    include_once "{$_(PATH_APPLICATION)}\\views\components\admin\Add_Product_Component.php";
                    break;

               default:
                    break;
          }
          ?>
     </div>
</body>