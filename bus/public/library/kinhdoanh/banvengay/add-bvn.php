<?php
	session_start();
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '3')
	{
		if(isset($_POST["ngay"]) && !empty($_POST["ngay"]) && isset($_POST["mapx"]) && !empty($_POST["mapx"]) && isset($_POST["mavn"]) && !empty($_POST["mavn"]) && isset($_POST["sovephatra"]) && !empty($_POST["sovephatra"]) && isset($_POST["sovethuve"]) && !empty($_POST["sovethuve"]) && isset($_POST["sovebanduoc"]) && !empty($_POST["sovebanduoc"]))
		{
			$bvn = new m_kinhdoanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$ngay = addslashes(stripslashes($_POST["ngay"]));
			$mapx = addslashes(stripslashes($_POST["mapx"]));
			$mavn = addslashes(stripslashes($_POST["mavn"]));
			$sovephatra = addslashes(stripslashes($_POST["sovephatra"]));
			$sovethuve = addslashes(stripslashes($_POST["sovethuve"]));
			$sovebanduoc = addslashes(stripslashes($_POST["sovebanduoc"]));

			$result = $bvn->m_add_bvn($ngay, $mapx, $mavn, $sovephatra, $sovethuve, $sovebanduoc);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Thông tin bán vé ngày đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm thông tin bán vé ngày thành công</p>";
			}
			$bvn->disconnect();
		}
	}
	else
	{
		header("Location: ../../../../index.php");
	}

?>
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form method="post">
	<h2 style="color: #FF9999; margin-left: 68px;">Thêm thông tin bán vé ngày</h2>
	<br>
		<div class="row">
			<div class="col-md-5 mb-3" style="color: #993333; margin-top: 10px;">
					<td><b>Ngày</b></td>
			</div>
			<div class="col-md-7 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<input type="date"  id="ngay" class="form-control is-valid" placeholder="Ngày" required >
			</div>
		</div>
		<div class="row">
			<tr>
				<div class="col-md-5 mb-3" style="color: #993333;">
					<td><b>Mã phụ xe</b></td>
				</div>
				<div class="col-md-7 mb-3">
					<td>
						<select id="mapx">
							<option value="mapx"></option>
							<?php
								$bvn1 = new m_kinhdoanh();
								$sql1 = "SELECT mapx, tenpx FROM phuxe";
								$bvn1->query($sql1);
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
				<div class="col-md-5 mb-3" style="color: #993333;">
					<td><b>Mã vé ngày - Đơn giá</b></td>
				</div>
				<div class="col-md-7 mb-3">
					<td>
						<select id="mavn">
							<option value="mavn"></option>
							<?php
								$bvn2 = new m_kinhdoanh();
								$sql2 = "SELECT mavn, dongia FROM vengay";
								$bvn2->query($sql2);
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
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="sovephatra" class="form-control is-valid" placeholder="Số vé phát ra" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="sovethuve" class="form-control is-valid" placeholder="Số vé thu về" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="sovebanduoc" class="form-control is-valid" placeholder="Số vé bán được" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_bvn()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_bvn(){
        $.ajax({
            url : "public/library/kinhdoanh/banvengay/add-bvn.php",
            type : "post",
            dataType:"text",
            data : {
                ngay : $('#ngay').val(),
                mapx : $('#mapx').val(),
                mavn : $('#mavn').val(),
                sovephatra : $('#sovephatra').val(),
                sovethuve : $('#sovethuve').val(),
                sovebanduoc : $('#sovebanduoc').val()
            },
            success : function (result){
                $('#add-bvn').html(result);
            }
        });
    }
</script>