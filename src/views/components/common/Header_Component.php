<header>
     <nav class="navbar navbar-expand-lg navbar-dark ms-bg-dark">
          <img src="/public/img/Logo_Min.png" alt="Logo" class="navbar-brand img-fluid">
          <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-content" aria-expanded="true" aria-label="Toggle navigation">
               <i class="fas fa-th-large text-light"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbar-content">
               <ul class="navbar-nav ms-white-space-nowrap text-center">
                    <li class="nav-item">
                         <a href="/" class="nav-link">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                         <a href="/product" class="nav-link">Sản Phẩm</a>
                    </li>
               </ul>
               <form class="d-inline mx-2 my-auto w-100">
                    <div class="input-group">
                         <input type="text" class="form-control border border-right-0" placeholder="Tìm kiếm sản phẩm">
                         <span class="input-group-append">
                              <button class="btn btn-outline-light border border-left-0" type="button">
                                   <i class="fa fa-search"></i>
                              </button>
                         </span>
                    </div>
               </form>
               <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                         <a href="#" data-toggle="dropdown" class="btn btn-light nav-link ms-text-dark btn-sm mr-lg-2 mb-2 mb-lg-0">
                              <i class=" fa fa-cart-plus fa-lg mr-1"></i>
                              <span class="font-weight-bold">Giỏ hàng</span>
                              <span id="ms-cart-count" class="badge badge-primary ml-1">0</span>
                         </a>
                         <div id="ms-cart-item" class="dropdown-menu dropdown-menu-right mt-1" aria-labelledby="dropdownMenuButton" style="max-height: 400px; overflow: auto;">
                              <h4 class="dropdown-header text-center">Các sản phẩm đã thêm vào giỏ</h4>
                              <div class="dropdown-divider"></div>
                              <!-- a class="dropdown-item px-3" href="#">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <img style="max-width: 80px;"
                                                  src="/public/img/Product/1.jpg"
                                                  alt="">
                                             <div class="d-inline-flex flex-column align-middle mx-2"
                                                  style="flex-grow: 1;">
                                                  <span id="ms-product-name">Samsung Galaxy <small class="text-danger">50.000
                                                            </small></span>
                                                  <span class="text-success">¥100.000 <span class="badge badge-info">2
                                                            sản
                                                            phẩm</span></span>
                                                  <span class="text-secondary">2:01 AM T3:19/11/2019</span>
                                             </div>
                                             <button id="ms-delete-product-from-cart" class="btn btn-danger"
                                                  style="flex-grow: 0;">Xóa</button>
                                        </div>
                              </a -->
                              <div class="dropdown-divider"></div>
                              <a href="/cart" class="dropdown-item h4 text-center">Xem giỏ hàng</a>
                         </div>
                    </li>
                    <li class="nav-item" id="ms-login">
                         <a href="#" class="nav-link btn btn-light btn-sm ms-text-dark"><i class="fa fa-sign-in-alt fa-lg"></i></a>
                    </li>
                    <li class="nav-item d-none" id="ms-logout">
                         <a href="#" id="ms-logout" class="nav-link btn btn-light btn-sm ms-text-dark"><i class="fa fa-sign-out-alt fa-lg"></i></a>
                    </li>
               </ul>
          </div>
     </nav>
</header>