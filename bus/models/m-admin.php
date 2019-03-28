<?php
	include('database.php');
	class m_admin extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		//--------------------------------người dùng--------------------------------

		public function m_list_user()
		{
			$sql = "SELECT * From nguoidung WHERE capbac != '0' ";
			$this->query($sql);
			$dem = 1;
			while($row = $this->fetch_assoc())
			{
				require("show-user.php");
				$dem++;
			}
		}


		public function m_edit_user($id, $ten, $diachi, $sdt, $cmnd, $email, $capbac, $status)
		{
			$sql = "UPDATE nguoidung SET ten = '$ten',
									 diachi = '$diachi',
									 sdt = '$sdt',
									 cmnd = '$cmnd',
									 email = '$email',
									 capbac = '$capbac',
									 status = '$status'
								 WHERE id = $id";
			$this->query($sql);
		}

		public function m_edit_profile($id, $diachi, $sdt, $email, $matkhaumoi)
		{
			$sql = "UPDATE nguoidung SET diachi = '$diachi',
									 	 sdt = '$sdt',
										 email = '$email',
										 matkhau = '$matkhaumoi'
									 WHERE id = $id";
			$this->query($sql);
		}


		public function m_get_user($id)
		{
			$sql = "SELECT * FROM nguoidung
					WHERE id = $id ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_user($key)
		{
			$sql = "SELECT * FROM nguoidung
					WHERE ten LIKE '%$key%' OR diachi LIKE '%$key%' OR sdt LIKE '%$key%' OR cmnd LIKE '%$key%' OR capbac LIKE '%$key%' AND capbac != '0' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-user.php");
                $dem = 1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-user.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_user($id)
		{
			$sql = "DELETE FROM nguoidung WHERE id = '$id' ";
			$this->query($sql);
		}

		//--------------------------phản hồi----------------------------------

		public function m_list_phanhoi()
		{
			$sql = "SELECT * From phanhoi ph
					INNER JOIN nguoidung nd
					ON ph.id = nd.id";
			$this->query($sql);
			$dem = 1;
			while($row = $this->fetch_assoc())
			{
				require("show-phanhoi.php");
				$dem++;
			}
		}

		public function m_get_phanhoi($maph)
		{
			$sql = "SELECT * FROM phanhoi ph
					INNER JOIN nguoidung nd
					ON ph.id = nd.id
					WHERE maph = $maph";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}

		public function m_search_phanhoi($key)
		{
			$sql = "SELECT * From phanhoi ph
					INNER JOIN nguoidung nd
					ON ph.id = nd.id
					WHERE maph LIKE '%$key%' OR taikhoan LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-phanhoi.php");
                $dem = 1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-phanhoi.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_phanhoi($maph)
		{
			$sql = "DELETE FROM phanhoi WHERE maph = '$maph' ";
			$this->query($sql);
		}

		//--------------------------đặt vé----------------------------------

		public function m_list_datve()
		{
			$sql = "SELECT * FROM datve dv
					INNER JOIN nguoidung nd
					ON dv.id = nd.id
					INNER JOIN vethang vt
					ON dv.mavt = vt.mavt";
			$this->query($sql);
			$dem = 1;
			while($row = $this->fetch_assoc())
			{
				require("show-datve.php");
				$dem++;
			}
		}

		public function m_get_datve($madv)
		{
			$sql = "SELECT * FROM datve dv
					INNER JOIN nguoidung nd
					ON dv.id = nd.id
					INNER JOIN vethang vt
					ON dv.mavt = vt.mavt
					WHERE madv = $madv";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}

		public function m_edit_datve($madv, $xacnhan)
		{
			$sql = "UPDATE datve SET xacnhan = '$xacnhan'
								 WHERE madv = $madv";
			$this->query($sql);
		}

		public function m_search_datve($key)
		{
			$sql = "SELECT * FROM datve dv
					INNER JOIN nguoidung nd
					ON dv.id = nd.id
					INNER JOIN vethang vt
					ON dv.mavt = vt.mavt
					WHERE tenvt LIKE '%$key%' OR ghichu LIKE '%$key%' OR taikhoan LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-datve.php");
                $dem = 1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-datve.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_datve($madv)
		{
			$sql = "DELETE FROM datve WHERE madv = '$madv' ";
			$this->query($sql);
		}

	}
?>