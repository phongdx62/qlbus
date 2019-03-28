<?php
	class c_dieuhanh
	{
		public function dieuhanh()
		{
			// models
			include("models/m-dieuhanh.php");
			$dh = new m_dieuhanh();

			if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '2')
		    {
				//...
		    }
			else
			{
				ob_start();
				header('Location: ./index.php');
				ob_end_flush();
			}

			// views
			include("views/v-dieuhanh.php");
		}
	}
?>