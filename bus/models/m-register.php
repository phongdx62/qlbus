<?php
	include("database.php");
	class m_dangky extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		public function m_register($ten,$diachi,$email,$cmnd,$sdt,$taikhoan,$matkhau,$activation)
		{
			$sql = "SELECT id FROM nguoidung WHERE taikhoan = '$taikhoan' ";
			$this->query($sql);
			if($this->num_rows()==0)
			{
				$sql = "INSERT INTO nguoidung  (ten,
							    				diachi,
							    				email,
							    				cmnd,
							    				sdt,
							    				taikhoan,
							    				matkhau,
							    				capbac,
							    				activation) VALUES ('$ten',
							    									'$diachi',
												    				'$email',
												    				'$cmnd',
																	'$sdt',
																	'$taikhoan',
																	'$matkhau',
																	'NULL',
																	'$activation')";

				$this->query($sql);
			}
			else
			{
				return 'fail' ;
			}
		}

	}
?>