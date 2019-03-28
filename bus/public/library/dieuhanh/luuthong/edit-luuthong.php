<?php
	include("../../../../models/m-dieuhanh.php");

	if(isset($_POST["matuyen"]))
	{
		$matuyen = addslashes(stripslashes($_POST["matuyen"]));

		$lt = new m_dieuhanh();
		$row = $lt->m_get_luuthong($matuyen);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 90px;">Sửa thông tin lưu thông</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên tuyến</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tentuyen" class="form-control is-valid" placeholder="Tên tuyến" value="<?php echo $row['tentuyen']; ?>" required >
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 17px;color: #993333;"><b>Chiều đi</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<textarea id="chieudi" class="form-control is-valid" required ><?php echo $row['chieudi']; ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 17px;color: #993333;"><b>Chiều về</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<textarea id="chieuve" class="form-control is-valid" required ><?php echo $row['chieuve']; ?></textarea>
					</div>
				</div>
			<br>
			<center><button type="button" id="ajax-edit-luuthong" name="<?php echo $matuyen; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-luuthong').click(function(e) {
            e.preventDefault();
            $('#dieuhanh').load('public/library/dieuhanh/luuthong/ajax-luuthong.php');
        });
    });

    $(document).on('click', '#ajax-edit-luuthong', function(){
		var matuyen = $(this).attr('name');
		var tentuyen = $('#tentuyen').val();
        var chieudi = $('#chieudi').val();
        var chieuve = $('#chieuve').val();

		$.ajax({
			url: 'public/library/dieuhanh/luuthong/ajax-luuthong.php',
			type: 'POST',
			data: {
				matuyen: matuyen,
				tentuyen: tentuyen,
				chieudi: chieudi,
				chieuve: chieuve
			},
			success: function(kq){
				$('#dieuhanh').html(kq);
			}
		})
	});
</script>