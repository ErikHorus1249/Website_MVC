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

			$check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sessionId='$sessionId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$message = "Product have already added";
				return $message;
			}else {
			$query_insert = "INSERT INTO tbl_cart(productId,sessionId,productName,price,quantity,image)
			VALUES('$id','$sessionId','$productName','$price','$quantity','$image')";
			$insert_cart = $this->db->insert($query_insert);
			if($insert_cart){
				header('location:cart.php');
			}else{
				header('location:404.php');
			}
		}
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function get_product_cart(){
		$sessionId = session_id();
		$query ="SELECT * FROM tbl_cart WHERE sessionId='$sessionId' order by cartId desc";
		$result = $this->db->select($query);
		return $result;
	}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function update_cart($cartId, $quantity){
			$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
			$result = $this->db->update($query);
			if($result){
					header('location:cart.php');
					$alert = "<span class='success'>Cart updated successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cart hasn't updated</span>";
					return $alert;
				}
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				public function delete_cart($id){

					$query = "DELETE   FROM  tbl_cart WHERE cartId = '$id'";
					$result = $this->db->delete($query);
					if($result){
							$alert = "<span class='success'>Product war deleted successfully</span>";
							return $alert;
						}else{
							$alert = "<span class='error'>Product warn't deleted successfully</span>";
							return $alert;
						}
				}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				public function check_empty_cart(){
					$sessionId = session_id();
					$check_cart = "SELECT * FROM tbl_cart WHERE sessionId='$sessionId'";
					$result_check_cart = $this->db->select($check_cart);
					return $result_check_cart;
				}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			public function delete_data_cart(){
				$sessionId = session_id();
				$check_cart = "DELETE  FROM tbl_cart WHERE sessionId='$sessionId'";
				$result_check_cart = $this->db->delete($check_cart);
				return $result_check_cart;
			}
}

?>
