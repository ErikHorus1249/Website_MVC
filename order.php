<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	 $check_login = Session::get('customerId');
	 if(!$check_login){
		 header('location:login.php');
	 }
?>


<?php
  echo "Order now";
  // echo "Session::get("customerName")";
  // echo "Session::get("customerId")";
?>
<?php
	include 'inc/footer.php';
?>
