<?php
	include("../../../../models/m-nhansu.php");

	if(isset($_POST["mapx"]))
	{
		$mapx = addslashes(stripslashes($_POST["mapx"]));

		$px = new m_nhansu();
		$row = $px->m_get_px($mapx);
		$px1 = new m_nhansu();
		$sql = "SELECT matuyen, tentuyen FROM tuyen";
		$px1->query($sql);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 114px;">Sửa thông tin phụ xe</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên phụ xe</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tenpx" class="form-control is-valid" placeholder="Tên phụ xe" value="<?php echo $row['tenpx']; ?>" required >
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
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="cmnd" class="form-control is-valid" placeholder="Số CMND" value="<?php echo $row['cmnd']; ?>" required >
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
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã tuyến</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="matuyen">
									<option value="<?php echo $row['matuyen']; ?>"><?php echo "$row[matuyen] - $row[tentuyen]"; ?></option>
									<?php
										while ($row1 = $px1->fetch_assoc())
										{
											echo "<option value='$row1[matuyen]'>$row1[matuyen] - $row1[tentuyen]</option>";
										}
										$px1->disconnect();
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
						<input type="text"  id="anhpx" class="form-control is-valid" placeholder="Link hình ảnh" value="<?php echo $row['anhpx']; ?>" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-px" name="<?php echo $mapx; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-px').click(function(e) {
            e.preventDefault();
            $('#nhansu').load('public/library/nhansu/phuxe/ajax-phuxe.php');
        });
    });

    $(document).on('click', '#ajax-edit-px', function(){
		var mapx = $(this).attr('name');
        var tenpx = $('#tenpx').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();
        var cmnd = $('#cmnd').val();
        var ngaysinh = $('#ngaysinh').val();
        var luong = $('#luong').val();
        var matuyen = $('#matuyen').val();
        var anhpx = $('#anhpx').val();

		$.ajax({
			url: 'public/library/nhansu/phuxe/ajax-phuxe.php',
			type: 'POST',
			data: {
				mapx: mapx,
				tenpx: tenpx,
				diachi: diachi,
				sdt: sdt,
				cmnd: cmnd,
				ngaysinh: ngaysinh,
				luong: luong,
				matuyen: matuyen,
				anhpx: anhpx
			},
			success: function(kq){
				$('#nhansu').html(kq);
			}
		})
	});
</script>