<?php
	include("../../../../models/m-nhansu.php");

	if(isset($_POST["madbvt"]))
	{
		$madbvt = addslashes(stripslashes($_POST["madbvt"]));

		$dbvt = new m_nhansu();
		$row = $dbvt->m_get_dbvt($madbvt);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form method="post">
			<h2 style="color: #FF9999; margin-left: 30px;">Sửa thông tin điểm bán vé tháng</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên điểm bvt</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tendbvt" class="form-control is-valid" placeholder="Tên điểm bvt" value="<?php echo $row['tendbvt']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Địa chỉ</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="diachi" class="form-control is-valid" placeholder="Địa chỉ" value="<?php echo $row['diachi']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số điện thoại</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="sdt" class="form-control is-valid" placeholder="Số điện thoại" value="<?php echo $row['sdt']; ?>" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-dbvt" name="<?php echo $madbvt; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-dbvt').click(function(e) {
            e.preventDefault();
            $('#nhansu').load('public/library/nhansu/diembvt/ajax-diembvt.php');
        });
    });

    $(document).on('click', '#ajax-edit-dbvt', function(){
		var madbvt = $(this).attr('name');
        var tendbvt = $('#tendbvt').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();

		$.ajax({
			url: 'public/library/nhansu/diembvt/ajax-diembvt.php',
			type: 'POST',
			data: {
				madbvt: madbvt,
				tendbvt: tendbvt,
				diachi: diachi,
				sdt: sdt
			},
			success: function(kq){
				$('#nhansu').html(kq);
			}
		})
	});
</script>