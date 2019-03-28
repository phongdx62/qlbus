<?php
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_POST["magdvt"]))
	{
		$magdvt = addslashes(stripslashes($_POST["magdvt"]));

		$bvt = new m_kinhdoanh();
		$row = $bvt->m_get_bvt($magdvt);
		$bvt1 = new m_kinhdoanh();
		$sql1 = "SELECT manvbvt, tennvbvt FROM nhanvienbvt";
		$bvt1->query($sql1);
		$bvt2 = new m_kinhdoanh();
		$sql2 = "SELECT mavt, dongia FROM vethang";
		$bvt2->query($sql2);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">	
			<h2 style="color: #FF9999; margin-left: 75px;">Sửa thông tin bán vé tháng</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Ngày</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="date"  id="ngay" class="form-control is-valid" placeholder="Ngày" value="<?php echo $row['ngay']; ?>" required >
					</div>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã phụ xe</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="manvbvt">
									<option value="<?php echo $row['manvbvt']; ?>"><?php echo "$row[manvbvt] - $row[tennvbvt]"; ?></option>
									<?php
										while ($row1 = $bvt1->fetch_assoc())
										{
											echo "<option value='$row1[manvbvt]'>$row1[manvbvt] - $row1[tennvbvt]</option>";
										}
										$bvt1->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<div class="row">
					<tr>
						<div class="col-md-4 mb-3" style="color: #993333;">
							<td><b>Mã vé ngày</b></td>
						</div>
						<div class="col-md-8 mb-3">
							<td>
								<select id="mavt">
									<option value="<?php echo $row['mavt']; ?>"><?php echo "$row[mavt] - $row[dongia]"; ?></option>
									<?php
										while ($row2 = $bvt2->fetch_assoc())
										{
											echo "<option value='$row2[mavt]'>$row2[mavt] - $row2[dongia]</option>";
										}
										$bvt2->disconnect();
									?>
								</select>
							</td>
						</div>
					</tr>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Vé phát ra</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputEmail" class="sr-only"></label>
						<input type="text"  id = "sovephatra" class="form-control is-valid" placeholder="Số vé phát ra" value="<?php echo $row['sovephatra']; ?>" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số vé thu về</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="sovethuve" class="form-control is-valid" placeholder="Số vé thu về" value="<?php echo $row['sovethuve']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số vé bán được</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="sovebanduoc" class="form-control is-valid" placeholder="Số vé bán được" value="<?php echo $row['sovebanduoc']; ?>" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-bvt" name="<?php echo $magdvt; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-bvt').click(function(e) {
            e.preventDefault();
            $('#kinhdoanh').load('public/library/kinhdoanh/banvethang/ajax-banvethang.php');
        });
    });

    $(document).on('click', '#ajax-edit-bvt', function(){
		var magdvt = $(this).attr('name');
        var ngay = $('#ngay').val();
        var manvbvt = $('#manvbvt').val();
        var mavt = $('#mavt').val();
        var sovephatra = $('#sovephatra').val();
        var sovethuve = $('#sovethuve').val();
        var sovebanduoc = $('#sovebanduoc').val();

		$.ajax({
			url: 'public/library/kinhdoanh/banvethang/ajax-banvethang.php',
			type: 'POST',
			data: {
				magdvt: magdvt,
				ngay: ngay,
				manvbvt: manvbvt,
				mavt: mavt,
				sovephatra: sovephatra,
				sovethuve: sovethuve,
				sovebanduoc: sovebanduoc
			},
			success: function(kq){
				$('#kinhdoanh').html(kq);
			}
		})
	});
</script>