
	<div class="header_bottom">
		<div class="header_bottom_left">
			 <div class="section group">
				<?php
				  	$getLastedLock = $product->get_lasted_lock();
						if($getLastedLock){
							while ($result=$getLastedLock->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName'] ?></h2>
						<p><?php echo $fm->textShorten($result['product_desc'], 20) ?></p>
						<div class="button"><span><a href="details.php?productid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
				 <?php
			 		}
				}
				 ?>
				 <?php
 				  	$getLastedLock = $product->get_lasted_sukoi();
 						if($getLastedLock){
 							while ($result=$getLastedLock->fetch_assoc()){
 				?>
 				<div class="listview_1_of_2 images_1_of_2">
 					<div class="listimg listimg_2_of_1">
 						 <a href="details.php"> <img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
 					</div>
 				    <div class="text list_2_of_1">
 						<h2><?php echo $result['productName'] ?></h2>
 						<p><?php echo $fm->textShorten($result['product_desc'], 20) ?></p>
 						<div class="button"><span><a href="details.php?productid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
 				   </div>
 			   </div>
 				 <?php
 			 		}
 				}
 				 ?>
			</div>
			 <div class="section group">
				 <?php
 					 $getLastedLock = $product->get_lasted_yak();
 					 if($getLastedLock){
 						 while ($result=$getLastedLock->fetch_assoc()){
 			 ?>
 			 <div class="listview_1_of_2 images_1_of_2">
 				 <div class="listimg listimg_2_of_1">
 						<a href="details.php"> <img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
 				 </div>
 					 <div class="text list_2_of_1">
 					 <h2><?php echo $result['productName'] ?></h2>
 					 <p><?php echo $fm->textShorten($result['product_desc'], 20) ?></p>
 					 <div class="button"><span><a href="details.php?productid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
 					</div>
 				</div>
 				<?php
 				 }
 			 }
 				?>
				<?php
					 $getLastedLock = $product->get_lasted_an();
					 if($getLastedLock){
						 while ($result=$getLastedLock->fetch_assoc()){
			 ?>
			 <div class="listview_1_of_2 images_1_of_2">
				 <div class="listimg listimg_2_of_1">
						<a href="details.php"> <img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
				 </div>
					 <div class="text list_2_of_1">
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 20) ?></p>
					 <div class="button"><span><a href="details.php?productid=<?php echo $result['productId'] ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
				 }
			 }
				?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->

			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>
