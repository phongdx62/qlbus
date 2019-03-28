<?php
	include("../../../../models/m-nhansu.php");

	if(isset($_POST["manvbvt"]))
	{
		$manvbvt = addslashes(stripslashes($_POST["manvbvt"]));

		$nvbvt = new m_nhansu();
		$row = $nvbvt->m_get_nvbvt($manvbvt);
		$nvbvt1 = new m_nhansu();
		$sql = "SELECT madbvt, tendbvt FROM diembvt";
		$nvbvt1->query($sql);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 65px;">Sửa thông tin nhân viên bvt</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Họ tên nvbvt</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tennvbvt" class="form-control is-valid" placeholder="Họ tên nhân viên bvt" value="<?php echo $row['tennvbvt']; ?>" required >
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
								<select id="madbvt">
									<option value="<?php echo $row['madbvt']; ?>"><?php echo "$row[madbvt] - $row[tendbvt]"; ?></option>
									<?php
										while ($row1 = $nvbvt1->fetch_assoc())
										{
											echo "<option value='$row1[madbvt]'>$row1[madbvt] - $row1[tendbvt]</option>";
										}
										$nvbvt1->disconnect();
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
						<input type="text"  id="anhnvbvt" class="form-control is-valid" placeholder="Link hình ảnh" value="<?php echo $row['anhnvbvt']; ?>" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-nvbvt" name="<?php echo $manvbvt; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-nvbvt').click(function(e) {
            e.preventDefault();
            $('#nhansu').load('public/library/nhansu/nhanvienbvt/ajax-nhanvienbvt.php');
        });
    });

    $(document).on('click', '#ajax-edit-nvbvt', function(){
		var manvbvt = $(this).attr('name');
        var tennvbvt = $('#tennvbvt').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();
        var cmnd = $('#cmnd').val();
        var ngaysinh = $('#ngaysinh').val();
        var luong = $('#luong').val();
        var madbvt = $('#madbvt').val();
        var anhnvbvt = $('#anhnvbvt').val();

		$.ajax({
			url: 'public/library/nhansu/nhanvienbvt/ajax-nhanvienbvt.php',
			type: 'POST',
			data: {
				manvbvt: manvbvt,
				tennvbvt: tennvbvt,
				diachi: diachi,
				sdt: sdt,
				cmnd: cmnd,
				ngaysinh: ngaysinh,
				luong: luong,
				madbvt: madbvt,
				anhnvbvt: anhnvbvt
			},
			success: function(kq){
				$('#nhansu').html(kq);
			}
		})
	});
</script>