$(document).ready(function(){
	var tx_id;
	
	DisplayData();
	
	
	
	function DisplayData(){
		$.ajax({
			url: 'public/library/nhansu/taixe/data-tx.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(response){
				$('#data').html(response);
			}
		})
	}
	
	$(document).on('click', '.delete', function(){
		var matx = $(this).attr('name');
		if(confirm("Bạn có thực sự muốn xóa không?"))
			{
				$.ajax({
					url: 'delete_query.php',
					type: 'POST',
					data: {
						matx: matx
					},
					success: function(data){
						DisplayData();
						$('#update').hide();
						$('#add').show();	
						$('#tentx').val('');
						$('#diachi').val('');
						$('#sdt').val('');
						$('#cmnd').val('');
						$('#ngaysinh').val('');
						$('#luong').val('');
						$('#loaibang').val('');
						$('#matuyen').val('');
						$('#anhtx').val('');
					}
				});
				return true;
			}
			else
			{
				return false;
			}
	})
	
	$(document).on('click', '.edit', function(){
		var matx = $(this).attr('name');
		
		$.ajax({
			url: 'edit.php',
			type: 'POST',
			data: {
				matx: matx
			},
			success: function(response){
				var getArray = jQuery.parseJSON(response);
				
				tx_id = getArray.matx;
				
				$('#tentx').val(getArray.tentx);
				$('#diachi').val(getArray.diachi);
				$('#sdt').val(getArray.sdt);
				$('#cmnd').val(getArray.cmnd);
				$('#ngaysinh').val(getArray.ngaysinh);
				$('#luong').val(getArray.luong);
				$('#loaibang').val(getArray.loaibang);
				$('#matuyen').val(getArray.matuyen);
				$('#anhtx').val(getArray.anhtx);
				
				$('#update').show();
				$('#add').hide();	
			}
		})
	});
	
	$('#update').on('click', function(){
		var tentx = $('#tentx').val();
		var diachi = $('#diachi').val();
		var sdt = $('#sdt').val();
		var cmnd = $('#cmnd').val();
		var ngaysinh = $('#ngaysinh').val();
		var luong = $('#luong').val();
		var loaibang = $('#loaibang').val();
		var matuyen = $('#matuyen').val();
		var anhtx = $('#anhtx').val();
		
		
		$.ajax({
			url: 'update_query.php',
			type: 'POST',
			data: {
				matx: tx_id,
				tentx: tentx,
				diachi: diachi,
				sdt: sdt,
				cmnd: cmnd,
				ngaysinh: ngaysinh,
				luong: luong,
				loaibang: loaibang,
				matuyen: matuyen,
				anhtx: anhtx	
			},
			success: function(){
				DisplayData();
				$('#tentx').val('');
				$('#diachi').val('');
				$('#sdt').val('');
				$('#cmnd').val('');
				$('#ngaysinh').val('');
				$('#luong').val('');
				$('#loaibang').val('');
				$('#matuyen').val('');
				$('#anhtx').val('');
				
				alert("Bạn đã sửa thông tin 1 tài xế!");
				
				$('#update').hide();
				$('#add').show();	
				
				tx_id = "";
			}
		});
	});
});