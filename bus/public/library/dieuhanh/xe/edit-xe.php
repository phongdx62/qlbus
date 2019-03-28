<?php
	include("../../../../models/m-dieuhanh.php");

	if(isset($_POST["bienso"]))
	{
		$bienso = addslashes(stripslashes($_POST["bienso"]));

		$xe = new m_dieuhanh();
		$row = $xe->m_get_xe($bienso);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 145px;">Sửa thông tin xe</h2>
			<br>
				<div class="row">
				<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Biển số xe</b></div>
				<div class="col-md-8 mb-3">
					<label for="inputPassword" class="sr-only"></label>
					<input type="text"  id="biensomoi" class="form-control is-valid" placeholder="Biển số xe" value="<?php echo $row['bienso']; ?>" required >
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Hãng sản xuất</b></div>
				<div class="col-md-8 mb-3">
					<label for="inputPassword" class="sr-only"></label>
					<input type="text"  id="hangsx" class="form-control is-valid" placeholder="Hãng sản xuất" value="<?php echo $row['hangsx']; ?>" required >
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Năm sản xuất</b></div>
				<div class="col-md-8 mb-3">
					<label for="inputPassword" class="sr-only"></label>
					<input type="text"  id="namsx" class="form-control is-valid" placeholder="Năm sản xuất" value="<?php echo $row['namsx']; ?>" required >
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Nhà cung cấp</b></div>
				<div class="col-md-8 mb-3">
					<label for="inputEmail" class="sr-only"></label>
					<input type="text"  id = "nhacc" class="form-control is-valid" placeholder="Nhà cung cấp" value="<?php echo $row['nhacc']; ?>" required autofocus>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số ghế</b></div>
				<div class="col-md-8 mb-3">
					<label for="inputPassword" class="sr-only"></label>
					<input type="text"  id="soghe" class="form-control is-valid" placeholder="Số ghế" value="<?php echo $row['soghe']; ?>" required >
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
									$xe1 = new m_dieuhanh();
									$xe1->query("SELECT matuyen, tentuyen FROM tuyen");
									while ($row1 = $xe1->fetch_assoc())
									{
										echo "<option value='$row1[matuyen]'>$row1[matuyen] - $row1[tentuyen]</option>";
									}
									$xe1->disconnect();
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
					<input type="text"  id="anhxe" class="form-control is-valid" placeholder="Link hình ảnh" value="<?php echo $row['anhxe']; ?>" required >
				</div>
			</div>
			<br>
			<center><button type="button" id="ajax-edit-xe" name="<?php echo $bienso; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-xe').click(function(e) {
            e.preventDefault();
            $('#dieuhanh').load('public/library/dieuhanh/xe/ajax-xe.php');
        });
    });

    $(document).on('click', '#ajax-edit-xe', function(){
		var bienso = $(this).attr('name');
		var biensomoi = $('#biensomoi').val();
        var hangsx = $('#hangsx').val();
        var namsx = $('#namsx').val();
        var nhacc = $('#nhacc').val();
        var soghe = $('#soghe').val();
        var matuyen = $('#matuyen').val();
        var anhxe = $('#anhxe').val();

		$.ajax({
			url: 'public/library/dieuhanh/xe/ajax-xe.php',
			type: 'POST',
			data: {
				bienso: bienso,
				biensomoi: biensomoi,
				hangsx: hangsx,
				namsx: namsx,
				nhacc: nhacc,
				soghe: soghe,
				matuyen: matuyen,
				anhxe: anhxe
			},
			success: function(kq){
				$('#dieuhanh').html(kq);
			}
		})
	});
</script>