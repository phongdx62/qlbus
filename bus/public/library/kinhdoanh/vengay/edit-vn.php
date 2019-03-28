<?php
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_POST["mavn"]))
	{
		$mavn = addslashes(stripslashes($_POST["mavn"]));

		$vn = new m_kinhdoanh();
		$row = $vn->m_get_vn($mavn);
		$vn1 = new m_kinhdoanh();
		$sql = "SELECT matuyen, tentuyen FROM tuyen";
		$vn1->query($sql);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">	
			<h2 style="color: #FF9999; margin-left: 105px;">Sửa thông tin vé ngày</h2>	
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên vé ngày</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tenvn" class="form-control is-valid" placeholder="Tên vé ngày" value="<?php echo $row['tenvn']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Đơn giá</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="dongia" class="form-control is-valid" placeholder="Đơn giá" value="<?php echo $row['dongia']; ?>" required >
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
										while ($row1 = $vn1->fetch_assoc())
										{
											echo "<option value='$row1[matuyen]'>$row1[matuyen] - $row1[tentuyen]</option>";
										}
										$vn1->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-vn" name="<?php echo $mavn; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-vn').click(function(e) {
            e.preventDefault();
            $('#kinhdoanh').load('public/library/kinhdoanh/vengay/ajax-vengay.php');
        });
    });

    $(document).on('click', '#ajax-edit-vn', function(){
		var mavn = $(this).attr('name');
        var tenvn = $('#tenvn').val();
        var dongia = $('#dongia').val();
        var matuyen = $('#matuyen').val();

		$.ajax({
			url: 'public/library/kinhdoanh/vengay/ajax-vengay.php',
			type: 'POST',
			data: {
				mavn: mavn,
				tenvn: tenvn,
				dongia: dongia,
				matuyen: matuyen
			},
			success: function(kq){
				$('#kinhdoanh').html(kq);
			}
		})
	});
</script>