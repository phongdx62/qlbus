<?php
	echo
		"<tr style='height: 100px;'>
			<td>$row[madbvt]</td>
			<td>$row[tendbvt]</td>
			<td>$row[diachi]</td>
			<td>$row[sdt]</td>

			<td><button class='btn btn-warning edit-dbvt' name='".$row['madbvt']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger delete-dbvt' name='".$row['madbvt']."' id='delete-dbvt$dem' onclick='deleteItemDBVT($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>