<?php
	session_start();
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '3')
	{
		if(isset($_POST["tenvn"]) && !empty($_POST["tenvn"]) && isset($_POST["dongia"]) && !empty($_POST["dongia"]) && isset($_POST["matuyen"]) && !empty($_POST["matuyen"]))
		{
			$vn = new m_kinhdoanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tenvn = addslashes(stripslashes($_POST["tenvn"]));
			$dongia = addslashes(stripslashes($_POST["dongia"]));
			$matuyen = addslashes(stripslashes($_POST["matuyen"]));

			$result = $vn->m_add_vn($tenvn, $dongia, $matuyen);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Vé ngày đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm vé ngày thành công</p>";
			}
			$vn->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 164px;">Thêm vé ngày</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tenvn" class="form-control is-valid" placeholder="Tên vé ngày" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="dongia" class="form-control is-valid" placeholder="Đơn giá" required >
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
								$vn1 = new m_kinhdoanh();
								$sql1 = "SELECT matuyen, tentuyen FROM tuyen";
								$vn1->query($sql1);
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
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_vn()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_vn(){
        $.ajax({
            url : "public/library/kinhdoanh/vengay/add-vn.php",
            type : "post",
            dataType:"text",
            data : {
                tenvn : $('#tenvn').val(),
                dongia : $('#dongia').val(),
                matuyen : $('#matuyen').val()
            },
            success : function (result){
                $('#add-vn').html(result);
            }
        });
    }
</script>