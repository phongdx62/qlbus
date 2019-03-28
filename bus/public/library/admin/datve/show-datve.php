<?php
	if ($row["xacnhan"]=='1')
		$row["xacnhan"] = "Đã xác nhận";
	else
		$row["xacnhan"] = "Chưa xác nhận";
	echo
		"<tr style='height: 50px;'>
			<td>$row[madv]</td>
			<td>$row[taikhoan]</td>
			<td>$row[tenvt]</td>
			<td>$row[ghichu]</td>
			<td>$row[xacnhan]</td>

			<td><button class='btn btn-warning edit-dv' name='".$row['madv']."'><span class='glyphicon glyphicon-edit'></span>Xác nhận</button></td>
            <td><button class='btn btn-danger delete-dv' name='".$row['madv']."' id='delete-dv$dem' onclick='deleteItemDV($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>
