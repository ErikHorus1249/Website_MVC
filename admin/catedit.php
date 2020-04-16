<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php
/*	if(isset($_GET['catid'] || $_GET['catid'] == NULL){
		echo "<scipt>window.location = 'castlist.php'</scipt>";
		
	}else{
		$id = $_GET['catid'];
	}*/
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
		echo "<scipt>window.location('catlist.php')</scipt>";
	}else{
		$id = $_GET['catid'];
	}
    $cat = new category();
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
                <span><?php
                    if(isset($insertCat)){
                        echo $insertCat;
                    } 
                 ?></span>
                 <?php
                 	$get_cate_name = $cat->getcatbyId($id); 
                 	if($get_cate_name){
                 		while($result = $get_cate_name->fetch_assoc()){


                 ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName']?>" name='catName' placeholder="Sửa thông tin " class="medium" />
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