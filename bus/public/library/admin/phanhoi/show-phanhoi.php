<?php
	echo
		"<tr style='height: 50px;'>
			<td>$row[maph]</td>
			<td>$row[taikhoan]</td>
			<td>$row[noidung]</td>

			<td><a href='public/library/admin/phanhoi/traloi.php?maph=$row[maph]' class='btn btn-warning edit-ph' ><span class='glyphicon glyphicon-edit'></span>Trả lời</a></td>
            <td><button class='btn btn-danger delete-ph' name='".$row['maph']."' id='delete-ph$dem' onclick='deleteItemPH($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>
<!-- <td><button class='btn btn-warning edit-ph' name='".$row['maph']."'><span class='glyphicon glyphicon-edit'></span>Trả lời</button></td> -->