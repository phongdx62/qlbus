<?php
	class c_kinhdoanh
	{
		public function kinhdoanh()
		{
			// models
			include("models/m-kinhdoanh.php");
			$kd = new m_kinhdoanh();

			if(isset($_SESSION["tk"]) && $_SESSION["cb"] == '3')
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
			include("views/v-kinhdoanh.php");
		}
	}
?>