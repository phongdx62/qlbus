<?php
	include('database.php');
	class m_index extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		public function index()
		{
			$sql = "SELECT matuyen, tentuyen FROM tuyen";
			$this->query($sql);
		}

		public function thongtin($matuyen)
		{
			$sql = "SELECT t.*, dongia, soghe FROM tuyen t
					INNER JOIN vengay vn
					ON t.matuyen = vn.matuyen
					INNER JOIN xe x
					ON t.matuyen = x.matuyen
			 		WHERE t.matuyen = '$matuyen' ";
			$this->query($sql);
		}

		public function timkiem($key)
		{
			$sql = "SELECT t.*, dongia, soghe FROM tuyen t
					INNER JOIN vengay vn
					ON t.matuyen = vn.matuyen
					INNER JOIN xe x
					ON t.matuyen = x.matuyen
			 		WHERE t.matuyen = '$key' OR tentuyen LIKE '$key' ";
			$this->query($sql);
		}

		public function m_add_dv($id,$mavt)
		{
			$sql = "SELECT madv FROM datve WHERE id = '$id' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO datve  (id,
										    mavt)	VALUES ('$id',
										   					'$mavt')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}

		public function m_add_ph($id,$noidung)
		{
			$sql = "SELECT madv FROM phanhoi WHERE id = '$id' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO phanhoi	(id,
										     noidung)	VALUES ('$id',
										   						'$noidung')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}
	}
?>