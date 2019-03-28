<?php
include('database.php');
	class m_kinhdoanh extends database
	{
		public function __construct()
		{
			$this->connect();
		}

		//--------------------------------vé ngày--------------------------------

		public function m_list_vn()
		{
			$sql = "SELECT * FROM vengay";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-vn.php");
				$dem++;
			}
		}


		public function m_add_vn($tenvn, $dongia, $matuyen)
		{
			$sql = "SELECT mavn FROM vengay WHERE tenvn = '$tenvn' AND matuyen = '$matuyen' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO vengay (tenvn,
									  		dongia,
										    matuyen)	VALUES ('$tenvn',
										   						'$dongia',
											   					'$matuyen')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_vn($mavn, $tenvn, $dongia, $matuyen)
		{
			$sql = "UPDATE vengay 	SET tenvn = '$tenvn',
									 	dongia = '$dongia',
									 	matuyen = '$matuyen'
								 	WHERE mavn = $mavn";
			$this->query($sql);
		}


		public function m_get_vn($mavn)
		{
			$sql = "SELECT vn.*, tentuyen FROM vengay vn
					INNER JOIN tuyen t
					ON vn.matuyen = t.matuyen
					WHERE mavn = $mavn ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_vn($key)
		{
			$sql = "SELECT vn.*, tentuyen FROM vengay vn
					INNER JOIN tuyen t
					ON vn.matuyen = t.matuyen
					WHERE tenvn LIKE '%$key%' OR dongia LIKE '%$key%' OR tentuyen LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-vn.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-vn.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_vn($mavn)
		{
			$sql = "DELETE FROM vengay WHERE mavn = '$mavn' ";
			$this->query($sql);
		}

		//--------------------------------vé tháng--------------------------------

		public function m_list_vt()
		{
			$sql = "SELECT * FROM vethang";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-vt.php");
				$dem++;
			}
		}


		public function m_add_vt($tenvt, $dongia, $ghichu)
		{
			$sql = "SELECT mavt FROM vethang WHERE tenvt = '$tenvt' AND dongia = '$dongia' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO vethang(tenvt,
									  		dongia,
										    ghichu)	VALUES ('$tenvt',
										   					'$dongia',
											   				'$ghichu')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_vt($mavt, $tenvt, $dongia, $ghichu)
		{
			$sql = "UPDATE vethang 	SET tenvt = '$tenvt',
									 	dongia = '$dongia',
									 	ghichu = '$ghichu'
								 	WHERE mavt = $mavt";
			$this->query($sql);
		}


		public function m_get_vt($mavt)
		{
			$sql = "SELECT * FROM vethang WHERE mavt = $mavt";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_vt($key)
		{
			$sql = "SELECT * FROM vethang";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-vt.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-vt.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}


		public function m_del_vt($mavt)
		{
			$sql = "DELETE FROM vethang WHERE mavt = '$mavt' ";
			$this->query($sql);
		}

		//--------------------------------bán vé ngày--------------------------------

		public function m_list_bvn()
		{
			$sql = "SELECT bvn.*, tenpx, dongia FROM banvengay bvn
					INNER JOIN phuxe px ON bvn.mapx = px.mapx
					INNER JOIN vengay vn ON bvn.mavn = vn.mavn";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-bvn.php");
				$dem++;
			}
		}


		public function m_add_bvn($ngay, $mapx, $mavn, $sovephatra, $sovethuve, $sovebanduoc)
		{
			$sql = "SELECT magdvn FROM banvengay WHERE ngay = '$ngay' AND mapx = '$mapx' AND mavn = '$mavn' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO banvengay  (ngay,
									  			mapx,
										    	mavn,
										    	sovephatra,
										    	sovethuve,
										    	sovebanduoc)	VALUES ('$ngay',
										   								'$mapx',
											   							'$mavn',
											   							'$sovephatra',
											   							'$sovethuve',
											   							'$sovebanduoc')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_bvn($magdvn, $ngay, $mapx, $mavn, $sovephatra, $sovethuve, $sovebanduoc)
		{
			$sql = "UPDATE  banvengay 	SET ngay = '$ngay',
									 		mapx = '$mapx',
									 		mavn = '$mavn',
									 		sovephatra = '$sovephatra',
									 		sovethuve = '$sovethuve',
									 		sovebanduoc = '$sovebanduoc'
								 		WHERE magdvn = $magdvn";
			$this->query($sql);
		}


		public function m_get_bvn($magdvn)
		{
			$sql = "SELECT bvn.*, tenpx, dongia FROM banvengay bvn
					INNER JOIN phuxe px ON bvn.mapx = px.mapx
					INNER JOIN vengay vn ON vn.mavn = bvn.mavn
					WHERE magdvn = $magdvn ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_bvn($key)
		{
			$sql = "SELECT bvn.*, tenpx, dongia FROM banvengay bvn
					INNER JOIN phuxe px ON bvn.mapx = px.mapx
					INNER JOIN vengay vn ON bvn.mavn = vn.mavn
					WHERE ngay LIKE '%$key%' OR dongia LIKE '%$key%' OR tenpx LIKE '%$key%' OR bvn.mavn LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-bvn.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-bvn.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_bvn($magdvn)
		{
			$sql = "DELETE FROM banvengay WHERE magdvn = $magdvn";
			$this->query($sql);
		}

		//--------------------------------bán vé tháng--------------------------------

		public function m_list_bvt()
		{
			$sql = "SELECT bvt.*, tennvbvt, dongia FROM banvethang bvt
					INNER JOIN nhanvienbvt nvbvt ON bvt.manvbvt = nvbvt.manvbvt
					INNER JOIN vethang vt ON bvt.mavt = vt.mavt";
			$this->query($sql);
			$dem=1;
			while($row = $this->fetch_assoc())
			{
				require("show-bvt.php");
				$dem++;
			}
		}


		public function m_add_bvt($ngay, $manvbvt, $mavt, $sovephatra, $sovethuve, $sovebanduoc)
		{
			$sql = "SELECT magdvt FROM banvethang WHERE ngay = '$ngay' AND manvbvt = '$manvbvt' AND mavt = '$mavt' ";
			$this->query($sql);
			$num = $this->num_rows();
			if($num == 0)
			{
				$sql = "INSERT INTO banvethang (ngay,
									  			manvbvt,
										    	mavt,
										    	sovephatra,
										    	sovethuve,
										    	sovebanduoc) 	VALUES ('$ngay',
										   								'$manvbvt',
											   							'$mavt',
											   							'$sovephatra',
											   							'$sovethuve',
											   							'$sovebanduoc')";
				$this->query($sql);
			}
			else
			{
				return "fail";
			}
		}


		public function m_edit_bvt($magdvt, $ngay, $manvbvt, $mavt, $sovephatra, $sovethuve, $sovebanduoc)
		{
			$sql = "UPDATE  banvethang 	SET ngay = '$ngay',
									 		manvbvt = '$manvbvt',
									 		mavt = '$mavt',
									 		sovephatra = '$sovephatra',
									 		sovethuve = '$sovethuve',
									 		sovebanduoc = '$sovebanduoc'
								 		WHERE magdvt = $magdvt";
			$this->query($sql);
		}


		public function m_get_bvt($magdvt)
		{
			$sql = "SELECT bvt.*, tennvbvt, dongia FROM banvethang bvt
					INNER JOIN nhanvienbvt nvbvt ON bvt.manvbvt = nvbvt.manvbvt
					INNER JOIN vethang vt ON vt.mavt = bvt.mavt
					WHERE magdvt = $magdvt ";
			$this->query($sql);
			$row = $this->fetch_assoc();
			return $row;
		}


		public function m_search_bvt($key)
		{
			$sql = "SELECT bvt.*, tennvbvt, dongia FROM banvethang bvt
					INNER JOIN nhanvienbvt nvbvt ON bvt.manvbvt = nvbvt.manvbvt
					INNER JOIN vethang vt ON bvt.mavt = vt.mavt
					WHERE ngay LIKE '%$key%' OR dongia LIKE '%$key%' OR tennvbvt LIKE '%$key%' OR bvt.mavt LIKE '%$key%' ";
			$this->query($sql);
			$num = $this->num_rows();
			if ($num > 0 && $key != "")
            {
                echo "<p style='color:#0000FF;'>$num kết quả trả về với từ khóa <b>$key</b></p>";
                echo '<table border="1" cellspacing="0" cellpadding="10">';
                require("table-bvt.php");
                $dem=1;
                while ($row = $this->fetch_assoc())
                {
                    require("show-bvt.php");
                    $dem++;
                }
            }
            else
            {
                echo"<p style='color:red;'>* Không tìm thấy kết quả!</p>";
            }
		}

		public function m_del_bvt($magdvt)
		{
			$sql = "DELETE FROM banvethang WHERE magdvt = $magdvt";
			$this->query($sql);
		}
	}
?>