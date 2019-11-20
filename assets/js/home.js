//Call Owl CarouSel
$(document).ready(function () {
     $(".owl-carousel").owlCarousel({
          items: 1,
          loop: true,
          dots: true,
          dotsEach: true,
          autoplay: true,
          autoplayHoverPause: true
     });
});

//login
let btnLogin = document.getElementById("ms-login");
let btnLogout = document.getElementById("ms-logout");


//parentNode.parentNode.querySelector('#ms-product-price').textContent.replace(/\s/g, "")
/*let cartCount = () => {
     let countElement = document.getElementById('cart-count');
     let parentElement = document.querySelectorAll('#delete-product');
     let cartElement = document.getElementById('cart-list');

     if (parentElement.length) {
          countElement.innerText = parentElement.length;
     } else {
          countElement.innerText = parentElement.length;
          cartElement.innerHTML += "<span class='dropdown-item text-secondary'>Bạn chưa thêm sản phẩm nào</span>";
     }
}

cartCount();

btnLogin.addEventListener("click", () => {
     swal("Tên Đăng nhập", {
          content: "input",
     }).then((username) => {
          if (username) {
               if (username.toLowerCase() == "mei") {
                    swal(`Hi! ${username}, Hãy nhập mật khẩu`, {
                         content: "input",
                    }).then((password) => {
                         if (password) {
                              if (password.toLowerCase() == "123") {
                                   swal({
                                        title: "Đăng nhập thành công!",
                                        icon: "success",
                                        button: "Yay!"
                                   }).then(() => {
                                        btnLogin.style.setProperty("display", "none", "important");
                                        btnLogout.style.setProperty("display", "list-item", "important");
                                   });
                              } else {
                                   swal({
                                        title: "Sai mật khẩu!",
                                        icon: "error",
                                        button: ":(("
                                   });
                              }
                         } else {
                              swal({
                                   title: "Không được để trống mật khẩu!",
                                   icon: "info",
                                   button: "Nah!"
                              });
                         }
                    });
               } else {
                    swal({
                         title: "Tài khoản không tồn tại!",
                         icon: "error",
                         button: ":(("
                    });
               }
          } else {
               swal({
                    title: "Không được để trống tên đăng nhập!",
                    icon: "info",
                    button: "Nah!"
               });
          }
     });
});

btnLogout.addEventListener("click", () => {
     swal({
          title: 'Bạn có chắc là muốn đăng xuất không?',
          icon: 'warning',
          buttons: true,
          dangerMode: true
     }).then((result) => {
          if (result) {
               swal({
                    title: "Đăng xuất thành công!",
                    icon: "success",
                    button: "Yay!"
               }).then(() => {
                    btnLogin.style.setProperty("display", "list-item", "important");
                    btnLogout.style.setProperty("display", "none", "important");
               });
          }
     })
});

// Delete Product from Cart
document.querySelectorAll('#delete-product').forEach(item => {
     let thisItem = item.parentElement.parentElement;

     item.addEventListener('click', () => {
          swal({
               title: 'Bạn có chắc là muốn xóa sản phẩm này khỏi giỏ hàng không?',
               icon: 'warning',
               buttons: true,
               dangerMode: true
          }).then((result) => {
               if (result) {
                    thisItem.remove();

                    swal({
                         title: "Xóa thành công!",
                         icon: "success",
                         button: "Yay!"
                    });

                    cartCount();
               }
          });
     });
});
*/
