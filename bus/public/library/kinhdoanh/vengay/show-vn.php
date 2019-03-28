<?php
	if($row["matuyen"]<10)
	{
		$row["matuyen"] = "0".$row["matuyen"];
	}
	echo
		"<tr style='height: 50px;'>
			<td>$row[mavn]</td>
			<td>$row[tenvn]</td>
			<td>$row[dongia]</td>
			<td>$row[matuyen]</td>

			<td><button class='btn btn-warning edit-vn' name='".$row['mavn']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger delete-vn' name='".$row['mavn']."' id='delete-vn$dem' onclick='deleteItemVN($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>
