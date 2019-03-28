<?php
	echo
		"<tr style='height: 100px;'>
			<td>$dem</td>
			<td>$row[tentuyen]</td>
			<td>$row[chieudi]</td>
			<td>$row[chieuve]</td>

			<td><button class='btn btn-warning edit-luuthong' name='".$row['matuyen']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>

		        <td><button class='btn btn-danger' name='".$row['matuyen']."' id='delete-lt$dem' onclick='deleteItemLT($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>
