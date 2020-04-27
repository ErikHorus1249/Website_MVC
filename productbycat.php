<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if(isset($_GET['catid'])){
		$catId = $_GET['catid'];
		$productByCat = $product->show_product_by_cat($catId);
		$productNameByCat = $product->show_product_by_cat($catId);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
				<?php
						if ($productNameByCat) {
							$result_name=$productNameByCat->fetch_assoc();
				?>
    		<div class="heading">
    		<h3><?php echo $result_name['catName']?> mới nhất</h3>
    		</div>
				<?php
					}
				?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
					<?php
					  	if ($productByCat) {
					  		While($result=$productByCat->fetch_assoc()){
					?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/upload/<?php echo $result['image']; ?>" alt="" height=150 /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $result['price']." $" ?></span></p>

					 <!-- <h2><?php echo $result['productName']?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'])?></p>
					 <p><span class="price"><?php echo $result['price']." $"?></span></p> -->

				     <div class="button"><span><a href="details.php?productid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>

    </div>
 </div>

<?php
	include 'inc/footer.php';
?>
