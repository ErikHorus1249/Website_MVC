<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php
    $brand = new brand();
	if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
		echo "<scipt>window.location('brandlist.php')</scipt>";
	}else{
		$id = $_GET['brandid'];
	}

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $brandName = $_POST['brandName'];
        $updateBrand = $brand->update_brand($brandName, $id);

    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
               <div class="block copyblock">
                <span><?php
                    if(isset($updateBrand)){
                        echo $updateBrand;
                    }
                 ?></span>
                 <?php
                 	$get_brand_name = $brand->getbrandbyId($id);
                 	if($get_brand_name){
                 		while($result = $get_brand_name->fetch_assoc()){
                 ?>
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName']?>" name='brandName' placeholder="Sửa thương hiệu " class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                         }
                 	     }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
