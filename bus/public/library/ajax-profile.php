<?php
	session_start();
	include("../../models/m-admin.php");
	if(isset($_SESSION['id']))
	{
		$user = new m_admin();
		$id = $_SESSION['id'];
		$row = $user->m_get_user($id);
	}
	if(isset($_POST['diachi']) && isset($_POST['email']) && isset($_POST['sdt']) && isset($_POST['matkhaucu']) && isset($_POST['ktmk']))
	{
		$diachi = addslashes(stripslashes($_POST["diachi"]));
		$email = addslashes(stripslashes($_POST["email"]));
		$sdt = addslashes(stripslashes($_POST["sdt"]));
		$matkhaucu = md5(addslashes(stripslashes($_POST["matkhaucu"])));
		$matkhaumoi = md5(addslashes(stripslashes($_POST["matkhaumoi"])));
		$ktmk = md5(addslashes(stripslashes($_POST["ktmk"])));

		if($matkhaucu!=$row['matkhau'])
		{
			$msg = "<p style='color: red;'>* Bạn nhập sai mật khẩu</p>";
		}
		elseif ($ktmk!=$matkhaumoi) 
		{
			$msg = "<p style='color: red;'>* Bạn nhập lại mật khẩu không đúng</p>";
		}
		else
		{
			$user->m_edit_profile($id, $diachi, $sdt, $email, $matkhaumoi);
			$msg = "<p style='color: #CC3366;'>* Bạn đã sửa thông tin cá nhân thành công</p>";
		}
	}


?>
<!-- <link rel="stylesheet" href="./public/core/css/bootstrap.css"> -->
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form method="post">
		<center><h2 style="color: #000;">Thông tin cá nhân</h2></center>
		<br>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Họ và tên : </b></div>
			<div class="col-md-8 mb-3" style="margin-top: 8px;"><b><?php echo $row["ten"]; ?></b></div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tài khoản : </b></div>
			<div class="col-md-8 mb-3" style="margin-top: 8px;"><b><?php echo $row["taikhoan"]; ?></b></div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số CMND : </b></div>
			<div class="col-md-8 mb-3" style="margin-top: 8px;"><b><?php echo $row["cmnd"]; ?></b></div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Địa chỉ</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputEmail" class="sr-only"></label>
				<input type="text"  id = "diachi" class="form-control is-valid" placeholder="Địa chỉ" value="<?php echo $row['diachi']; ?>" required autofocus>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Email</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="text"  id="email" class="form-control is-valid" placeholder="Email" value="<?php echo $row['email']; ?>" required >
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số điện thoại</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="text"  id="sdt" class="form-control is-valid" placeholder="Số điện thoại" value="<?php echo $row['sdt']; ?>" required >
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Mật khẩu cũ</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="password"  id="matkhaucu" class="form-control is-valid" placeholder="Nhập mật khẩu cũ" required >
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Mật khẩu mới</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="password"  id="matkhaumoi" class="form-control is-valid" placeholder="Mật khẩu mới" required >
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Nhập lại mật khẩu</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="password"  id="ktmk" class="form-control is-valid" placeholder="Nhập lại mật khẩu" required >
			</div>
		</div>
		<br>
		<center><button type="button" class="btn btn-warning" onclick="ajax_edit_profile()"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
	</form>
	<br>
	<br>
	<div>
		<?php
			if(isset($msg))
			{
				echo $msg;
			}
		?>
	</div>
</div>

<script type="text/javascript">
    function ajax_edit_profile(){
        $.ajax({
            url : "public/library/ajax-profile.php",
            type : "post",
            dataType:"text",
            data : {
                diachi : $('#diachi').val(),
                email : $('#email').val(),
                sdt : $('#sdt').val(),
                matkhaucu : $('#matkhaucu').val(),
                matkhaumoi : $('#matkhaumoi').val(),
                ktmk : $('#ktmk').val()
            },
            success : function (result){
                $('#dulieu').html(result);
            }
        });
    }
</script>