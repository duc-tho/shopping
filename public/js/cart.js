//Product Data
let productData = []

//Cart - Product
let cartItemList = document.querySelector('#ms-cart-item');
let cartCount = document.querySelector('#ms-cart-count');
let productList = document.querySelector('#ms-product-list');

if (!localStorage.cart) {
     localStorage.setItem("cart", "[]");
}

loadProduct();
loadCart();

function setEventForAllAddToCartButton() {
     let allProduct = document.querySelectorAll('#ms-add-to-cart');

     allProduct.forEach(item => {
          item.addEventListener('click', () => {
               addToCart(item);
          })
     });
}

function setEventForAllDeleteFromCartButton() {
     let allDeleteButton = document.querySelectorAll('#ms-delete-product-from-cart');

     allDeleteButton.forEach(item => {
          item.addEventListener('click', () => {
               removeFromCart(item);
          })
     });
}

function removeFromCart(item) {
     let rootElement = item.parentNode.parentNode;
     let temp = rootElement.querySelector('#ms-product-name').textContent.split(' ');
     let index;
     let currentData = JSON.parse(localStorage.cart);

     temp.pop();

     nameProduct = temp.join(' ');

     currentData.filter((item, i) => {
          if (item.name == nameProduct) index = i;
     });

     swal({
          title: 'Bạn có chắc là muốn xóa sản phẩm này khỏi giỏ hàng không?',
          icon: 'warning',
          buttons: true,
          dangerMode: true
     }).then((result) => {
          if (result) {
               currentData.splice(index, 1);

               localStorage.setItem("cart", JSON.stringify(currentData));

               swal({
                    title: "Xóa thành công",
                    icon: "success",
                    button: "yay!"
               });

               loadCart();
          }
     });
}

function addToCart(item) {
     let rootElement = item.parentNode.parentNode.parentNode.parentNode;
     let product = {
          name: rootElement.querySelector('#ms-product-name').textContent,
          price: rootElement.querySelector('#ms-product-price').textContent.replace(/\s/g, ""),
          image: rootElement.querySelector('#ms-product-image').src,
          id: rootElement.href.split("/").pop()
     }

     saveData(product);

     swal({
          title: "Thêm vào giỏ hàng thành công",
          icon: "success",
          button: "yay!"
     });
}

function loadCart() {
     axios.get("/cart/get").then(res => {
          currentData = res.data;

          cartItemList.innerHTML = `<h4 class="dropdown-header text-center">Các sản phẩm đã thêm vào giỏ</h4>
          <div class="dropdown-divider"></div>`;

          currentData.forEach(item => {
               let product = {
                    name: item.name,
                    price: item.price,
                    image: item.image,
                    count: item.count,
                    time: item.time
               }

               renderCardItem(product);
          });

          cartCount.innerText = document.querySelectorAll('#ms-delete-product-from-cart').length;
          setEventForAllDeleteFromCartButton();
     });


}

function renderCardItem(product) {
     let total = (parseFloat(product.price.slice(1)) * product.count).toFixed(2);

     cartItemList.innerHTML += `<a class="dropdown-item px-3" href="#">
          <div class="d-flex justify-content-between align-items-center">
               <img style="max-width: 80px;" src="${product.image}" alt="Ảnh Minh Họa">
               <div class="d-inline-flex flex-column align-middle mx-2" style="flex-grow: 1;">
                    <span id="ms-product-name">${product.name} <small class="text-danger">${product.price}</small></span>
                    <span class="text-success">¥${total} <span class="badge badge-info">${product.count} sản phẩm</span></span>
                    <span class="text-secondary">${product.time}</span>
               </div>
               <button id="ms-delete-product-from-cart" class="btn btn-danger" style="flex-grow: 0;">Xóa</button>
          </div>
     </a>`
}

function saveData(newData) {
     // let currentData = JSON.parse(localStorage.cart);
     // let checkData = currentData.find(i => { return i.name == newData.name });

     // if (!checkData) {
     //      newData.count = 1;
     //      newData.time = getTime();
     //      currentData.push(newData);
     // } else {
     //      checkData.count++;
     // }

     // localStorage.setItem("cart", JSON.stringify(currentData));
     axios.post("/cart/set", newData);

     loadCart();
}

function getTime() {
     let now = new Date();
     let day = now.getDate();
     let hour = now.getHours();
     let min = now.getMinutes();
     let date = now.getDay();
     let month = now.getMonth() + 1;
     let year = now.getUTCFullYear();

     return `${checkNum(hour)}:${checkNum(min)} T${date + 1} ${checkNum(day)}/${checkNum(month)}/${year}`;
}

function checkNum(item) {
     if (parseInt(item) < 10) {
          return `0${item}`
     }

     return item;
}

function loadProduct() {
     if (!productList) return;

     productData.forEach(item => {
          let total = parseFloat(item.price.slice(1));
          let percent = item.saleOff
          let saleOff = (total - (total * percent / 100)).toFixed(2);

          productList.innerHTML += `<div class="col-md-6 col-lg-3 my-2">
               <div class="card ms-hover">
                    <div class="card-img-top ms-center-image my-4 ms-zoom" style="height: 250px;">
                         <img id="ms-product-image" class="mw-100 mh-100" src="../img/Product/1.jpg" alt="Ảnh minh họa">
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-8 text-center text-md-left"
                                   style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                   <h5 class="card-title d-inline text-center">
                                        <a id="ms-product-name" href="./cart.php">${item.name}</a>
                                   </h5>
                              </div>
                              <div class="col-4 my-auto">
                                   <div class="badge badge-light w-100 py-2">
                                        4.9 <i class="fa fa-star text-right text-warning" aria-hidden="true"></i>
                                   </div>
                              </div>
                         </div>
                         <hr>
                         <div class="row">
                              <div class="col-8 text-center ms-white-space-nowrap text-md-left">
                                   <span class="text-secondary">${item.price} 
                                        <div class="badge badge-success">-${percent}%</div>
                                   </span>
                                   <h4 id="ms-product-price" class="card-text text-danger">
                                        ¥${saleOff} <i class="fa fa-money-bill-alt"></i>
                                   </h4>
                              </div>
                              <div class="col-4 justify-content-center d-flex">
                                   <button id="ms-add-to-cart" class="btn btn-outline-success h-100">
                                        <i class="fa fa-cart-plus fa-lg"></i>
                                   </button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>`
     });

     productList.innerHTML += `<div class="col-12">
          <ul class="pagination mt-2 mb-0 justify-content-center ms-white-space-nowrap">
               <li class="page-item"><a class="page-link" href="#">Trang đầu</a></li>
               <li class="page-item"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item"><a class="page-link" href="#">Trang cuối</a></li>
          </ul>
     </div-->`

     setEventForAllAddToCartButton();
}