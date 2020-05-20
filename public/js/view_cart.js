let delBtn = document.getElementById("btnDeleteFromCart");
let rootElement = delBtn.parentNode.parentNode.querySelector("tr:nth-child(1) > td:nth-child(2) > a");

function sendDelete() {
     axios.post(`/cart/delete/${rootElement.href.split("/").pop()}`);
     location.reload();
}