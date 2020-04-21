<?php

	include '../lib/database.php';
	include '../helper/format.php';
?>


<?php
	/**
	 * 
	 */
	class brand
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_brand($brandName){

			$brandName = $this->fm->validation($brandName);

			$brandName = mysqli_real_escape_string($this->db->link, $brandName); 

			if(empty($brandName)){
				$alert = "<span class='success'>Brand name must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'> Insert brand successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Insert brand not success</span>";
					return $alert;
				}
			}
		}

		public function show_category(){
			$query = "SELECT  * FROM  tbl_category order by catID desc ";
			$result = $this->db->select($query);
			return $result;	
		}

		public function update_category($brandName, $id){

			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName); 
			$id = mysqli_real_escape_string($this->db->link, $id); 

			if(empty($brandName)){
				$alert = "<span class='success'>category name must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET brandName = '$brandName' WHERE catId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'> Updtae category successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update category not success</span>";
					return $alert;
				}
			}
		}

		public function delete_category($id){

			$query = "DELETE   FROM  tbl_category WHERE catID = '$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "<span class='success'> Updtae category successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'> Update category not success</span>";
					return $alert;
				}

		}
		public function getcatbyId($id){
			$query = "SELECT  * FROM  tbl_category WHERE catID = '$id'";
			$result = $this->db->select($query);
			return $result;	
		}



	}
	
?>