<?php if (strpos($_SERVER['REQUEST_URI'], "/auth") !== false) { ?>
     <!--===============================================================================================-->
     <script src="/public/lib/tilt/tilt.jquery.min.js"></script>
     <script src="/public/lib/select2/select2.min.js"></script>
     <script>
          $('.js-tilt').tilt({
               scale: 1.1
          })
     </script>
     <!--===============================================================================================-->
     <script src="/public/js/login-main.js"></script>
<?php
     return;
}
?>

<script src="/public/js/home.js"></script>
<script src="/public/js/cart.js"></script>