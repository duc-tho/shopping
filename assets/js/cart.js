//Product Data
let productData = [{
     "name": "A-D-D",
     "price": "¥82.44",
     "saleOff": 18
}, {
     "name": "ATACAND",
     "price": "¥10.60",
     "saleOff": 46
}, {
     "name": "Duloxetine Hydrochloride",
     "price": "¥28.59",
     "saleOff": 31
}, {
     "name": "Labetalol HCl",
     "price": "¥33.44",
     "saleOff": 87
}, {
     "name": "Pedia Relief",
     "price": "¥37.45",
     "saleOff": 8
}, {
     "name": "Levocarnitine",
     "price": "¥26.69",
     "saleOff": 45
}, {
     "name": "Heparin Sodium in Dextrose",
     "price": "¥76.86",
     "saleOff": 91
}, {
     "name": "Diphenhydramine HCl",
     "price": "¥89.31",
     "saleOff": 58
}, {
     "name": "Epinephrine",
     "price": "¥88.39",
     "saleOff": 69
}, {
     "name": "The Natural Dentist",
     "price": "¥38.57",
     "saleOff": 18
}, {
     "name": "Bodycology",
     "price": "¥86.81",
     "saleOff": 47
}, {
     "name": "Gallbladder Liver Meridian Opener",
     "price": "¥16.99",
     "saleOff": 18
}, {
     "name": "Gelato APF",
     "price": "¥25.87",
     "saleOff": 10
}, {
     "name": "Ulta Nectarine Spice Anti-Bacterial Gentle Foaming",
     "price": "¥31.43",
     "saleOff": 75
}, {
     "name": "XtraCare Anti-Dandruff Hair Cleanse",
     "price": "¥47.12",
     "saleOff": 81
}, {
     "name": "Torsemide",
     "price": "¥18.92",
     "saleOff": 45
}]

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
          image: rootElement.querySelector('#ms-product-image').src
     }

     saveData(product);

     swal({
          title: "Thêm vào giỏ hàng thành công",
          icon: "success",
          button: "yay!"
     });
}

function loadCart() {
     let currentData = JSON.parse(localStorage.cart);

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
     let currentData = JSON.parse(localStorage.cart);
     let checkData = currentData.find(i => { return i.name == newData.name });

     if (!checkData) {
          newData.count = 1;
          newData.time = getTime();
          currentData.push(newData);
     } else {
          checkData.count++;
     }

     localStorage.setItem("cart", JSON.stringify(currentData));

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

     return `${checkNum(hour)}:${checkNum(min)} T${date} ${checkNum(day)}/${checkNum(month)}/${year}`;
}

function checkNum(item) {
     if (parseInt(item) < 10) {
          return `0${item}`
     }

     return item;
}

function loadProduct() {
     productData.forEach(item => {
          let total = parseFloat(item.price.slice(1));
          let percent = item.saleOff
          let saleOff = (total - (total * percent / 100)).toFixed(2);

          productList.innerHTML += `<div class="col-md-6 col-lg-3 my-2">
               <div class="card ms-hover">
                    <div class="card-img-top ms-center-image my-4" style="height: 250px;">
                         <img id="ms-product-image" class="mw-100 mh-100" src="../img/Product/1.jpg" alt="Ảnh minh họa">
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-8 text-center text-md-left"
                                   style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                   <h5 class="card-title d-inline text-center">
                                        <a id="ms-product-name" href="#">${item.name}</a>
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