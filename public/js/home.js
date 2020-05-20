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
let formWrap = document.querySelector('#ms-login-form');
let formClsoeBtn = document.querySelector('#ms-login-form-close');

function animateCSS(element, animationName, callback) {
     const node = document.querySelector(element)
     node.classList.add('animated', animationName)

     function handleAnimationEnd() {
          node.classList.remove('animated', animationName)
          node.removeEventListener('animationend', handleAnimationEnd)

          if (typeof callback === 'function') callback()
     }

     node.addEventListener('animationend', handleAnimationEnd)
}

btnLogin.addEventListener('click', () => {
     formWrap.style.display = "flex";
     animateCSS('#ms-login-form', 'fadeIn');
     animateCSS('#ms-login-form form', 'bounceInUp');
})

formClsoeBtn.addEventListener('click', () => {
     animateCSS('#ms-login-form', 'fadeOut');
     animateCSS('#ms-login-form form', 'bounceOutUp', () => {
          formWrap.style.display = "none";
     });
});

//to top
var toTopBtn = document.getElementById("ms-to-top");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
     if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          toTopBtn.style.opacity = 1;
          toTopBtn.style.visibility = "visible";
          toTopBtn.style.display = "block";
     } else {
          toTopBtn.style.opacity = 0;
          toTopBtn.style.visibility = "hidden";
          toTopBtn.style.display = "block";
     }
}

//Search
let searchInput = document.getElementById("searchInput");
let searchOutput = document.getElementById("searchOutput");
let waitTypingDone;

searchInput.addEventListener("input", () => {
     if (searchInput.value.trim() == "") {
          searchOutput.innerHTML = "";
          return;
     };

     clearTimeout(waitTypingDone);
     waitTypingDone = setTimeout(() => {
          axios.post(`/search/get/${searchInput.value.trim().toLowerCase()}`).then(res => {
               let data = res.data;
               searchOutput.innerHTML = "";

               for (let i = 0; i < data.length; i++) {
                    searchOutput.innerHTML += `<li class="px-4 list-group-item">
                         <a  href="/product/detail/${data[i].ProductID}" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; display: block;">${res.data[i].ProductName}</a>
                    </li>`;
               }
          });
     }, 1000);
})