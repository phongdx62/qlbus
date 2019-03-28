<?php
	$tt = $row['sovebanduoc'] * $row['dongia'];
	$haohut =  $row['sovephatra'] - $row['sovebanduoc'] - $row['sovethuve'];
	echo
		"<tr style='height: 50px;'>
			<td>$row[magdvn]</td>
			<td>$row[ngay]</td>
			<td>$row[mapx]</td>
			<td>$row[tenpx]</td>
			<td>$row[mavn]</td>
			<td>$row[dongia]</td>
			<td>$row[sovephatra]</td>
			<td>$row[sovethuve]</td>
			<td>$row[sovebanduoc]</td>
			<td>$haohut</td>
			<td>$tt</td>

			<td><button class='btn btn-warning edit-bvn' name='".$row['magdvn']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger' name='".$row['magdvn']."' id='delete-bvn$dem' onclick='deleteItemBVN($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>