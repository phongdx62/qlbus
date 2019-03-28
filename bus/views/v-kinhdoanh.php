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
			<li style="width: 222px;"><a id="vn" name="vn" href="#" onclick="change_color_vn()">Quản lý vé ngày</a></li>
			<li style="width: 222px;"><a id="bvn" name="bvn" href="#" onclick="change_color_bvn()">Quản lý bán vé ngày</a></li>
			<li style="width: 222px;"><a id="vt" name="vt" href="#" onclick="change_color_vt()">Quản lý vé tháng</a></li>
			<li style="width: 222px;"><a id="bvt" name="bvt" href="#" onclick="change_color_bvt()">Quản lý bán vé tháng</a></li>
			<li style="width: 222px;"><a id="dmk" name="dmk" href="#" onclick="change_color_dmk()">Đổi mật khẩu</a></li>
		</ul>
	</div>
	<div style="clear: left;"></div>

	<div id="kinhdoanh">

	</div>
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
   
		<script type="text/javascript">
            $(document).ready(function() {
                $('#vn').click(function(e) {
                    e.preventDefault();
                    $('#kinhdoanh').load('public/library/kinhdoanh/vengay/ajax-vengay.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#bvn').click(function(e) {
                    e.preventDefault();
                    $('#kinhdoanh').load('public/library/kinhdoanh/banvengay/ajax-banvengay.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#vt').click(function(e) {
                    e.preventDefault();
                    $('#kinhdoanh').load('public/library/kinhdoanh/vethang/ajax-vethang.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#bvt').click(function(e) {
                    e.preventDefault();
                    $('#kinhdoanh').load('public/library/kinhdoanh/banvethang/ajax-banvethang.php');
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dmk').click(function(e) {
                    e.preventDefault();
                    $('#kinhdoanh').load('public/library/ajax-dmk.php');
                });
            });
        </script>
	
    <script language="javascript">
		function change_color_vn()
	    {
	      document.getElementById("vn").style.color = 'blue';
	      document.getElementById("bvn").style.color = 'white';
	      document.getElementById("vt").style.color = 'white';
	      document.getElementById("bvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_bvn()
	    {
	      document.getElementById("vn").style.color = 'white';
	      document.getElementById("bvn").style.color = 'blue';
	      document.getElementById("vt").style.color = 'white';
	      document.getElementById("bvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_vt()
	    {
	      document.getElementById("vn").style.color = 'white';
	      document.getElementById("bvn").style.color = 'white';
	      document.getElementById("vt").style.color = 'blue';
	      document.getElementById("bvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_bvt()
	    {
	      document.getElementById("vn").style.color = 'white';
	      document.getElementById("bvn").style.color = 'white';
	      document.getElementById("vt").style.color = 'white';
	      document.getElementById("bvt").style.color = 'blue';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_dmk()
	    {
	      document.getElementById("vn").style.color = 'white';
	      document.getElementById("bvn").style.color = 'white';
	      document.getElementById("vt").style.color = 'white';
	      document.getElementById("bvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'blue';
	    }
	</script>

	<div id="bottom" >Copyright By Công Nghệ Web TLU</div>

</body>
</html