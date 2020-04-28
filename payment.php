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
<style>
  h3.payment {

    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
  }
  .wapper_method {

      margin: auto;
      width: 550px;
      border: 1px solid #666;
      padding: 20px;
      background: beige;
  }
  .wapper_method p {

    text-align: center;
    /* padding: 10px; */
    margin: 10px;
    border: 1px solid #666;
    background: lavenderblush;

}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
      		<div class="heading">
      		<h3>Payment method</h3>
      		</div>
      		<div class="clear"></div>
      	</div>
        <div class="wapper_method">
        <h3 class="payment"> Choose your payment method</h3>
        <p><a  href="offlinepayment.php">offline payment</a><br></p>
        <p><a  href="onlinepayment.php">online payment</a></p><br>
        <p><a  href="cart.php"><< Previous</a></p>
      </div>
 		  </div>
 	  </div>
</div>
	<?php
 include 'inc/footer.php';
?>
