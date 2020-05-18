<!-- <a class="btn btn-success" href="/admin/addProduct">Thêm sản phẩm</a> -->
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
     <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin">Mei shop Admin</a>
</nav>

<div class="container-fluid">
     <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
               <div class="sidebar-sticky">
                    <ul class="nav flex-column mt-1">
                         <li class="nav-item">
                              <a class="nav-link active" href="/admin/product">Sản phẩm</a>
                              <hr class="py-0">
                              <a class="nav-link" href="/admin/user">User</a>
                              <hr class="py-0">
                              <a class="nav-link" href="/admin/category">Danh Mục</a>
                         </li>
                    </ul>
               </div>
          </nav>

          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
               <?php
               switch ($data["page"]) {
                    case 'addProduct':
                         include_once "{$_(PATH_APPLICATION)}/views/components/admin/Add_Product_Component.php";
                         break;
                    case 'manageProduct':
                         include_once "{$_(PATH_APPLICATION)}/views/components/admin/Manage_Product_Component.php";
                         break;
                    default:
                         include_once "{$_(PATH_APPLICATION)}/views/components/admin/Admin_Home_Component.php";
                         break;
               }
               ?>
          </main>
     </div>
</div>