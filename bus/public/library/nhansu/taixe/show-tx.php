<?php
	echo
		"<tr style='height: 100px;'>
			<td>$row[matx]</td>
			<td>$row[tentx]</td>
			<td>$row[diachi]</td>
			<td>$row[sdt]</td>
			<td>$row[cmnd]</td>
			<td>$row[ngaysinh]</td>
			<td>$row[luong]</td>
			<td>$row[loaibang]</td>
			<td>$row[tentuyen]</td>
			<td><img src='public/core/image/$row[anhtx]' style='width: 140px; height: 100px;'></td>

			<td><button class='btn btn-warning edit-tx' name='".$row['matx']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

            <td><button class='btn btn-danger delete-vn' name='".$row['matx']."' id='delete-tx$dem' onclick='deleteItemTX($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>