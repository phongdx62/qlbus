<?php
	session_start();
	include("../../models/m-index.php");

	if(isset($_SESSION['id']) && isset($_POST["noidung"]))
	{
		$dv = new m_index();
		//stripslashes loại bỏ ký tự \ trước dấu '
		$id = $_SESSION['id'];
		$noidung = addslashes(stripslashes($_POST["noidung"]));

		$result = $dv->m_add_ph($id, $noidung);
		$msg = "<p style='color: #CC3366;'>* Gửi phản hồi thành công</p>";
		$dv->disconnect();
	}


?>
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form method="post">
	<center><h2 style="color: #000;">Gửi phản hồi</h2></center>
	<br>
		<div class="row">
			<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Nội dung</b></div>
			<div class="col-md-8 mb-3">
				<label for="inputPassword" class="sr-only"></label>
				<textarea id="noidung" required></textarea>
			</div>
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_ph()"><span class="glyphicon glyphicon-save"></span>Đồng ý </button></center>
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
<!-- <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
 --><script type="text/javascript">
    function ajax_add_ph(){
        $.ajax({
            url : "public/library/ajax-phanhoi.php",
            type : "post",
            dataType:"text",
            data : {
                noidung : $('#noidung').val()
            },
            success : function (result){
                $('#dulieu').html(result);
            }
        });
    }
</script>