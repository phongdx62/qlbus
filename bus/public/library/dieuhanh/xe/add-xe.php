<?php
	session_start();
	include("../../../../models/m-dieuhanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '2')
	{
		if(isset($_POST["bienso"]) && !empty($_POST["bienso"]) && isset($_POST["hangsx"]) && !empty($_POST["hangsx"]) && isset($_POST["namsx"]) && !empty($_POST["namsx"]) && isset($_POST["nhacc"]) && !empty($_POST["nhacc"]) && isset($_POST["soghe"]) && !empty($_POST["soghe"]) && isset($_POST["matuyen"]) && !empty($_POST["matuyen"]) && isset($_POST["anhxe"]) && !empty($_POST["anhxe"]))
		{
			$xe = new m_dieuhanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$bienso = addslashes(stripslashes($_POST["bienso"]));
			$hangsx = addslashes(stripslashes($_POST["hangsx"]));
			$namsx = addslashes(stripslashes($_POST["namsx"]));
			$nhacc = addslashes(stripslashes($_POST["nhacc"]));
			$soghe = addslashes(stripslashes($_POST["soghe"]));
			$matuyen = addslashes(stripslashes($_POST["matuyen"]));
			$anhxe = addslashes(stripslashes($_POST["anhxe"]));

			$result = $xe->m_add_xe($bienso, $hangsx, $namsx, $nhacc, $soghe, $matuyen, $anhxe);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Xe đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm xe thành công</p>";
			}
			$xe->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 195px;">Thêm xe</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="bienso" class="form-control is-valid" placeholder="Biển số xe" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="hangsx" class="form-control is-valid" placeholder="Hãng sản xuất" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="namsx" class="form-control is-valid" placeholder="Năm sản xuất" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="nhacc" class="form-control is-valid" placeholder="Nhà cung cấp" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="soghe" class="form-control is-valid" placeholder="Số ghế" required >
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
								$xe1 = new m_dieuhanh();
								$sql1 = "SELECT matuyen, tentuyen FROM tuyen";
								$xe1->query($sql1);
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
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="anhxe" class="form-control is-valid" placeholder="Link hình ảnh" required >
		</div>
		<br>
		<a href="#" id="ajax-add-xe" style="height: 30px; color: #FF6600; margin-left: 200px;" type="submit" name="add-xe" onclick="ajax_add_xe()"><button type="button" id="save-xe" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></a>
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
    function ajax_add_xe(){
        $.ajax({
            url : "public/library/dieuhanh/xe/add-xe.php",
            type : "post",
            dataType:"text",
            data : {
                bienso : $('#bienso').val(),
                hangsx : $('#hangsx').val(),
                namsx : $('#namsx').val(),
                nhacc : $('#nhacc').val(),
                soghe : $('#soghe').val(),
                matuyen : $('#matuyen').val(),
                anhxe : $('#anhxe').val()
            },
            success : function (result){
                $('#add-xe').html(result);
            }
        });
    }
</script>