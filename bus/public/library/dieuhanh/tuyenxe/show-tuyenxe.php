<?php
	echo
		"<tr style='height: 100px;'>
			<td>$row[matuyen]</td>
			<td>$row[tentuyen]</td>
			<td>$row[giobd]</td>
			<td>$row[giokt]</td>
			<td>$row[tansuat]</td>
			<td>$row[soluongxe]</td>

			<td><button class='btn btn-warning edit-tuyenxe' name='".$row['matuyen']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

	        <td><button class='btn btn-danger' name='".$row['matuyen']."' id='delete-tuyen$dem' onclick='deleteItemTuyen($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>
