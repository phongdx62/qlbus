<?php
include('database.php');
	class m_nhansu extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		//--------------------------------tài xế--------------------------------

		public function m_list_tx()
		{
			$sql = "SELECT tx.*, tentuyen FROM taixe tx
					INNER JOIN tuyen t
					ON tx.matuyen = t.matuyen";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-tx.php");
				$dem++;
			}
		}


		public function m_add_tx($tentx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $loaibang, $matuyen, $anhtx)
		{
			$sql = "SELECT matx FROM taixe WHERE cmnd = '$cmnd' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO taixe  (tentx,
									  		diachi,
										  	sdt,
										  	ngaysinh,
										  	cmnd,
										    loaibang,
										    luong,
										    matuyen,
										    anhtx)	VALUES ('$tentx',
										   					'$diachi',
										   					'$sdt',
										   					'$ngaysinh',
										   					'$cmnd',
										   					'$loaibang',
										   					'$luong',
										   					'$matuyen',
										   					'$anhtx')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_tx($matx, $tentx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $loaibang, $matuyen, $anhtx)
		{
			$sql = "UPDATE taixe SET tentx = '$tentx',
									 diachi = '$diachi',
									 sdt = '$sdt',
									 cmnd = '$cmnd',
									 ngaysinh = '$ngaysinh',
									 luong = '$luong',
									 loaibang = '$loaibang',
									 matuyen = '$matuyen',
									 anhtx = '$anhtx'
								 WHERE matx = $matx";
			$this->query($sql);
		}


		public function m_get_tx($matx)
		{
			$sql = "SELECT tx.*, tentuyen FROM taixe tx
					INNER JOIN tuyen t
					ON tx.matuyen = t.matuyen
					WHERE matx = $matx ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_tx($key)
		{
			$sql = "SELECT tx.*, tentuyen FROM taixe tx
					INNER JOIN tuyen t
					ON tx.matuyen = t.matuyen
					WHERE tentx LIKE '%$key%' OR diachi LIKE '%$key%' OR sdt LIKE '%$key%' OR cmnd LIKE '%$key%' OR tentuyen LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-tx.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-tx.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_tx($matx)
		{
			$sql = "DELETE FROM taixe WHERE matx = '$matx' ";
			$this->query($sql);
		}

		//--------------------------------phụ xe--------------------------------

		public function m_list_px()
		{
			$sql = "SELECT px.*, tentuyen FROM phuxe px
					INNER JOIN tuyen t
					ON px.matuyen = t.matuyen";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-px.php");
				$dem++;
			}
		}


		public function m_add_px($tenpx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $matuyen, $anhpx)
		{
			$sql = "SELECT mapx FROM phuxe WHERE cmnd = '$cmnd' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO phuxe  (tenpx,
									  		diachi,
										  	sdt,
										  	ngaysinh,
										  	cmnd,
										    luong,
										    matuyen,
										    anhpx)	VALUES ('$tenpx',
										   					'$diachi',
										   					'$sdt',
										   					'$ngaysinh',
										   					'$cmnd',
										   					'$luong',
										   					'$matuyen',
										   					'$anhpx')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_px($mapx, $tenpx, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $matuyen, $anhpx)
		{
			$sql = "UPDATE phuxe SET tenpx = '$tenpx',
									 diachi = '$diachi',
									 sdt = '$sdt',
									 cmnd = '$cmnd',
									 ngaysinh = '$ngaysinh',
									 luong = '$luong',
									 matuyen = '$matuyen',
									 anhpx = '$anhpx'
								 WHERE mapx = $mapx";
			$this->query($sql);
		}


		public function m_get_px($mapx)
		{
			$sql = "SELECT px.*, tentuyen FROM phuxe px
					INNER JOIN tuyen t
					ON px.matuyen = t.matuyen
					WHERE mapx = $mapx ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_px($key)
		{
			$sql = "SELECT px.*, tentuyen FROM phuxe px
					INNER JOIN tuyen t
					ON px.matuyen = t.matuyen
					WHERE tenpx LIKE '%$key%' OR diachi LIKE '%$key%' OR sdt LIKE '%$key%' OR cmnd LIKE '%$key%' OR tentuyen LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-px.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-px.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_px($mapx)
		{
			$sql = "DELETE FROM phuxe WHERE mapx = $mapx";
			$this->query($sql);
		}

		//--------------------------------nhân viên bán vé tháng--------------------------------

		public function m_list_nvbvt()
		{
			$sql = "SELECT nvbvt.*, tendbvt FROM nhanvienbvt nvbvt
					INNER JOIN diembvt dbvt
					ON nvbvt.madbvt = dbvt.madbvt";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-nvbvt.php");
				$dem++;
			}
		}


		public function m_add_nvbvt($tennvbvt, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $madbvt, $anhnvbvt)
		{
			$sql = "SELECT manvbvt FROM nhanvienbvt WHERE cmnd = '$cmnd' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO nhanvienbvt  (tennvbvt,
									  		diachi,
										  	sdt,
										  	ngaysinh,
										  	cmnd,
										    luong,
										    madbvt,
										    anhnvbvt)	VALUES ('$tennvbvt',
										   					'$diachi',
										   					'$sdt',
										   					'$ngaysinh',
										   					'$cmnd',
										   					'$luong',
										   					'$madbvt',
										   					'$anhnvbvt')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_nvbvt($manvbvt, $tennvbvt, $diachi, $sdt, $cmnd, $ngaysinh, $luong, $madbvt, $anhnvbvt)
		{
			$sql = "UPDATE nhanvienbvt SET tennvbvt = '$tennvbvt',
									 diachi = '$diachi',
									 sdt = '$sdt',
									 cmnd = '$cmnd',
									 ngaysinh = '$ngaysinh',
									 luong = '$luong',
									 madbvt = '$madbvt',
									 anhnvbvt = '$anhnvbvt'
								 WHERE manvbvt = $manvbvt";
			$this->query($sql);
		}


		public function m_get_nvbvt($manvbvt)
		{
			$sql = "SELECT nvbvt.*, tendbvt FROM nhanvienbvt nvbvt
					INNER JOIN diembvt dbvt
					ON nvbvt.madbvt = dbvt.madbvt
					WHERE manvbvt = $manvbvt ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_nvbvt($key)
		{
			$sql = "SELECT nvbvt.*, tendbvt FROM nhanvienbvt nvbvt
					INNER JOIN diembvt dbvt
					ON nvbvt.madbvt = dbvt.madbvt
					WHERE tennvbvt LIKE '%$key%' OR nvbvt.sdt = '%$key%' OR cmnd = '%$key%' OR tendbvt LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-nvbvt.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-nvbvt.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_nvbvt($manvbvt)
		{
			$sql = "DELETE FROM nhanvienbvt WHERE manvbvt = $manvbvt";
			$this->query($sql);
		}

		//--------------------------------điểm bán vé tháng--------------------------------

		public function m_list_dbvt()
		{
			$sql = "SELECT * FROM diembvt";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-dbvt.php");
				$dem++;
			}
		}


		public function m_add_dbvt($tendbvt, $diachi, $sdt)
		{
			$sql = "SELECT madbvt FROM diembvt WHERE tendbvt = '$tendbvt' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO diembvt(tendbvt,
									  		diachi,
										  	sdt)	VALUES ('$tendbvt',
										   					'$diachi',
										   					'$sdt')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_dbvt($madbvt, $tendbvt, $diachi, $sdt)
		{
			$sql = "UPDATE diembvt SET 	tendbvt = '$tendbvt',
									 	diachi = '$diachi',
									 	sdt = '$sdt'
								   WHERE madbvt = $madbvt";
			$this->query($sql);
		}


		public function m_get_dbvt($madbvt)
		{
			$sql = "SELECT * FROM diembvt
					WHERE madbvt = $madbvt ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_dbvt($key)
		{
			$sql = "SELECT * FROM diembvt
					WHERE tendbvt LIKE '%$key%' OR sdt = '%$key%' OR diachi LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-dbvt.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-dbvt.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_dbvt($madbvt)
		{
			$sql = "DELETE FROM diembvt WHERE madbvt = $madbvt";
			$this->query($sql);
		}
	}
?>