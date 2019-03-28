<?php 
	include("../../../../models/m-admin.php");
	
	if(isset($_POST["id"]))
	{
		$id = addslashes(stripslashes($_POST["id"]));

		$user = new m_admin();
		$row = $user->m_get_user($id);
	}
		
?>
	<div style="margin-left: 300px; width: 500px;">
		<br>
		<form action="#" method="post">	
			<h2 style="color: #FF9999; margin-left: 125px;">Sửa thông tin người dùng</h2>
			<br>	
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Tên người dùng</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="ten" class="form-control is-valid" placeholder="Tên người dùng" value="<?php echo $row['ten']; ?>" required >
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
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Số CMND</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputEmail" class="sr-only"></label>
						<input type="text"  id = "cmnd" class="form-control is-valid" placeholder="Số CMND" value="<?php echo $row['cmnd']; ?>" required autofocus>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Email</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="email" class="form-control is-valid" placeholder="Email" value="<?php echo $row['email']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Cấp bậc</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="capbac" class="form-control is-valid" placeholder="Cấp bậc" value="<?php echo $row['capbac']; ?>" required >
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3" style="margin-top: 8px;color: #993333;"><b>Kích hoạt</b></div>
					<div class="col-md-8 mb-3">
						<label for="inputPassword" class="sr-only"></label>
						<input type="text"  id="status" class="form-control is-valid" placeholder="Status" value="<?php echo $row['status']; ?>" required >
					</div>
				</div>
				
				<br>
			<center><button type="button" id="ajax-edit-user" name="<?php echo $id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Đồng ý sửa</button></center>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ajax-edit-user').click(function(e) {
            e.preventDefault();
            $('#admin').load('public/library/admin/user/ajax-user.php');
        });
    });

    $(document).on('click', '#ajax-edit-user', function(){
		var id = $(this).attr('name');
        var ten = $('#ten').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();
        var cmnd = $('#cmnd').val();
        var email = $('#email').val();
        var capbac = $('#capbac').val();
        var status = $('#status').val();
        	
		$.ajax({
			url: 'public/library/admin/user/ajax-user.php',
			type: 'POST',
			data: {
				id: id,
				ten: ten,
				diachi: diachi,
				sdt: sdt,
				cmnd: cmnd,
				email: email,
				capbac: capbac,
				status: status
			},
			success: function(kq){
				$('#admin').html(kq);
			}
		})
	});
</script>