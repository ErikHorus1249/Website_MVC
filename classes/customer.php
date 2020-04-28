<?php
	include_once './lib/database.php';
	include_once './helper/format.php';
?>

<?php

	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

    public function insert_customer($data){

      $name = mysqli_real_escape_string($this->db->link, $data['name']);
      $address = mysqli_real_escape_string($this->db->link, $data['address']);
      $city = mysqli_real_escape_string($this->db->link, $data['city']);
      $country = mysqli_real_escape_string($this->db->link, $data['country']);
      $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
      $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
      $mail = mysqli_real_escape_string($this->db->link, $data['mail']);
      $password = mysqli_real_escape_string($this->db->link, $data['password']);

      if($name=="" || $address=="" || $city=="" || $country=="" || $zipcode=="" || $phone=="" || $mail=="" || $password==""){
				$alert = "<span class='success'>content must be not empty</span>";
				return $alert;
			}else {
				$check_customer = "SELECT * FROM tbl_customer WHERE mail = '$mail' ";
				$result_check_customer = $this->db->select($check_customer);
				if($result_check_customer){
					$message ="<span class='error'> account have already added</span>";
					return $message;
				}else {

				$query = "INSERT INTO tbl_customer(name, address, city, country, zipCode, phone, mail, password)
        VALUES('$name','$address','$city','$country','$zipcode','$phone', '$mail', '$password')";
				$result = $this->db->insert($query);
        if($result){
					$alert = "<span class='success'> Creating product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert product not success</span>";
					return $alert;
					}
				}
      }
    }
//######################################################################################################################
		public function login_customer($data){

			$mail = mysqli_real_escape_string($this->db->link, $data['mail']);
      $password = mysqli_real_escape_string($this->db->link, $data['password']);
			if($mail=="" || $password==""){
				$alert = "<span class='error'>Field must be not empty</span>";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_customer WHERE mail = '$mail' AND password = '$password'";
				$result = $this->db->select($query);
				if($result){
					$sessionInfo = $result->fetch_assoc();
					Session::set('customerId',true);
					Session::set('customerName',$sessionInfo['name']);
					Session::set('customerid',$sessionInfo['id']);
					header('location:order.php');
				}else {
					$alert = "<span class='error'> Email or password is invalid</span>";
					return $alert;
					header('location:404.php');
				}
			}
		}
//######################################################################################################################
		public function show_customer($id){
			$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
			return $result = $this->db->select($query);
		}

//######################################################################################################################
	public function update_customer($id,$data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		//$city = mysqli_real_escape_string($this->db->link, $data['city']);
		//$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$mail = mysqli_real_escape_string($this->db->link, $data['mail']);
		//$password = mysqli_real_escape_string($this->db->link, $data['password']);

		// if($name=="" || $address=="" || $city=="" || $country=="" || $zipcode=="" || $phone=="" || $mail=="" || $password==""){
		if($name=="" || $address=="" || $zipcode=="" || $phone=="" || $mail=="" ){
			$alert = "<span class='success'>Field must be not empty</span>";
			return $alert;
		}else {

			$query = "UPDATE tbl_customer
			SET name = '$name', address='$address', zipcode='$zipcode', phone = '$phone', mail = '$mail'
			WHERE id = '$id'";
			$result = $this->db->update($query);
			if($result){
				$alert = "<span class='success'> Update custumer info successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Update customer info not success</span>";
				return $alert;
			}
		}
	}


}

?>
