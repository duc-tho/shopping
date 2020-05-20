//Product Data
let productData = []

//Cart - Product
let cartItemList = document.querySelector('#ms-cart-item');
let cartCount = document.querySelector('#ms-cart-count');

setEventForAllAddToCartButton();
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
     let id = rootElement.querySelector("#ms-product-name > a").href.split("/").pop();

     swal({
          title: 'Bạn có chắc là muốn xóa sản phẩm này khỏi giỏ hàng không?',
          icon: 'warning',
          buttons: true,
          dangerMode: true
     }).then((result) => {
          if (result) {
               axios.post(`/cart/delete/${id}`).then(res => {
                    if (res.data == "needReload") {
                         location.reload();
                    }
               });

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

     let productId = rootElement.querySelector('#ms-product-name').href.split("/").pop();

     saveData(productId);

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
          <div class="dropdown-divider"></div>
          <a href="/cart" class="dropdown-item h6 text-center mb-0 py-2">Xem giỏ hàng</a><div class="dropdown-divider"></div>`;

          currentData.forEach(item => {
               let product = {
                    name: item.name,
                    price: item.price,
                    image: item.image,
                    count: item.count,
                    time: item.time,
                    id: item.id
               }

               renderCardItem(product);
          });

          cartItemList.innerHTML += `<div class="dropdown-divider"></div>
          <a href="/cart" class="dropdown-item h6 text-center mb-0 py-2">Xem giỏ hàng</a>`;

          cartCount.innerText = document.querySelectorAll('#ms-delete-product-from-cart').length;
          setEventForAllDeleteFromCartButton();
     });
}

function renderCardItem(product) {
     let total = (parseFloat(product.price.slice(1)) * product.count);

     cartItemList.innerHTML += `<div class="dropdown-item px-3">
          <div class="d-flex justify-content-between align-items-center">
               <img style="max-width: 80px;" src="${product.image}" alt="Ảnh Minh Họa">
               <div class="d-inline-flex flex-column align-middle mx-2" style="flex-grow: 1;">
                    <span id="ms-product-name">
                         <a style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 250px; display: block;" href="/product/detail/${product.id}">${product.name}</a> 
                    </span>
                    <small class="text-danger"><del>${currencyFormat(product.price)}</del></small>
                    <span class="text-success">${currencyFormat(total)} <span class="badge badge-info">${product.count} sản phẩm</span></span>
                    <span class="text-secondary">${product.time}</span>
               </div>
               <button id="ms-delete-product-from-cart" class="btn btn-danger" style="flex-grow: 0;">Xóa</button>
          </div>
     </div>`
}

function currencyFormat(num) {
     return (
          num.toString().replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + ' đ'
     )
}

function saveData(productId) {
     axios.post(`/cart/set/${productId}`);

     loadCart();
}