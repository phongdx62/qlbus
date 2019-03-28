<?php
	echo
		"<tr style='height: 100px;'>
			<td>$row[mapx]</td>
			<td>$row[tenpx]</td>
			<td>$row[diachi]</td>
			<td>$row[sdt]</td>
			<td>$row[cmnd]</td>
			<td>$row[ngaysinh]</td>
			<td>$row[luong]</td>
			<td>$row[tentuyen]</td>
			<td><img src='public/core/image/$row[anhpx]' style='width: 140px; height: 100px;'></td>

			<td><button class='btn btn-warning edit-px' name='".$row['mapx']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

            <td><button class='btn btn-danger delete-px' name='".$row['mapx']."' id='delete-px$dem' onclick='deleteItemPX($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>