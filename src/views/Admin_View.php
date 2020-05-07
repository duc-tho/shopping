<!DOCTYPE html>
<html lang="vi">

<head>
     <?php include_once "{$_(PATH_APPLICATION)}/views/components/common/Head_Component.php" ?>
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>

<body>
     <?php include_once "{$_(PATH_APPLICATION)}/views/components/common/Totop_Component.php" ?>
     <div class="container d-flex align-items-center justify-content-center flex-column" style="min-height: 100vh;">
          <?php
          switch ($data["page"]) {
               case 'addProduct':
                    include_once "{$_(PATH_APPLICATION)}/views/components/admin/Add_Product_Component.php";
                    break;

               default:
                    include_once "{$_(PATH_APPLICATION)}/views/components/admin/Admin_Main_Component.php";
                    break;
          }
          ?>
     </div>
</body>