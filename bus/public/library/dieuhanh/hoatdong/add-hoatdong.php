<?php
	session_start();
	include("../../../../models/m-dieuhanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '2')
	{
		if(isset($_POST["ngay"]) && !empty($_POST["ngay"]) && isset($_POST["ca"]) && !empty($_POST["ca"]) && isset($_POST["bienso"]) && !empty($_POST["bienso"]) && isset($_POST["matuyen"]) && !empty($_POST["matuyen"]) && isset($_POST["mapx"]) && !empty($_POST["mapx"]) && isset($_POST["matx"]) && !empty($_POST["matx"]))
		{
			$hd = new m_dieuhanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$ngay = addslashes(stripslashes($_POST["ngay"]));
			$ca = addslashes(stripslashes($_POST["ca"]));
			$bienso = addslashes(stripslashes($_POST["bienso"]));
			$matuyen = addslashes(stripslashes($_POST["matuyen"]));
			$matx = addslashes(stripslashes($_POST["matx"]));
			$mapx = addslashes(stripslashes($_POST["mapx"]));

			$result = $hd->m_add_hoatdong($ngay, $ca, $bienso, $matuyen, $matx, $mapx);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Hoạt động đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm hoạt động thành công</p>";
			}
			$hd->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 145px;">Thêm hoạt động</h2>	
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="date"  id="ngay" class="form-control is-valid" placeholder="Ngày" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="ca" class="form-control is-valid" placeholder="Ca" required >
		</div>
		<div class="row">
			<tr>
				<div class="col-md-4 mb-3" style="color: #993333;">
					<td><b>Biển số</b></td>
				</div>
				<div class="col-md-8 mb-3">
					<td>
						<select id="bienso">
							<option value="bienso"></option>
							<?php
								$hd1 = new m_dieuhanh();
								$sql1 = "SELECT bienso FROM hoatdong";
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
							<option value="matuyen"></option>
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
							<option value="matx"></option>
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
							<option value="mapx"></option>
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
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_hoatdong()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_hoatdong(){
        $.ajax({
            url : "public/library/dieuhanh/hoatdong/add-hoatdong.php",
            type : "post",
            dataType:"text",
            data : {
                ngay : $('#ngay').val(),
                ca : $('#ca').val(),
                bienso : $('#bienso').val(),
                matuyen : $('#matuyen').val(),
                matx : $('#matx').val(),
                mapx : $('#mapx').val()
            },
            success : function (result){
                $('#add-hoatdong').html(result);
            }
        });
    }
</script>