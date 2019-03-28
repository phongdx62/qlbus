<?php
include('database.php');
	class m_dieuhanh extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		//--------------------------------xe--------------------------------

		public function m_list_xe()
		{
			$sql = "SELECT x.*, tentuyen FROM xe x
					INNER JOIN tuyen t
					ON x.matuyen = t.matuyen";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-xe.php");
				$dem++;
			}
		}


		public function m_add_xe($bienso, $hangsx, $namsx, $nhacc, $soghe, $matuyen, $anhxe)
		{
			$sql = "SELECT bienso FROM xe WHERE bienso = '$bienso' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO xe (bienso,
										hangsx,
									  	namsx,
										nhacc,
										soghe,
										matuyen,
										anhxe)	VALUES ('$bienso',
														'$hangsx',
										   				'$namsx',
										   				'$nhacc',
										   				'$soghe',
										   				'$matuyen',
										   				'$anhxe')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_xe($bienso, $biensomoi, $hangsx, $namsx, $nhacc, $soghe, $matuyen, $anhxe)
		{
			$sql = "UPDATE xe SET   bienso = '$biensomoi',
									hangsx = '$hangsx',
									namsx = '$namsx',
									nhacc = '$nhacc',
									soghe = '$soghe',
									matuyen = '$matuyen',
									anhxe = '$anhxe'
					WHERE bienso = '$bienso' ";
			$this->query($sql);
		}


		public function m_get_xe($bienso)
		{
			$sql = "SELECT x.*, tentuyen FROM xe x
					INNER JOIN tuyen t
					ON x.matuyen = t.matuyen
					WHERE bienso = '$bienso' ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_xe($key)
		{
			$sql = "SELECT x.*, tentuyen FROM xe x
					INNER JOIN tuyen t
					ON x.matuyen = t.matuyen
					WHERE bienso LIKE '%$key%' OR hangsx LIKE '%$key%' OR nhacc LIKE '%$key%' OR tentuyen LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-xe.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-xe.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_xe($bienso)
		{
			$sql = "DELETE FROM xe WHERE bienso = '$bienso' ";
			$this->query($sql);
		}

		//--------------------------------tuyến xe--------------------------------

		public function m_list_tuyenxe()
		{
			$sql = "SELECT * FROM tuyen";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-tuyenxe.php");
				$dem++;
			}
		}


		public function m_add_tuyenxe($tentuyen, $giobd, $giokt, $tansuat, $soluongxe)
		{
			$sql = "SELECT matuyen FROM tuyen WHERE tentuyen = '$tentuyen' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO tuyen  (tentuyen,
									  		giobd,
											giokt,
											tansuat,
											soluongxe)	VALUES ('$tentuyen',
										   						'$giobd',
										   						'$giokt',
										   						'$tansuat',
										   						'$soluongxe')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_tuyenxe($matuyen, $tentuyen, $giobd, $giokt, $tansuat, $soluongxe)
		{
			$sql = "UPDATE tuyen SET  tentuyen = '$tentuyen',
										giobd = '$giobd',
										giokt = '$giokt',
										tansuat = '$tansuat',
										soluongxe = '$soluongxe'
					WHERE matuyen = '$matuyen' ";
			$this->query($sql);
		}


		public function m_get_tuyenxe($matuyen)
		{
			$sql = "SELECT * FROM tuyen
					WHERE matuyen = '$matuyen' ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_tuyenxe($key)
		{
			$sql = "SELECT * FROM tuyen
					WHERE matuyen LIKE '%$key%' OR tentuyen LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-tuyenxe.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-tuyenxe.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_tuyenxe($matuyen)
		{
			$sql = "DELETE FROM tuyen WHERE matuyen = '$matuyen' ";
			$this->query($sql);
		}

		//--------------------------------lưu thông--------------------------------

		public function m_list_luuthong()
		{
			$sql = "SELECT matuyen, tentuyen, chieudi, chieuve FROM tuyen";
			$this->query($sql);
			$dem = 1;
			while($row = $this->fetch_assoc())
			{
				require("show-luuthong.php");
				$dem++;
			}
		}


		public function m_add_luuthong($tentuyen, $chieudi, $chieuve)
		{
			$sql = "SELECT matuyen FROM tuyen WHERE tentuyen = '$tentuyen' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO tuyen  (tentuyen,
											chieudi,
											chieuve)	VALUES ('$tentuyen',
										   						'$chieudi',
										   						'$chieuve')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_luuthong($matuyen, $tentuyen, $chieudi, $chieuve)
		{
			$sql = "UPDATE tuyen SET  	tentuyen = '$tentuyen',
										chieudi = '$chieudi',
										chieuve = '$chieuve'
					WHERE matuyen = '$matuyen' ";
			$this->query($sql);
		}


		public function m_get_luuthong($matuyen)
		{
			$sql = "SELECT tentuyen, chieudi, chieuve FROM tuyen
					WHERE matuyen = '$matuyen' ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_luuthong($key)
		{
			$sql = "SELECT * FROM tuyen
					WHERE matuyen LIKE '%$key%' OR tentuyen LIKE '%$key%' OR chieudi LIKE '%$key%' OR chieuve LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-luuthong.php");

                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-luuthong.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		//--------------------------------hoạt động--------------------------------

		public function m_list_hoatdong()
		{
			$sql = "SELECT hd.*, bienso, tentuyen, tentx, tenpx FROM hoatdong hd
					INNER JOIN tuyen t ON hd.matuyen = t.matuyen
					INNER JOIN taixe tx ON hd.matx = tx.matx
					INNER JOIN phuxe px ON hd.mapx = px.mapx";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-hoatdong.php");
				$dem++;
			}
		}


		public function m_add_hoatdong($ngay, $ca, $bienso, $matuyen, $matx, $mapx)
		{
			$sql = "SELECT mahd FROM hoatdong WHERE ca = '$ca' AND bienso = '$bienso' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO hoatdong   (ngay,
												ca,
												bienso,
												matuyen,
												matx,
												mapx)	VALUES ('$ngay',
										   						'$ca',
										   						'$bienso',
										   						'$matuyen',
										   						'$matx',
										   						'$mapx')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_hoatdong($mahd, $ngay, $ca, $bienso, $matuyen, $matx, $mapx)
		{
			$sql = "UPDATE hoatdong SET ngay = '$ngay',
										ca = '$ca',
										bienso = '$bienso',
										matuyen = '$matuyen',
										matx = '$matx',
										mapx = '$mapx'
					WHERE mahd = '$mahd' ";
			$this->query($sql);
		}


		public function m_get_hoatdong($mahd)
		{
			$sql = "SELECT hd.*, bienso, tentuyen, tentx, tenpx FROM hoatdong hd
					INNER JOIN tuyen t ON hd.matuyen = t.matuyen
					INNER JOIN taixe tx ON hd.matx = tx.matx
					INNER JOIN phuxe px ON hd.mapx = px.mapx
					WHERE mahd = $mahd";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_hoatdong($key)
		{
			$sql = "SELECT hd.*, bienso, tentuyen, tentx, tenpx FROM hoatdong hd
					INNER JOIN tuyen t ON hd.matuyen = t.matuyen
					INNER JOIN taixe tx ON hd.matx = tx.matx
					INNER JOIN phuxe px ON hd.mapx = px.mapx
					WHERE ngay LIKE '%$key%' OR ca LIKE '%$key%' OR bienso LIKE '%$key%' OR tentuyen LIKE '%key%' OR tentx LIKE '%key%' OR tenpx LIKE '%key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-hoatdong.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-hoatdong.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_hoatdong($mahd)
		{
			$sql = "DELETE FROM hoatdong WHERE mahd = '$mahd' ";
			$this->query($sql);
		}
	}
?>