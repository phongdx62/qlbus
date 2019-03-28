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
			<li style="width: 222px;"><a id="xe" href="#" onclick="change_color_xe()">Quản lý xe</a></li>
			<li style="width: 222px;"><a id="tx" href="#" onclick="change_color_tx()">Quản lý tuyến xe</a></li>
			<li style="width: 222px;"><a id="lt" href="#" onclick="change_color_lt()">Quản lý lưu thông</a></li>
			<li style="width: 222px;"><a id="hd" href="#" onclick="change_color_hd()">Quản lý hoạt động</a></li>
			<li style="width: 222px;"><a id="dmk" href="#" onclick="change_color_dmk()">Đổi mật khẩu</a></li>
		</ul>
	</div>
	<div style="clear: left;"></div>

	<div id="dieuhanh">

	</div>
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
   
		<script type="text/javascript">
            $(document).ready(function() {
                $('#xe').click(function(e) {
                    e.preventDefault();
                    $('#dieuhanh').load('public/library/dieuhanh/xe/ajax-xe.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tx').click(function(e) {
                    e.preventDefault();
                    $('#dieuhanh').load('public/library/dieuhanh/tuyenxe/ajax-tuyenxe.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#lt').click(function(e) {
                    e.preventDefault();
                    $('#dieuhanh').load('public/library/dieuhanh/luuthong/ajax-luuthong.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#hd').click(function(e) {
                    e.preventDefault();
                    $('#dieuhanh').load('public/library/dieuhanh/hoatdong/ajax-hoatdong.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dmk').click(function(e) {
                    e.preventDefault();
                    $('#dieuhanh').load('public/library/ajax-dmk.php');
                });
            });
        </script>
	
    <script language="javascript">
		function change_color_xe()
	    {
	      document.getElementById("xe").style.color = 'blue';
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("lt").style.color = 'white';
	      document.getElementById("hd").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_tx()
	    {
	      document.getElementById("xe").style.color = 'white';
	      document.getElementById("tx").style.color = 'blue';
	      document.getElementById("lt").style.color = 'white';
	      document.getElementById("hd").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_lt()
	    {
	      document.getElementById("xe").style.color = 'white';
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("lt").style.color = 'blue';
	      document.getElementById("hd").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_hd()
	    {
	      document.getElementById("xe").style.color = 'white';
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("lt").style.color = 'white';
	      document.getElementById("hd").style.color = 'blue';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_dmk()
	    {
	      document.getElementById("xe").style.color = 'white';
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("lt").style.color = 'white';
	      document.getElementById("hd").style.color = 'white';
	      document.getElementById("dmk").style.color = 'blue';
	    }
	</script>

	<div id="bottom" >Copyright By Công Nghệ Web TLU</div>

</body>
</html