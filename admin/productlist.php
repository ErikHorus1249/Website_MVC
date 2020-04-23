<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>

<?php
	$pd = new product();
	$fm = new Format();
?>
<?php
    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];
    	$deleteProduct = $pd->delete_product($id);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product list</h2>
        <div class="block">
        <?php
        	if(isset($delete_product)){
        		echo $delete_product;
        	}
        ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Type</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pdlist = $pd->show_product();
					if($pdlist){
						$i = 0;
						while($result=$pdlist->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><img src="upload/<?php echo $result['image']?>" width=50></td>
					<td><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php
						if($result['type']==0){
							echo 'Feathed';
						}else{
							echo 'Non-feathed';
						} 
					?></td>
					<td><?php echo $fm->textShorten($result['product_desc'],30);?></td>
					<!-- <td class="center">trident</td> -->
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a onclick = "return confirm('Bạn có muốn xóa ?')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php
				}
					} 
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
