
<?php
    include './lib/session.php';
    Session::init(); // khoi tao phien lam viec moi
?>

<?php
  require_once './lib/database.php';
  require_once './helper/format.php';

  spl_autoload_register(function($className){
    include_once "classes/".$className.".php";
  });

  $db = new Database();
  $fm = new Format();
  $cart = new cart();
  $user = new user();
  $product = new product();
  $cat = new category();
  $brand = new brand();
  $customer = new customer();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/st3.png" height=100  alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<!-- <span class="cart_title"><?php echo Session::get("quantity")." : " ?></span> -->
                <span class="cart_title">SL : </span>
								<span class="no_product">
                  <?php
                  	$checkEmptyCart = $cart->check_empty_cart();
                    if($checkEmptyCart){
                    echo $sum = Session::get("quantity");
                    }else {
                    echo '';
                  }
                  ?>
                </span>
                <span class="cart_title">Tl : </span>
                <span class="no_product">
                  <?php
                  	$checkEmptyCart = $cart->check_empty_cart();
                    if($checkEmptyCart){
                    echo $sum = Session::get("sum")." $";
                    }else {
                    echo 'empty';
                  }
                  ?>
                </span>
							</a>
						</div>
			      </div>
        <?php
            if(isset($_GET['customer_id'])){
              $delcart = $cart->delete_data_cart();
              Session::destroy();
            }
        ?>
		   <div class="login">
         <?php
            $check_login = Session::get('customerId');
            if($check_login == false){
              echo '<a href="login.php">Login</a>';
            }else {
              echo '<a href="?customer_id='.Session::get('customerid').'" >Logout</a>';
            }
         ?>
        </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Sản phẩm</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
    <?php
       $checkEmptyCart = $cart->check_empty_cart();
       $check_login = Session::get('customerId');
       if($checkEmptyCart==false && $check_login==false){
         echo '';
       }else {
         echo '<li><a href="cart.php">Thanh toán </a></li>';
       }
    ?>
    <?php
       $check_login = Session::get('customerId');
       if($check_login == false){
         echo '';
       }else {
         echo '<li><a href="profile.php">Profile</a></li>';
       }
    ?>
	  <li><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
