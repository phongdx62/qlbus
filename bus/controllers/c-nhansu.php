<?php
	class c_nhansu
	{
		public function nhansu()
		{
			// models
			include("models/m-nhansu.php");
			$ns = new m_nhansu();

			if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '1')
		    {
				// ...
		    }
			else
			{
				ob_start();
				header('Location: ./index.php');
				ob_end_flush();
			}

			// views
			include("views/v-nhansu.php");
		}
	}
?>