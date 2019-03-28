<?php
	session_start();
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '3')
	{
		if(isset($_POST["ngay"]) && !empty($_POST["ngay"]) && isset($_POST["manvbvt"]) && !empty($_POST["manvbvt"]) && isset($_POST["mavt"]) && !empty($_POST["mavt"]) && isset($_POST["sovephatra"]) && !empty($_POST["sovephatra"]) && isset($_POST["sovethuve"]) && !empty($_POST["sovethuve"]) && isset($_POST["sovebanduoc"]) && !empty($_POST["sovebanduoc"]))
		{
			$bvt = new m_kinhdoanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$ngay = addslashes(stripslashes($_POST["ngay"]));
			$manvbvt = addslashes(stripslashes($_POST["manvbvt"]));
			$mavt = addslashes(stripslashes($_POST["mavt"]));
			$sovephatra = addslashes(stripslashes($_POST["sovephatra"]));
			$sovethuve = addslashes(stripslashes($_POST["sovethuve"]));
			$sovebanduoc = addslashes(stripslashes($_POST["sovebanduoc"]));

			$result = $bvt->m_add_bvt($ngay, $manvbvt, $mavt, $sovephatra, $sovethuve, $sovebanduoc);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Thông tin bán vé tháng đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm thông tin bán vé tháng thành công</p>";
			}
			$bvt->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 55px;">Thêm thông tin bán vé tháng</h2>
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
					<td><b>Mã nhân viên bvt</b></td>
				</div>
				<div class="col-md-7 mb-3">
					<td>
						<select id="manvbvt">
							<option value="manvbvt"></option>
							<?php
								$bvn1 = new m_kinhdoanh();
								$sql1 = "SELECT manvbvt, tennvbvt FROM nhanvienbvt";
								$bvn1->query($sql1);
								while ($row1 = $bvn1->fetch_assoc())
								{
									echo "<option value='$row1[manvbvt]'>$row1[manvbvt] - $row1[tennvbvt]</option>";
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
					<td><b>Mã vé tháng - Đơn giá</b></td>
				</div>
				<div class="col-md-7 mb-3">
					<td>
						<select id="mavt">
							<option value="mavt"></option>
							<?php
								$bvn2 = new m_kinhdoanh();
								$sql2 = "SELECT mavt, dongia FROM vethang";
								$bvn2->query($sql2);
								while ($row2 = $bvn2->fetch_assoc())
								{
									echo "<option value='$row2[mavt]'>$row2[mavt] - $row2[dongia]</option>";
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
			onclick="ajax_add_bvt()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_bvt(){
        $.ajax({
            url : "public/library/kinhdoanh/banvethang/add-bvt.php",
            type : "post",
            dataType:"text",
            data : {
                ngay : $('#ngay').val(),
                manvbvt : $('#manvbvt').val(),
                mavt : $('#mavt').val(),
                sovephatra : $('#sovephatra').val(),
                sovethuve : $('#sovethuve').val(),
                sovebanduoc : $('#sovebanduoc').val()
            },
            success : function (result){
                $('#add-bvt').html(result);
            }
        });
    }
</script>