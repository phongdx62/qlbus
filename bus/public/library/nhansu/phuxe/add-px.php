<?php
	session_start();
	include("../../../../models/m-nhansu.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '1')
	{
		if(isset($_POST["tenpx"]) && !empty($_POST["tenpx"]) && isset($_POST["diachi"]) && !empty($_POST["diachi"]) && isset($_POST["sdt"]) && !empty($_POST["sdt"]) && isset($_POST["cmnd"]) && !empty($_POST["cmnd"]) && isset($_POST["ngaysinh"]) && !empty($_POST["ngaysinh"]) && isset($_POST["luong"]) && !empty($_POST["luong"]) && isset($_POST["matuyen"]) && !empty($_POST["matuyen"]) && isset($_POST["anhpx"]) && !empty($_POST["anhpx"]))
		{
			$px = new m_nhansu();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tenpx = addslashes(stripslashes($_POST["tenpx"]));
			$diachi = addslashes(stripslashes($_POST["diachi"]));
			$sdt = addslashes(stripslashes($_POST["sdt"]));
			$cmnd = addslashes(stripslashes($_POST["cmnd"]));
			$ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
			$luong = addslashes(stripslashes($_POST["luong"]));
			$matuyen = addslashes(stripslashes($_POST["matuyen"]));
			$anhpx = addslashes(stripslashes($_POST["anhpx"]));

			$result = $px->m_add_px($tenpx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $matuyen, $anhpx);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Phụ xe đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm phụ xe thành công</p>";
			}
			$px->disconnect();
		}
	}
	else
	{
		header("Location: ../../../../index.php");
	}

?>
<div id="add-data" style="margin-left: 300px; width: 500px;">
	<br>
	<form action="#" method="post">
	<h2 style="color: #FF9999; margin-left: 165px;">Thêm phụ xe</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tenpx" class="form-control is-valid" placeholder="Tên phụ xe" required >
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
				<div class="col-md-3 mb-3" style="color: #993333;">
					<td><b>Mã tuyến</b></td>
				</div>
				<div class="col-md-9 mb-3">
					<td>
						<select id="matuyen">
							<option value="matuyen"></option>
							<?php
								$px1 = new m_nhansu();
								$sql1 = "SELECT matuyen, tentuyen FROM tuyen";
								$px1->query($sql1);
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
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="anhpx" class="form-control is-valid" placeholder="Link hình ảnh" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_px()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_px(){
        $.ajax({
            url : "public/library/nhansu/phuxe/add-px.php",
            type : "post",
            dataType:"text",
            data : {
                tenpx : $('#tenpx').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val(),
                cmnd : $('#cmnd').val(),
                ngaysinh : $('#ngaysinh').val(),
                luong : $('#luong').val(),
                matuyen : $('#matuyen').val(),
                anhpx : $('#anhpx').val()
            },
            success : function (result){
                $('#add-px').html(result);
            }
        });
    }
</script>