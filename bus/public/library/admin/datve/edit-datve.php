<?php
	include("../../../../models/m-admin.php");

	if(isset($_POST["madv"]))
	{
		$madv = addslashes(stripslashes($_POST["madv"]));

		$datve = new m_admin();
		$row = $datve->m_get_datve($madv);
	}

?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">
			<h2 style="color: #FF9999; margin-left: 125px;">Xác nhận đặt vé</h2>
			<br>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tài khoản</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="taikhoan" class="form-control is-valid" placeholder="Tài khoản" value="<?php echo $row['taikhoan']; ?>" required >
					</div>
				</div>
				<div class="mb-3">
					<tr>
						<td><b style="color: #993333;">Xác nhận</b></td>
						<td>
							<!-- <input type="radio" name="xacnhan" id="xacnhan" value="1" checked="checked">Chưa xác nhận -->
							<input type="radio" name="xacnhan" id="xacnhan" value="1">Duyệt
						</td>
					</tr>
				</div>

				<br>
			<center><button type="button" id="ajax-edit-datve" name="<?php echo $madv; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý duyệt</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-datve').click(function(e) {
            e.preventDefault();
            $('#admin').load('public/library/admin/datve/ajax-datve.php');
        });
    });

    $(document).on('click', '#ajax-edit-datve', function(){
		var madv = $(this).attr('name');
        var xacnhan = $('#xacnhan').val();

		$.ajax({
			url: 'public/library/admin/datve/ajax-datve.php',
			type: 'POST',
			data: {
				madv: madv,
				xacnhan: xacnhan
			},
			success: function(kq){
				$('#admin').html(kq);
			}
		})
	});
</script>