<?php
	include_once '../lib/database.php';
	include_once '../helper/format.php';
?>


<?php

	class user
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


	}

?>
