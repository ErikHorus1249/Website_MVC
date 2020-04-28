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
    //
		// if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		// 		$quantity = $_POST['quantity'];
    //     $addToCart = $cart->add_to_cart($id, $quantity);
    //
    // }
 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
      		<div class="heading">
      		<h3>Thong tin khach hang</h3>
      		</div>
      		<div class="clear"></div>
      	</div>
        <table class="tblone">
          <?php
              $id = Session::get('customerid');
              $getInfoCustomer = $customer->show_customer($id);
              if($getInfoCustomer){
                while($result=$getInfoCustomer->fetch_assoc()){
          ?>
          <tr>
            <td>Name</td>
            <td>|</td>
            <td><?php echo $result['name'] ?></td>
          </tr>
          <tr>
            <td>Address</td>
            <td>|</td>
            <td><?php echo $result['address'] ?></td>
          </tr>
          <tr>
            <td>Zipcode</td>
            <td>|</td>
            <td><?php echo $result['zipcode'] ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>|</td>
            <td><?php echo $result['phone'] ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>|</td>
            <td><?php echo $result['mail'] ?></td>
          </tr>

          <?php
            }
          }
          ?>
        </table>
 		  </div>
 	  </div>
</div>
	<?php
 include 'inc/footer.php';
?>
