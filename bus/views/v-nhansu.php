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
			<li><a id="tx" name="qltx" href="#" onclick="change_color_tx()">Quản lý tài xế</a></li>
			<li><a id="px" name="qlpx" href="#" onclick="change_color_px()">Quản lý phụ xe</a></li>
			<li><a id="nvbvt" name="qlnvbvt" href="#" onclick="change_color_nvbvt()">Quản lý nhân viên bvt</a></li>
			<li><a id="dbvt" name="qldbvt" href="#" onclick="change_color_dbvt()">Quản lý điểm bvt</a></li>
			<li><a id="dmk" name="dmk" href="#" onclick="change_color_dmk()">Đổi mật khẩu</a></li>
		</ul>
	</div>
	<div style="clear: left;"></div>

	<div id="nhansu">
		<!-- Du lieu ajax -->
	</div>
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
	<script src="./public/core/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#tx').click(function(e) {
                e.preventDefault();
                $('#nhansu').load('public/library/nhansu/taixe/ajax-taixe.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#px').click(function(e) {
                e.preventDefault();
                $('#nhansu').load('public/library/nhansu/phuxe/ajax-phuxe.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#nvbvt').click(function(e) {
                e.preventDefault();
                $('#nhansu').load('public/library/nhansu/nhanvienbvt/ajax-nhanvienbvt.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dbvt').click(function(e) {
                e.preventDefault();
                $('#nhansu').load('public/library/nhansu/diembvt/ajax-diembvt.php');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dmk').click(function(e) {
                e.preventDefault();
                $('#nhansu').load('public/library/ajax-dmk.php');
            });
        });
    </script>

    <script language="javascript">
		function change_color_tx()
	    {
	      document.getElementById("tx").style.color = 'blue';
	      document.getElementById("px").style.color = 'white';
	      document.getElementById("nvbvt").style.color = 'white';
	      document.getElementById("dbvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_px()
	    {
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("px").style.color = 'blue';
	      document.getElementById("nvbvt").style.color = 'white';
	      document.getElementById("dbvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_nvbvt()
	    {
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("px").style.color = 'white';
	      document.getElementById("nvbvt").style.color = 'blue';
	      document.getElementById("dbvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_dbvt()
	    {
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("px").style.color = 'white';
	      document.getElementById("nvbvt").style.color = 'white';
	      document.getElementById("dbvt").style.color = 'blue';
	      document.getElementById("dmk").style.color = 'white';
	    }
	    function change_color_dmk()
	    {
	      document.getElementById("tx").style.color = 'white';
	      document.getElementById("px").style.color = 'white';
	      document.getElementById("nvbvt").style.color = 'white';
	      document.getElementById("dbvt").style.color = 'white';
	      document.getElementById("dmk").style.color = 'blue';
	    }
	</script>

	<div id="bottom" >Copyright By Công Nghệ Web TLU</div>

</body>
<script src="public/core/js/jquery-3.2.1.min.js"></script>
</html