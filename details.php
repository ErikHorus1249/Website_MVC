<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

<?php

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
        echo "<scipt>window.location('404.php')</scipt>";
    }else{
        $id = $_GET['productid'];
    }

 ?>


 <div class="main">
    <div class="content">
    	<div class="section group">
				<?php
				  	$product_detail = $product->product_detail($id);
						if($product_detail){
							$result = $product_detail->fetch_assoc();
				?>
				<div class="cont-desc span_1_of_2">
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result['image'] ?>" width=250 height="250 "alt="" />
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
					<form action="cart.php" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['product_desc'] ?></p>
	</div>
	<?php
		}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>

    				</ul>

 				</div>
 		</div>
 	</div>
	</div>

<?php
	include 'inc/footer.php';
?>
