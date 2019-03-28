<link rel="stylesheet" href="./public/core/css/style-login.css">
<link rel="stylesheet" href="./public/core/css/all.min.css">
<link rel="stylesheet" href="./public/core/css/bootstrap.min.css">
<link rel="stylesheet" href="./public/core/css/style.css">      
<link rel="stylesheet" href="./public/core/css/style-header.css">
<link rel="stylesheet" href="./public/core/css/style-footer.css">
<link rel="icon" href="http://xe-buyt.com/favicon.ico" />
<title>Trang đăng nhập</title>

</head>
<body class="text-center">

	
	<form action="login.php" method="post" class="form-signin">
		
		<img class='mb-3' src='./public/core/image/logo.png'  width='158' height='65'>
		<h1 class='h3 mb-3 font-weight-normal'>Đăng nhập</h1>
		<div class="mb-3">	
			<label for="inputEmail" class="sr-only">Tài khoản</label>
			<input type="text" class="form-control is-valid" id="username" name="tk" placeholder="Tài khoản" required>
			<div class="invalid-feedback">
				Valid first name is required.
			</div>
		</div>
		<div class="mb-3">	
			<label for="inputPassword" class="sr-only">Mật khẩu</label>
			<input type="password" id="inputPassword" name="mk" class="form-control is-valid" placeholder="Mật khẩu" required >
			<div class="invalid-feedback">
				Valid first name is required.
			</div>
		</div>

		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me">
				Ghi nhớ
			</label>
		</div>
		<button class="btn btn-lg btn-success btn-block mb-2" type="submit" name="ok">Đăng nhập</button>
		<a class="register" href="register.php">Đăng ký ngay</a>
		<p class="mt-4 mb-3 text-muted" style="font-size: 15px; opacity: .8;">Copyright 2018-2019</p>
		<?php
			if(isset($err))
			{
				echo $err;
			}
		?>	
	</form>

	
	<div class="go-home fixed-bottom" style="bottom: 1rem; left: 94%;">
	    <a href="./index.php"><i class="fas fa-home fa-3x " style="color: #3ea24c;"></i></a>
	</div>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   	<script src="./public/core/js/jquery-3.3.1.slim.min.js"></script>
	<script src="./public/core/js/popper.min.js"></script>
	<script src="./public/core/js/bootstrap.min.js"></script>
	<script src="./public/core/js/main.js"></script>
</body>
</html>   