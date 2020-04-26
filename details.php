<?php
	include_once 'inc/header.php';
	//include_once 'inc/slider.php';
?>

<?php

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
        echo "<scipt>window.location('404.php')</scipt>";
    }else{
        $id = $_GET['productid'];
    }

		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
				$quantity = $_POST['quantity'];
        $addToCart = $cart->add_to_cart($id, $quantity);

    }
 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
					<?php
				  	$product_detail = $product->product_detail($id);
						if($product_detail){
							$result = $product_detail->fetch_assoc();
						?>
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result['image'] ?>" height=200 alt=""/>
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'] ?></h2>
					<p><?php echo $fm->textShorten($result['product_desc'], 100) ?></p>
					<div class="price">
						<p>Price: <span><?php echo $result['price']." VND" ?></span></p>
						<p>Category: <span><?php echo $result['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result['brandName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/><br>
					</form>
					<?php if(isset($addToCart)){
						echo $addToCart;
					}
					?>
				</div>
			</div>

			<div class="product-desc">
			<h2>Product Details</h2>
				<p><?php echo $result['product_desc'] ?></p>
	    </div>
			<?php
			}
			?>
		</div>
					<div class="rightsidebar span_3_of_1">
							<h2>Sản phẩm</h2>
							<ul>
							<?php
							$showCategory = $cat->show_category();
								if($showCategory){
									while($result=$showCategory->fetch_assoc()){
							?>
								<li><a href="productbycat.php?catid=<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></a></li>
							<?php
								}
							}
							?>
							</ul>

				</div>
 		</div>
 	</div>
	</div>
	<?php
 include 'inc/footer.php';
?>
