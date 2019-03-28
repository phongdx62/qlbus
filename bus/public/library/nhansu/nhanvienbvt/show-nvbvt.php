<?php  
	echo
		"<tr style='height: 100px;'>
			<td>$row[manvbvt]</td>
			<td>$row[tennvbvt]</td>
			<td>$row[diachi]</td>
			<td>$row[sdt]</td>
			<td>$row[cmnd]</td>
			<td>$row[ngaysinh]</td>
			<td>$row[luong]</td>
			<td>$row[tendbvt]</td>
			<td><img src='public/core/image/$row[anhnvbvt]' style='width: 140px; height: 100px;'></td>
		
			<td><button class='btn btn-warning edit-nvbvt' name='".$row['manvbvt']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

            <td><button class='btn btn-danger delete-nvbvt' name='".$row['manvbvt']."' id='delete-nvbvt$dem' onclick='deleteItemNVBVT($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>