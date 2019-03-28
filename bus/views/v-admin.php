<?php  
	$ten = "<h7 style='color: #D02090;'>$_SESSION[ten]</h7>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="http://xe-buyt.com/favicon.ico" />
	<title>Trang quản lý</title>
	<link rel="stylesheet" href="./public/core/css/all.min.css">
    <link rel="stylesheet" href="./public/core/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./public/core/css/style-admin.css">
	<link rel="stylesheet" href="./public/core/css/bootstrap.css">
</head>
<body class="container">
	<div id="top">
		<h3>Xin chào <?php echo $ten; ?>, <a href="./logout.php">Đăng xuất</a></h3>
	</div>
	<div id="menu" class="mt-3">
		<ul>
			<li style="width: 277px;"><a id="nd" name="qlnd" href="#" onclick="change_color_tx()">Quản lý người dùng</a></li>
			<li style="width: 277px;"><a id="ph" name="qlph" href="#" onclick="change_color_px()">Phản hồi</a></li>
			<li style="width: 277px;"><a id="dv" name="qlnvbvt" href="#" onclick="change_color_nvbvt()">Quản lý đặt vé</a></li>
			<li style="width: 277px;"><a id="dmk" name="dmk" href="#" onclick="change_color_dmk()">Đổi mật khẩu</a></li>
		</ul>
	</div>
	<div style="clear: left;"></div>

	<div id="admin">
		<!-- Du lieu ajax -->
	</div>
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
	<script src="./public/core/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#nd').click(function(e) {
                e.preventDefault();
                $('#admin').load('public/library/admin/user/ajax-user.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#ph').click(function(e) {
                e.preventDefault();
                $('#admin').load('public/library/admin/phanhoi/ajax-phanhoi.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dv').click(function(e) {
                e.preventDefault();
                $('#admin').load('public/library/admin/datve/ajax-datve.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dmk').click(function(e) {
                e.preventDefault();
                $('#admin').load('public/library/ajax-dmk.php');
            });
        });
    </script>

    <script language="javascript">
		function change_color_tx()
	    {
	      document.getElementById("nd").style.color = 'blue';
	      document.getElementById("ph").style.color = 'white';
	      document.getElementById("dv").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_px()
	    {
	      document.getElementById("nd").style.color = 'white';
	      document.getElementById("ph").style.color = 'blue';
	      document.getElementById("dv").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_nvbvt()
	    {
	      document.getElementById("nd").style.color = 'white';
	      document.getElementById("ph").style.color = 'white';
	      document.getElementById("dv").style.color = 'blue';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_dmk()
	    {
	      document.getElementById("nd").style.color = 'white';
	      document.getElementById("ph").style.color = 'white';
	      document.getElementById("dv").style.color = 'white';
	      document.getElementById("dmk").style.color = 'blue';
	    }
	</script>

	<div id="bottom" >Copyright By Công Nghệ Web TLU</div>

</body>
<script src="public/core/js/jquery-3.2.1.min.js"></script>
</html>