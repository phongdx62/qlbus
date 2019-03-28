<?php
	session_start();
	include("../../../../models/m-dieuhanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '2')
	{
		if(isset($_POST["tentuyen"]) && !empty($_POST["tentuyen"]) && isset($_POST["giobd"]) && !empty($_POST["giobd"]) && isset($_POST["giokt"]) && !empty($_POST["giokt"]) && isset($_POST["tansuat"]) && !empty($_POST["tansuat"]) && isset($_POST["soluong"]) && !empty($_POST["soluong"]))
		{
			$tx = new m_dieuhanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tentuyen = addslashes(stripslashes($_POST["tentuyen"]));
			$giobd = addslashes(stripslashes($_POST["giobd"]));
			$giokt = addslashes(stripslashes($_POST["giokt"]));
			$tansuat = addslashes(stripslashes($_POST["tansuat"]));
			$soluong = addslashes(stripslashes($_POST["soluong"]));

			$result = $tx->m_add_tuyenxe($tentuyen, $giobd, $giokt, $tansuat, $soluong);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Tuyến xe đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm tuyến xe thành công</p>";
			}
			$tx->disconnect();

		}
	}
	else
	{
		header("Location: ../../../../index.php");
	}
?>
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form action="#" method="post">
	<h2 style="color: #FF9999; margin-left: 154px;">Thêm tuyến xe</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tentuyen" class="form-control is-valid" placeholder="Tên tuyến tx" required >
		</div>
		<div class="row">
			<div class="col-md-3 mb-3" style="margin-top: 8px;">Giờ bắt đầu</div>
			<div class="col-md-9 mb-3">
				<input type="time" class="form-control is-valid" id="giobd" value required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 mb-3" style="margin-top: 8px;">Giờ kết thúc</div>
			<div class="col-md-9 mb-3">
				<input type="time" class="form-control is-valid" id="giokt" value required>
			</div>
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tansuat" class="form-control is-valid" placeholder="Nhà cung cấp" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="soluong" class="form-control is-valid" placeholder="Số lượng tx" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_tuyenxe()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
	</form>
</div>

<script type="text/javascript">
    function ajax_add_tuyenxe(){
        $.ajax({
            url : "public/library/dieuhanh/tuyenxe/add-tuyenxe.php",
            type : "post",
            dataType:"text",
            data : {
                tentuyen : $('#tentuyen').val(),
                giobd : $('#giobd').val(),
                giokt : $('#giokt').val(),
                tansuat : $('#tansuat').val(),
                soluong : $('#soluong').val()
            },
            success : function (result){
                $('#add-tuyenxe').html(result);
            }
        });
    }
</script>