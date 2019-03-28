<?php
	class c_admin
	{
		public function admin()
		{
			// models
			include("models/m-admin.php");
			$ad = new m_admin();

			if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '0')
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
			include("views/v-admin.php");
		}
	}
?>