<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
			$cartId = $_POST['cartid'];
			$quantity = $_POST['quantity'];
			$updateInfoCart = $cart->update_cart($cartId, $quantity);
	}
	if(isset($_GET['delcartid'])){
		$delCartId = $_GET['delcartid'];
		$deleteCart = $cart->delete_cart($delCartId);
	}
?>
<?php
	if(isset($updateInfoCart)){
		echo $updateInfoCart;
	}
?>
<!-- Tu dong update so luong va gia moi khi them -->
<?php
  	if(!isset($_GET['id'])){
			echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
		}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng</th>
								<th width="10%">Hủy</th>
							</tr>
							<?php
							 	$getProductCart = $cart->get_product_cart();
								$sub_total = 0; //Tong don gia
								$qtt = 0; // so luong trong gio hang
								if($getProductCart){
									while($result=$getProductCart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price']." $" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['cartId'] ?>" />
										<input type="number" name="quantity" value="<?php echo $result['quantity']; $qtt+=$result['quantity'] ?>" min="1"/>
										<input type="submit" name="submit" value="sửa"/>
									</form>
								</td>
								<td><?php
									$total = $result['quantity']*$result['price'];
									$sub_total += $total;
									echo $total." $";
								?></td>
								<td><a onclick = "return confirm('Bạn có muốn xóa ?')" href="cart.php?delcartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
							<?php
								}
							?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php
									echo $sub_total." $";
									Session::set('sum',$sub_total);
									Session::set('quantity',$qtt);
								?></td>
							</tr>
							<tr>
								<th>thuế  VAT: </th>
								<td><?php echo ($VAT = $sub_total*0.1)." $" ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php echo ($sub_total + $VAT)." $" ?></td>
							</tr>
					   </table>
						 <?php
					 		}
							else {
							 echo "Please shopping now";
						 }
						 ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
?>
