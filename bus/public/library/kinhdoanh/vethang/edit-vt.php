<?php
	include("../../../../models/m-kinhdoanh.php");

	if(isset($_POST["mavt"]))
	{
		$mavt = addslashes(stripslashes($_POST["mavt"]));

		$vt = new m_kinhdoanh();
		$row = $vt->m_get_vt($mavt);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">	
			<h2 style="color: #FF9999; margin-left: 95px;">Sửa thông tin vé tháng</h2>	
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên vé tháng</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="tenvt" class="form-control is-valid" placeholder="Tên vé tháng" value="<?php echo $row['tenvt']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Đơn giá</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="dongia" class="form-control is-valid" placeholder="Đơn giá" value="<?php echo $row['dongia']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Ghi chú</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="ghichu" class="form-control is-valid" placeholder="Ghi chú" value="<?php echo $row['ghichu']; ?>" required >
					</div>
				</div>
				<br>
			<center><button type="button" id="ajax-edit-vt" name="<?php echo $mavt; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-vt').click(function(e) {
            e.preventDefault();
            $('#kinhdoanh').load('public/library/kinhdoanh/vethang/ajax-vethang.php');
        });
    });

    $(document).on('click', '#ajax-edit-vt', function(){
		var mavt = $(this).attr('name');
        var tenvt = $('#tenvt').val();
        var dongia = $('#dongia').val();
        var ghichu = $('#ghichu').val();

		$.ajax({
			url: 'public/library/kinhdoanh/vethang/ajax-vethang.php',
			type: 'POST',
			data: {
				mavt: mavt,
				tenvt: tenvt,
				dongia: dongia,
				ghichu: ghichu
			},
			success: function(kq){
				$('#kinhdoanh').html(kq);
			}
		})
	});
</script>