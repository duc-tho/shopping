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
     document.querySelector('#ms-login-form').style.display = "flex";
     animateCSS('#ms-login-form', 'fadeIn');
     animateCSS('#ms-login-form form', 'bounceInUp');
})

formWrap.addEventListener('click', () => {
     animateCSS('#ms-login-form', 'fadeOut');
     animateCSS('#ms-login-form form', 'bounceOutUp', () => {
          document.querySelector('#ms-login-form').style.display = "none";
     });
});