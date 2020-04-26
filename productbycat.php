<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if(isset($_GET['catid'])){
		$catId = $_GET['catid'];
		$productByCat = $product->show_product_by_cat($catId);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from <?php  ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
					<?php
					  	if ($productByCat) {
					  		While($result=$productByCat->fetch_assoc()){
					?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/upload/<?php echo $result['image']; ?>" alt="" height=150 /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
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
