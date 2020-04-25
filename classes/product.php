<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/database.php';
	include_once $filepath.'/../helper/format.php';
?>


<?php
	/**
	 *
	 */
	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function insert_product($data, $files){

			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){
				$alert = "<span class='success'>content must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product(productName, brandId, catId, product_desc, price, type, image) VALUES('$productName','$brand','$category','$product_desc','$price','$type', '$unique_image')";
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
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function show_product(){
			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang product
			// $query = "SELECT  * FROM  tbl_product order by productId desc ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang product category va brand
			// $query = "
			// SELECT  tbl_product.*, tbl_category.catName, tbl_brand.brandName
			// FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			// INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			// order by tbl_product.productId desc
			// ";


			// Su dung lenh mysql nhung chi lay duoc gia tri cua bang product category va brand
			$query = "
			SELECT  p.*, c.catName, b.brandName
			FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.catId
			AND p.brandId = b.brandId order by p.productId desc";
			$result = $this->db->select($query);
			return $result;
		}
		// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		 public function update_product($data,$files,$id){

			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
 			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
 			$category = mysqli_real_escape_string($this->db->link, $data['category']);
 			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
 			$price = mysqli_real_escape_string($this->db->link, $data['price']);
 			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			// kiem tra hinh anh va lay hinh anh cho vao folder upload
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

			if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
				$alert = "<span class='success'>content must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){// neu nguoi dung chon anh
					if ($file_size > 1085000) {
						$alert = "<span class'error' >Image size should be less than 2 MB</span>";
						return $alert;
					}elseif (in_array($file_ext, $permited) === false){
						$alert = "<span class='error'>You can upload only :-".implode(', ',$permited)."</span>";
						return $alert;
					}else{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = "UPDATE tbl_product SET
						productName = '$productName',
						brandId = '$brand',
						catId = '$category',
						product_desc = '$product_desc',
						price = '$price',
						image = '$unique_image',
						type = '$type'
						WHERE productId = '$id'";
						$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'> Insert product successfully</span>";
							return $alert;
						}else{
							$alert = "<span class='error'> Insert product not success</span>";
							return $alert;
						}
					}
				}else{
					$query = "UPDATE tbl_product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category',
					product_desc = '$product_desc',
					price = '$price',
					type = '$type'
					WHERE productId = '$id'";
					$result = $this->db->update($query);
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
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		public function delete_product($id){

			$query = "DELETE   FROM  tbl_product WHERE productID = '$id'";
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
		public function getproductbyId($id){
			$query = "SELECT  * FROM  tbl_product WHERE productID = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Fontend

	public function getproduct_feartheres(){
		$query = "SELECT  * FROM  tbl_product WHERE type = '0'";
		$result = $this->db->select($query);
		return $result;
	}
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	public function getNewProduct(){
		$query = "SELECT  * FROM  tbl_product order by productId desc";
		$result = $this->db->select($query);
		return $result;
	}

	// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		public function product_detail($id){

			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			WHERE productId = '$id'";
			
			$result = $this->db->select($query);
			return $result;
		}

}
?>
