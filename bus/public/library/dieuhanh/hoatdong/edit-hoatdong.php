<?php
	include("../../../../models/m-dieuhanh.php");

	if(isset($_POST["mahd"]))
	{
		$mahd = addslashes(stripslashes($_POST["mahd"]));

		$hd = new m_dieuhanh();
		$row = $hd->m_get_hoatdong($mahd);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 90px;">Sửa thông tin hoạt động</h2>	
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Ngày</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="date"  id="ngay" class="form-control is-valid" placeholder="Ngày" value="<?php echo $row['ngay']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Ca</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="ca" class="form-control is-valid" placeholder="Ca" value="<?php echo $row['ca']; ?>" required >
					</div>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Biển số xe</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="bienso">
									<option value="<?php echo $row['bienso']; ?>" ><?php echo $row['bienso']; ?></option>
									<?php
										$hd1 = new m_dieuhanh();
										$sql1 = "SELECT bienso FROM xe";
										$hd1->query($sql1);
										while ($row1 = $hd1->fetch_assoc())
										{
											echo "<option value='$row1[bienso]'>$row1[bienso]</option>";
										}
										$hd1->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
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
										$hd2 = new m_dieuhanh();
										$sql2 = "SELECT matuyen, tentuyen FROM tuyen";
										$hd2->query($sql2);
										while ($row2 = $hd2->fetch_assoc())
										{
											echo "<option value='$row2[matuyen]'>$row2[matuyen] - $row2[tentuyen]</option>";
										}
										$hd2->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã tài xế</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="matx">
									<option value="<?php echo $row['matx']; ?>"><?php echo "$row[matx] - $row[tentx]"; ?></option>
									<?php
										$hd3 = new m_dieuhanh();
										$sql3 = "SELECT matx, tentx FROM taixe";
										$hd3->query($sql3);
										while ($row3 = $hd3->fetch_assoc())
										{
											echo "<option value='$row3[matx]'>$row3[matx] - $row3[tentx]</option>";
										}
										$hd3->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã phụ xe</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="mapx">
									<option value="<?php echo $row['mapx']; ?>"><?php echo "$row[mapx] - $row[tenpx]"; ?></option>
									<?php
										$hd4 = new m_dieuhanh();
										$sql4 = "SELECT mapx, tenpx FROM phuxe";
										$hd4->query($sql4);
										while ($row4 = $hd4->fetch_assoc())
										{
											echo "<option value='$row4[mapx]'>$row4[mapx] - $row4[tenpx]</option>";
										}
										$hd4->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
			<br>
			<center><button type="button" id="ajax-edit-hoatdong" name="<?php echo $mahd; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-hoatdong').click(function(e) {
            e.preventDefault();
            $('#dieuhanh').load('public/library/dieuhanh/hoatdong/ajax-hoatdong.php');
        });
    });

    $(document).on('click', '#ajax-edit-hoatdong', function(){
		var mahd = $(this).attr('name');
		var ngay = $('#ngay').val();
        var ca = $('#ca').val();
        var bienso = $('#bienso').val();
        var matuyen = $('#matuyen').val();
        var matx = $('#matx').val();
        var mapx = $('#mapx').val();

		$.ajax({
			url: 'public/library/dieuhanh/hoatdong/ajax-hoatdong.php',
			type: 'POST',
			data: {
				mahd: mahd,
				ngay: ngay,
				ca: ca,
				bienso: bienso,
				matuyen: matuyen,
				matx: matx,
				mapx: mapx
			},
			success: function(kq){
				$('#dieuhanh').html(kq);
			}
		})
	});
</script>