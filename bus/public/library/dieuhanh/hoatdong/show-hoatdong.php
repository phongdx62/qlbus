<?php
	echo
		"<tr style='height: 100px;'>
			<td>$row[mahd]</td>
			<td>$row[ngay]</td>
			<td>$row[ca]</td>
			<td>$row[bienso]</td>
			<td>$row[matuyen]</td>
			<td>$row[tentuyen]</td>
			<td>$row[matx]</td>
			<td>$row[tentx]</td>
			<td>$row[mapx]</td>
			<td>$row[tenpx]</td>

			<td><button class='btn btn-warning edit-hoatdong' name='".$row['mahd']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

		        <td><button class='btn btn-danger' name='".$row['mahd']."' id='delete-hd$dem' onclick='deleteItemHD($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>