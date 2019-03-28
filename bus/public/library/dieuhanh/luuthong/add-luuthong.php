<?php
	session_start();
	include("../../../../models/m-dieuhanh.php");

	if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '2')
	{
		if(isset($_POST["tentuyen"]) && !empty($_POST["tentuyen"]) && isset($_POST["chieudi"]) && !empty($_POST["chieudi"]) && isset($_POST["chieuve"]) && !empty($_POST["chieuve"]))
		{
			$lt = new m_dieuhanh();
			//stripslashes loại bỏ ký tự \ trước dấu '
			$tentuyen = addslashes(stripslashes($_POST["tentuyen"]));
			$chieudi = addslashes(stripslashes($_POST["chieudi"]));
			$chieuve = addslashes(stripslashes($_POST["chieuve"]));

			$result = $lt->m_add_luuthong($tentuyen, $chieudi, $chieuve);
			if($result == "fail")
			{
				$msg = "<p style='color: red;'>* Tuyến đường lưu thông đã tồn tại</p>";
			}
			else
			{
				$msg = "<p style='color: #CC3366;'>* Thêm thông tin lưu thông thành công</p>";
			}
			$lt->disconnect();

		}
	}
	else
	{
		header("Location: ../../../../index.php");
	}
?>
<div style="margin-left: 300px; width: 500px;">
	<br>
	<form action="#" method="post">
	<h2 style="color: #FF9999; margin-left: 147px;">Thêm lưu thông</h2>
	<br>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<input type="text"  id="tentuyen" class="form-control is-valid" placeholder="Tên tuyến xe" required >
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<textarea id="chieudi" class="form-control is-valid" placeholder="Chiều đi" required ></textarea>
		</div>
		<div class="mb-3">
			<label for="inputPassword" class="sr-only"></label>
			<textarea id="chieuve" class="form-control is-valid" placeholder="Chiều về" required ></textarea>
		</div>
		<br>
		<center><button type="button" class="btn btn-primary"
			onclick="ajax_add_luuthong()"><span class="glyphicon glyphicon-save"></span>Đồng ý thêm</button></center>
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
    function ajax_add_luuthong(){
        $.ajax({
            url : "public/library/dieuhanh/luuthong/add-luuthong.php",
            type : "post",
            dataType:"text",
            data : {
                tentuyen : $('#tentuyen').val(),
                chieudi : $('#chieudi').val(),
                chieuve : $('#chieuve').val()
            },
            success : function (result){
                $('#add-luuthong').html(result);
            }
        });
    }
</script>