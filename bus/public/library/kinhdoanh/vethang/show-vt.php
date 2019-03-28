<?php
	echo
		"<tr style='height: 50px;'>
			<td>$row[mavt]</td>
			<td>$row[tenvt]</td>
			<td>$row[dongia]</td>
			<td>$row[ghichu]</td>

			<td><button class='btn btn-warning edit-vt' name='".$row['mavt']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger delete-vn' name='".$row['mavt']."' id='delete-vt$dem' onclick='deleteItemVT($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>