<?php
	session_start();
	include("../../../../models/m-nhansu.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '1')
	{
		if(isset($_POST["tentx"]) && !empty($_POST["tentx"]) && isset($_POST["diachi"]) && !empty($_POST["diachi"]) && isset($_POST["sdt"]) && !empty($_POST["sdt"]) && isset($_POST["cmnd"]) && !empty($_POST["cmnd"]) && isset($_POST["ngaysinh"]) && !empty($_POST["ngaysinh"]) && isset($_POST["luong"]) && !empty($_POST["luong"]) && isset($_POST["loaibang"]) && !empty($_POST["loaibang"]) && isset($_POST["matuyen"]) && !empty($_POST["matuyen"]) && isset($_POST["anhtx"]) && !empty($_POST["anhtx"]))
		{
			$tx = new m_nhansu();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tentx = addslashes(stripslashes($_POST["tentx"]));
			$diachi = addslashes(stripslashes($_POST["diachi"]));
			$sdt = addslashes(stripslashes($_POST["sdt"]));
			$cmnd = addslashes(stripslashes($_POST["cmnd"]));
			$ngaysinh = addslashes(stripslashes($_POST["ngaysinh"]));
			$luong = addslashes(stripslashes($_POST["luong"]));
			$loaibang = addslashes(stripslashes($_POST["loaibang"]));
			$matuyen = addslashes(stripslashes($_POST["matuyen"]));
			$anhtx = addslashes(stripslashes($_POST["anhtx"]));

			$result = $tx->m_add_tx($tentx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $loaibang, $matuyen, $anhtx);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Tài xế đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm tài xế thành công</p>";
			}
			$tx->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 168px;">Thêm tài xế</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tentx" class="form-control is-valid" placeholder="Tên tài xế" required >
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
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="loaibang" class="form-control is-valid" placeholder="Loại bằng" required >
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
								$tx1 = new m_nhansu();
								$sql1 = "SELECT matuyen, tentuyen FROM tuyen";
								$tx1->query($sql1);
								while ($row1 = $tx1->fetch_assoc())
								{
									echo "<option value='$row1[matuyen]'>$row1[matuyen] - $row1[tentuyen]</option>";
								}
								$tx1->disconnect();
							?>
						</select>
					</td>
				</div>
			</tr>
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="anhtx" class="form-control is-valid" placeholder="Link hình ảnh" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_tx()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
	</form>
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
</div>

<script type="text/javascript">
    function ajax_add_tx(){
        $.ajax({
            url : "public/library/nhansu/taixe/add-tx.php",
            type : "post",
            dataType:"text",
            data : {
                tentx : $('#tentx').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val(),
                cmnd : $('#cmnd').val(),
                ngaysinh : $('#ngaysinh').val(),
                luong : $('#luong').val(),
                loaibang : $('#loaibang').val(),
                matuyen : $('#matuyen').val(),
                anhtx : $('#anhtx').val()
            },
            success : function (result){
                $('#add-tx').html(result);
            }
        });
    }
</script>