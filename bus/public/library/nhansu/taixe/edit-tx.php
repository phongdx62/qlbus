<?php
	include("../../../../models/m-nhansu.php");

	if(isset($_POST["matx"]))
	{
		$matx = addslashes(stripslashes($_POST["matx"]));

		$tx = new m_nhansu();
		$row = $tx->m_get_tx($matx);
		$tx1 = new m_nhansu();
		$sql = "SELECT matuyen, tentuyen FROM tuyen";
		$tx1->query($sql);
	}
?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">
			<h2 style="color: #FF9999; margin-left: 125px;">Sửa thông tin tài xế</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên tài xế</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tentx" class="form-control is-valid" placeholder="Tên nhân viên" value="<?php echo $row['tentx']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Địa chỉ</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="diachi" class="form-control is-valid" placeholder="Địa chỉ" value="<?php echo $row['diachi']; ?>" required >
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
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số CMND</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputEmail" class="sr-only"></label>
						<input type="cmnd"  id = "cmnd" class="form-control is-valid" placeholder="Số CMND" value="<?php echo $row['cmnd']; ?>" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Ngày sinh</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="date"  id="ngaysinh" class="form-control is-valid" placeholder="Ngày sinh" value="<?php echo $row['ngaysinh']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Lương</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="luong" class="form-control is-valid" placeholder="Lương" value="<?php echo $row['luong']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Loại bằng</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="loaibang" class="form-control is-valid" placeholder="Thưởng" value="<?php echo $row['loaibang']; ?>" required >
					</div>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã tuyến</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="matuyen">
									<option value="<?php echo $row['matuyen']; ?>"><?php echo "$row[matuyen] - $row[tentuyen]"; ?></option>
									<?php
										while ($row1 = $tx1->fetch_assoc())
										{
											echo "<option value='$row1[matuyen]'>$row1[matuyen] - $row1[tentuyen]</option>";
										}
										$tx1->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Link hình ảnh</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="anhtx" value="<?php echo $row['anhtx']; ?>" class="form-control is-valid" placeholder="Link hình ảnh" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-tx" name="<?php echo $matx; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-tx').click(function(e) {
            e.preventDefault();
            $('#nhansu').load('public/library/nhansu/taixe/ajax-taixe.php');
        });
    });

    $(document).on('click', '#ajax-edit-tx', function(){
		var matx = $(this).attr('name');
        var tentx = $('#tentx').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();
        var cmnd = $('#cmnd').val();
        var ngaysinh = $('#ngaysinh').val();
        var luong = $('#luong').val();
        var loaibang = $('#loaibang').val();
        var matuyen = $('#matuyen').val();
        var anhtx = $('#anhtx').val();

		$.ajax({
			url: 'public/library/nhansu/taixe/ajax-taixe.php',
			type: 'POST',
			data: {
				matx: matx,
				tentx: tentx,
				diachi: diachi,
				sdt: sdt,
				cmnd: cmnd,
				ngaysinh: ngaysinh,
				luong: luong,
				loaibang: loaibang,
				matuyen: matuyen,
				anhtx: anhtx
			},
			success: function(kq){
				$('#nhansu').html(kq);
			}
		})
	});
</script>