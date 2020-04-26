<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							 	$getProductCart = $cart->get_product_cart();
								$sub_total = 0;
								if($getProductCart){
									while($result=$getProductCart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="<?php echo $result['quantity'] ?>" min="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
									$total = $result['quantity']*$result['price'];
									$sub_total += $total;
									echo $total;
								?></td>
								<td><a href="">X</a></td>
							</tr>
							<?php
								}
							}
							?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sub_total ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td><?php echo $VAT = $sub_total*0.1 ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php echo $sub_total + $VAT ?></td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
?>
