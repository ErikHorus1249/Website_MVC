<?php
	include_once 'inc/header.php';
	//include_once 'inc/slider.php';
?>
<?php
   $check_login = Session::get('customerId');
   if($check_login == false){
     header('location:login.php');
   }
?>
<?php

    // if(!isset($_GET['productid']) || $_GET['productid']==NULL){
    //     echo "<scipt>window.location('404.php')</scipt>";
    // }else{
    //     $id = $_GET['productid'];
    // }
    $id = Session::get('customerid');
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])){
        $updateCustomer = $customer->update_customer($id,$_POST);
    }
 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
      		<div class="heading">
      		<h3>Cap nhat thong tin khach hang</h3>
          <h4><?php
              if(isset($updateCustomer)){
                echo $updateCustomer;
              }
          ?></h4>
      		</div>
      		<div class="clear"></div>
      	</div>
        <form action="" method="post">
        <table class="tblone">
          <?php
              $id = Session::get('customerid');
              $getInfoCustomer = $customer->show_customer($id);
              if($getInfoCustomer){
                while($result=$getInfoCustomer->fetch_assoc()){
          ?>
          <tr>
            <td>Name</td>
            <td></td>
            <td><input type='text' name='name' value='<?php echo $result['name'] ?>' class="grey"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td></td>
            <td><input type='text' name='address' value='<?php echo $result['address'] ?>' class="grey"></td>
          </tr>
          <tr>
            <td>Zipcode</td>
            <td></td>
            <td><input type='text' name='zipcode' value='<?php echo $result['zipcode'] ?>' class="grey"></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td></td>
            <td><input type='text' name='phone' value='<?php echo $result['phone'] ?>' class="grey"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td></td>
            <td><input type='text' name='mail' value='<?php echo $result['mail'] ?>' class="grey"></td>
          </tr>
          <tr>
            <td colspan="3"><input type='submit' name='save' value='Save' class="grey"></td>
          <tr>
          <?php
            }
          }
          ?>
        </table>
      </form>
 		  </div>
 	  </div>
</div>
	<?php
 include 'inc/footer.php';
?>
