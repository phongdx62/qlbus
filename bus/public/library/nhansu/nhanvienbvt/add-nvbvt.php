<?php
	session_start();
	include("../../../../models/m-nhansu.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '1')
	{
		if(isset($_POST["tennvbvt"]) && !empty($_POST["tennvbvt"]) && isset($_POST["diachi"]) && !empty($_POST["diachi"]) && isset($_POST["sdt"]) && !empty($_POST["sdt"]) && isset($_POST["cmnd"]) && !empty($_POST["cmnd"]) && isset($_POST["ngaysinh"]) && !empty($_POST["ngaysinh"]) && isset($_POST["luong"]) && !empty($_POST["luong"]) && isset($_POST["madbvt"]) && !empty($_POST["madbvt"]) && isset($_POST["anhnvbvt"]) && !empty($_POST["anhnvbvt"]))
		{
			$nvbvt = new m_nhansu();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tennvbvt = addslashes(stripslashes($_POST["tennvbvt"]));
			$diachi = addslashes(stripslashes($_POST["diachi"]));
			$sdt = addslashes(stripslashes($_POST["sdt"]));
			$cmnd = addslashes(stripslashes($_POST["cmnd"]));
			$ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
			$luong = addslashes(stripslashes($_POST["luong"]));
			$madbvt = addslashes(stripslashes($_POST["madbvt"]));
			$anhnvbvt = addslashes(stripslashes($_POST["anhnvbvt"]));


			$result = $nvbvt->m_add_nvbvt($tennvbvt, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $madbvt, $anhnvbvt);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Nhân viên bán vé tháng đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm nhân viên bán vé tháng thành công</p>";
			}
			$nvbvt->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 50px;">Thêm nhân viên bán vé tháng</h2>	
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tennvbvt" class="form-control is-valid" placeholder="Tên nhân viên bán vé tháng" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="diachi" class="form-control is-valid" placeholder="Địa chỉ" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="sdt" class="form-control is-valid" placeholder="Số điện thoại" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="cmnd" class="form-control is-valid" placeholder="Số CMND" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="date"  id="ngaysinh" class="form-control is-valid" placeholder="Ngày sinh" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="luong" class="form-control is-valid" placeholder="Lương" required >
		</div>
		<div class="row">
			<tr>
				<div class="col-md-4 mb-3" style="color: #993333;">
					<td><b>Mã tuyến</b></td>
				</div>
				<div class="col-md-8 mb-3">
					<td>
						<select id="madbvt">
							<option value="madbvt"></option>
							<?php
								$nvbvt1 = new m_nhansu();
								$sql1 = "SELECT madbvt, tendbvt FROM diembvt";
								$nvbvt1->query($sql1);
								while ($row = $nvbvt1->fetch_assoc())
								{
									echo "<option value='$row[madbvt]'>$row[madbvt] - $row[tendbvt]</option>";
								}
								$nvbvt1->disconnect();
							?>
						</select>
					</td>
				</div>
			</tr>
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="anhnvbvt" class="form-control is-valid" placeholder="Link hình ảnh" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_nvbvt()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_nvbvt(){
        $.ajax({
            url : "public/library/nhansu/nhanvienbvt/add-nvbvt.php",
            type : "post",
            dataType:"text",
            data : {
                tennvbvt : $('#tennvbvt').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val(),
                cmnd : $('#cmnd').val(),
                ngaysinh : $('#ngaysinh').val(),
                luong : $('#luong').val(),
                madbvt : $('#madbvt').val(),
                anhnvbvt : $('#anhnvbvt').val()
            },
            success : function (result){
                $('#add-nvbvt').html(result);
            }
        });
    }
</script>