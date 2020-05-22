<?php
if ($data['status'] != "") { ?>
     <script>
          swal({
               title: "<?php echo $data['status'] ?>",
               icon: "success",
               button: "Ok"
          }).then(() => {
               location.href = "/auth/login";
          });
     </script>
<?php } ?>

<div class="limiter">
     <div class="container-login100">
          <div class="wrap-login100">
               <div class="login100-pic js-tilt" data-tilt>
                    <img src="/public/img/login-img-01.png" alt="IMG">
               </div>

               <form class="login100-form validate-form" method="post" action="/auth/register">
                    <span class="login100-form-title">
                         Đăng Ký
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Họ và tên">
                         <input class="input100" type="text" name="name" placeholder="Họ và Tên">
                         <span class="focus-input100"></span>
                         <span class="symbol-input100">
                              <i class="fa fa-address-card" aria-hidden="true"></i>
                         </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email phải theo dạng: ex@abc.xyz">
                         <input class="input100" type="text" name="email" placeholder="Email">
                         <span class="focus-input100"></span>
                         <span class="symbol-input100">
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                         </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Hãy nhập Tên đăng nhập">
                         <input class="input100" type="text" name="username" placeholder="Tên đăng nhập">
                         <span class="focus-input100"></span>
                         <span class="symbol-input100">
                              <i class="fa fa-user" aria-hidden="true"></i>
                         </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Hãy nhập mật khẩu">
                         <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                         <span class="focus-input100"></span>
                         <span class="symbol-input100">
                              <i class="fa fa-lock" aria-hidden="true"></i>
                         </span>
                    </div>

                    <div class="container-login100-form-btn">
                         <button class="login100-form-btn" name="submit">
                              Register
                         </button>
                    </div>

                    <div class="text-center p-t-100">
                         <a class="txt2" href="/auth/login">
                              Đã có tài khoản? Đăng nhập ngay
                         </a>
                    </div>
               </form>
          </div>
     </div>
</div>