<?php
	session_start();
	include("../../../../models/m-nhansu.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '1')
	{
		if(isset($_POST["tendbvt"]) && !empty($_POST["tendbvt"]) && isset($_POST["diachi"]) && !empty($_POST["diachi"]) && isset($_POST["sdt"]) && !empty($_POST["sdt"]))
		{
			$dbvt = new m_nhansu();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tendbvt = addslashes(stripslashes($_POST["tendbvt"]));
			$diachi = addslashes(stripslashes($_POST["diachi"]));
			$sdt = addslashes(stripslashes($_POST["sdt"]));

			$result = $dbvt->m_add_dbvt($tendbvt, $diachi, $sdt);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Điểm bán vé tháng đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm điểm bán vé tháng thành công</p>";
			}
			$dbvt->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 86px;">Thêm điểm bán vé tháng</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tendbvt" class="form-control is-valid" placeholder="Tên điểm bán vé tháng" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="diachi" class="form-control is-valid" placeholder="Địa chỉ" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="sdt" class="form-control is-valid" placeholder="Số điện thoại" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_dbvt()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_dbvt(){
        $.ajax({
            url : "public/library/nhansu/diembvt/add-dbvt.php",
            type : "post",
            dataType:"text",
            data : {
                tendbvt : $('#tendbvt').val(),
                diachi : $('#diachi').val(),
                sdt : $('#sdt').val()
            },
            success : function (result){
                $('#add-dbvt').html(result);
            }
        });
    }
</script>