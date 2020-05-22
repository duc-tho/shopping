<!DOCTYPE html>
<html lang="vi">

<head>
     <?php include_once "{$_(PATH_APPLICATION)}/views/components/common/Head_Component.php" ?>
</head>

<body>
     <main>
          <?php
          switch ($data["page"]) {
               case 'register':
                    include_once "{$_(PATH_APPLICATION)}/views/components/login/Register_Component.php";
                    break;
               default:
                    include_once "{$_(PATH_APPLICATION)}/views/components/login/Login_Component.php";
                    break;
          }
          ?>
     </main>
     <?php include_once "{$_(PATH_APPLICATION)}/views/components/common/JS_Import_Component.php" ?>
</body>