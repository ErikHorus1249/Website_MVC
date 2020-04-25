<?php
	include_once './lib/database.php';
	include_once './helper/format.php';
?>


<?php

	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function add_to_cart($id, $quantity){
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link,$id);
			$sessionId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			$price = $result['price'];
			$productName = $result['productName'];
			$image = $result['image'];
			$query_insert = "INSERT INTO tbl_cart(productId,sessionId,productName,price,quantity,image)
			VALUES('$id','$sessionId','$productName','$price','$quantity','$image')";
			$insert_cart = $this->db->insert($query_insert);
			if($insert_cart){
				$alert = "<span class='success'> Insert product successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Insert product not success</span>";
				return $alert;
			}
		}
	}

?>
