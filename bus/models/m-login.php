<?php
	include("database.php");
	class m_dangnhap extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		public function check_login($tk, $mk)
		{
			$sql = "SELECT * FROM nguoidung WHERE taikhoan = '$tk' AND matkhau = '$mk' ";
			$this->query($sql);
			if($this->num_rows()==1)
			{
				$row = $this->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['ten'] = $row['ten'];
				$_SESSION['tk'] = $row['taikhoan'];
				$_SESSION['cb'] = $row['capbac'];
 			}
			else
			{
				return 'fail';
			}
		}
	}
?>