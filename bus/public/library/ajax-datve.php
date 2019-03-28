<?php
	session_start();
	include("../../models/m-index.php");

	if(isset($_SESSION['id']) && isset($_POST["mavt"]))
	{
		$dv = new m_index();
		//stripslashes loại bỏ ký tự \ trước dấu '
		$id = $_SESSION['id'];
		$mavt = addslashes(stripslashes($_POST["mavt"]));

		$result = $dv->m_add_dv($id, $mavt);
		if($result == "fail")
		{
			$msg = "<p style='color: red;'>* Bạn đã đặt vé rồi</p>";
		}
		else
		{
			$msg = "<p style='color: #CC3366;'>* Đặt vé thành công</p>";
		}
		$dv->disconnect();
	}


?>
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form method="post">
	<center><h2 style="color: #000;">Đặt vé tháng</h2></center>
	<br>
		<div class="row">
			<tr>
				<div class="col-md-3 mb-3" style="color: #993333;">
					<td><b>Chọn loại vé</b></td>
				</div>
				<div class="col-md-9 mb-3">
					<td>
						<select id="mavt">
							<option value="mavt"></option>
							<?php
								$dv1 = new m_index();
								$sql1 = "SELECT mavt, tenvt, ghichu FROM vethang";
								$dv1->query($sql1);
								while ($row1 = $dv1->fetch_assoc())
								{
									echo "<option value='$row1[mavt]'>$row1[mavt] - $row1[tenvt] - $row1[ghichu]</option>";
								}
								$dv1->disconnect();
							?>
						</select>
					</td>
				</div>
			</tr>
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_dv()"><span class="glyphicon glyphicon-save"></span>Đặt vé </button></center>
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
    function ajax_add_dv(){
        $.ajax({
            url : "public/library/ajax-datve.php",
            type : "post",
            dataType:"text",
            data : {
                mavt : $('#mavt').val()
            },
            success : function (result){
                $('#dulieu').html(result);
            }
        });
    }
</script>