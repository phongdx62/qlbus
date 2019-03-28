<?php
	if($row['status']==1)
		$row['status'] = "Đã kích hoạt";
	else
		$row['status'] = "Chưa kích hoạt";
	if($row['capbac']=='1')
		$row['capbac'] = "Nhân sự";
	elseif ($row['capbac']=='2') {
		$row['capbac'] = "Điều hành";
	}
	elseif ($row['capbac']=='3') {
		$row['capbac'] = "Kinh doanh";
	}
	elseif ($row['capbac']==NULL) {
		$row['capbac'] = "Thành viên";
	}
	echo
		"<tr style='height: 50px;'>
			<td>$row[id]</td>
			<td>$row[ten]</td>
			<td>$row[taikhoan]</td>
			<td>$row[diachi]</td>
			<td>$row[email]</td>
			<td>$row[sdt]</td>
			<td>$row[cmnd]</td>
			<td>$row[capbac]</td>
			<td>$row[status]</td>
		
			<td><button class='btn btn-warning edit-user' name='".$row['id']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger delete-user' name='".$row['id']."' id='delete-user$dem' onclick='deleteItem($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>						
		</tr>";
?>
