<?php
$email = "";

if ($data['error']['info'] != "") { ?>
	<?php $email = $data['error']['data']['email']; ?>
	<script>
		swal({
			title: "<?php echo $data["error"]["info"] ?>",
			icon: "error",
			button: "Oki!"
		});
	</script>
<?php } ?>

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="/public/img/login-img-01.png" alt="IMG">
			</div>

			<form class="login100-form validate-form" method="post" action="/auth/login">
				<span class="login100-form-title">
					Đăng nhập
				</span>

				<div class="wrap-input100 validate-input" data-validate="Email phải theo dạng: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
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
						Login
					</button>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="/auth/register">
						Chưa có tài khoản? Tạo ngay
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>