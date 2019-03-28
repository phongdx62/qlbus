<?php
	session_start();
	include("../../../../models/m-kinhdoanh.php");
	
	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '3')
	{
		if(isset($_POST["tenvt"]) && !empty($_POST["tenvt"]) && isset($_POST["dongia"]) && !empty($_POST["dongia"]) && isset($_POST["ghichu"]) && !empty($_POST["ghichu"]))
		{
			$vt = new m_kinhdoanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tenvt = addslashes(stripslashes($_POST["tenvt"]));
			$dongia = addslashes(stripslashes($_POST["dongia"]));
			$ghichu = addslashes(stripslashes($_POST["ghichu"]));
			
			$result = $vt->m_add_vt($tenvt, $dongia, $ghichu);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Vé tháng đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm vé tháng thành công</p>";
			}		
			$vt->disconnect();
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
	<h2 style="color: #FF9999; margin-left: 155px;">Thêm vé tháng</h2>	
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tenvt" class="form-control is-valid" placeholder="Tên vé tháng" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="dongia" class="form-control is-valid" placeholder="Đơn giá" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="ghichu" class="form-control is-valid" placeholder="Ghi chú" required >
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_vt()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_vt(){
        $.ajax({
            url : "public/library/kinhdoanh/vethang/add-vt.php",
            type : "post",
            dataType:"text",
            data : {
                tenvt : $('#tenvt').val(),
                dongia : $('#dongia').val(),
                ghichu : $('#ghichu').val()
            },
            success : function (result){
                $('#add-vt').html(result);
            }
        });
    }
</script>