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
        $query = "INSERT INTO tbl_customer(name, address, city, country, zipCode, phone, mail, password)
        VALUES('$name','$address','$city','$country','$zipcode','$phone', '$mail', '$password')";
				$result = $this->db->insert($query);
        if($result){
					$alert = "<span class='success'> Insert product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert product not success</span>";
					return $alert;
				}
      }
    }

}

?>
