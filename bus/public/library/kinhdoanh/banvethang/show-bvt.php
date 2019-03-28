<?php
	$tt = $row['sovebanduoc'] * $row['dongia'];
	$haohut =  $row['sovephatra'] - $row['sovebanduoc'] - $row['sovethuve'];
	$thang = date("m",strtotime($row['ngay']));
	echo
		"<tr style='height: 50px;'>
			<td>$row[magdvt]</td>
			<td>$row[ngay]</td>
			<td>$row[manvbvt]</td>
			<td>$row[tennvbvt]</td>
			<td>$row[mavt]</td>
			<td>$thang</td>
			<td>$row[dongia]</td>
			<td>$row[sovephatra]</td>
			<td>$row[sovethuve]</td>
			<td>$row[sovebanduoc]</td>
			<td>$haohut</td>
			<td>$tt</td>

			<td><button class='btn btn-warning edit-bvt' name='".$row['magdvt']."'><span class='glyphicon glyphicon-edit'></span>Sửa</button></td>
            <td><button class='btn btn-danger delete-bvt' name='".$row['magdvt']."' id='delete-bvt$dem' onclick='deleteItemBVT($dem)'><span class='glyphicon glyphicon-trash'></span>Xóa</button></td>
		</tr>";
?>