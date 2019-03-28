<?php
	class c_index
	{
		public function show_index()
		{
			// models
			include("models/m-index.php");
			$index = new m_index();
			$index->index();

			// views
			include("views/v-index.php");
		}
	}
?>