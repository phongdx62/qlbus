<?php
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_POST["magdvn"]))
	{
		$magdvn = addslashes(stripslashes($_POST["magdvn"]));

		$bvn = new m_kinhdoanh();
		$row = $bvn->m_get_bvn($magdvn);
		$bvn1 = new m_kinhdoanh();
		$sql1 = "SELECT mapx, tenpx FROM phuxe";
		$bvn1->query($sql1);
		$bvn2 = new m_kinhdoanh();
		$sql2 = "SELECT mavn, tenvn FROM vengay";
		$bvn2->query($sql2);
	}
?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">
			<h2 style="color: #FF9999; margin-left: 80px;">Sửa thông tin bán vé ngày</h2>
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
								<select id="mapx">
									<option value="<?php echo $row['mapx']; ?>"><?php echo "$row[mapx] - $row[tenpx]"; ?></option>
									<?php
										while ($row1 = $bvn1->fetch_assoc())
										{
											echo "<option value='$row1[mapx]'>$row1[mapx] - $row1[tenpx]</option>";
										}
										$bvn1->disconnect();
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
								<select id="mavn">
									<option value="<?php echo $row['mavn']; ?>"><?php echo "$row[mavn] - $row[dongia]"; ?></option>
									<?php
										while ($row2 = $bvn2->fetch_assoc())
										{
											echo "<option value='$row2[mavn]'>$row2[mavn] - $row2[dongia]</option>";
										}
										$bvn2->disconnect();
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
			<center><button type="button" id="ajax-edit-bvn" name="<?php echo $magdvn; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-bvn').click(function(e) {
            e.preventDefault();
            $('#kinhdoanh').load('public/library/kinhdoanh/banvengay/ajax-banvengay.php');
        });
    });

    $(document).on('click', '#ajax-edit-bvn', function(){
		var magdvn = $(this).attr('name');
        var ngay = $('#ngay').val();
        var mapx = $('#mapx').val();
        var mavn = $('#mavn').val();
        var sovephatra = $('#sovephatra').val();
        var sovethuve = $('#sovethuve').val();
        var sovebanduoc = $('#sovebanduoc').val();

		$.ajax({
			url: 'public/library/kinhdoanh/banvengay/ajax-banvengay.php',
			type: 'POST',
			data: {
				magdvn: magdvn,
				ngay: ngay,
				mapx: mapx,
				mavn: mavn,
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