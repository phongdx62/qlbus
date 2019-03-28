<?php
	include("../../../../models/m-dieuhanh.php");

	if(isset($_POST["matuyen"]))
	{
		$matuyen = addslashes(stripslashes($_POST["matuyen"]));

		$tx = new m_dieuhanh();
		$row = $tx->m_get_tuyenxe($matuyen);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 104px;">Sửa thông tin tuyến xe</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên tuyến</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tentuyen" class="form-control is-valid" placeholder="Tên tuyến" value="<?php echo $row['tentuyen']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Giờ bắt đầu</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="time"  id="giobd" class="form-control is-valid" placeholder="Giờ bắt đầu" value="<?php echo $row['giobd']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Giờ kết thúc</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputEmail" class="sr-only"></label>
						<input type="time"  id = "giokt" class="form-control is-valid" placeholder="Giờ kết thúc" value="<?php echo $row['giokt']; ?>" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tần suất</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tansuat" class="form-control is-valid" placeholder="Tần suất" value="<?php echo $row['tansuat']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số lượng xe</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="soluongxe" class="form-control is-valid" placeholder="Số lượng xe" value="<?php echo $row['soluongxe']; ?>" required >
					</div>
				</div>
			<br>
			<center><button type="button" id="ajax-edit-tuyenxe" name="<?php echo $matuyen; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-tuyenxe').click(function(e) {
            e.preventDefault();
            $('#dieuhanh').load('public/library/dieuhanh/tuyenxe/ajax-tuyenxe.php');
        });
    });

    $(document).on('click', '#ajax-edit-tuyenxe', function(){
		var matuyen = $(this).attr('name');
		var tentuyen = $('#tentuyen').val();
        var giobd = $('#giobd').val();
        var giokt = $('#giokt').val();
        var tansuat = $('#tansuat').val();
        var soluongxe = $('#soluongxe').val();

		$.ajax({
			url: 'public/library/dieuhanh/tuyenxe/ajax-tuyenxe.php',
			type: 'POST',
			data: {
				matuyen: matuyen,
				tentuyen: tentuyen,
				giobd: giobd,
				giokt: giokt,
				tansuat: tansuat,
				soluongxe: soluongxe
			},
			success: function(kq){
				$('#dieuhanh').html(kq);
			}
		})
	});
</script>