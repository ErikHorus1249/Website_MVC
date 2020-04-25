<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
				 	$product_featheres = $product->getproduct_feartheres();
					if($product_featheres){
						$index = 0;
						while($result=$product_featheres->fetch_assoc()){
							if($index < 4){
								$index ++;
				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" width=150 height=150></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 20) ?></p>
					 <p><span class="price"><?php echo $result['price']." VND" ?></span></p>
				     <div class="button"><span><a href="preview.php" class="details">Chi tiết</a></span></div>
				</div>
				<?php
							}
						}
					}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				 	$new_product = $product->getNewProduct();
					if($new_product){
						$index = 0;
						while($result=$new_product->fetch_assoc()){
							if($index < 4){
								$index ++;
				 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" width=150 height=150></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><span class="price"><?php echo $result['price']." VND" ?></span></p>
				     <div class="button"><span><a href="preview.php" class="details">Chi tiết</a></span></div>
				</div>
				<?php
							}
						}
					}
				?>

			</div>
    </div>
 </div>

<?php
	include 'inc/footer.php';
?>
