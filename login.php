

<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>

<?php
	 $check_login = Session::get('customerId');
	 if($check_login){
		 header('location:order.php');
	 }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $insertCustomer = $customer->insert_customer($_POST);
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
        $loginCustomer = $customer->login_customer($_POST);
    }
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>

        	<form action="" method="post">
          	<input  type="text" name="mail" class="field" placeholder="Enter email . . .">
            <input  type="password" name="password" class="field" placeholder="Enter password . . .">

           	<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
            <div class="buttons"><div><input type="submit" class="buysubmit" name="login" value="Sign in"/></div></div>
					</form>
					<?php
						if(isset($loginCustomer)){
							echo $loginCustomer;
						}
					?>
					</div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
				<?php
  				if(isset($insertCustomer)){
  					echo $insertCustomer;
  				}
  			?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>

							<div>
							<input type="text" name="name" placeholder="Enter name . . ." >
							</div>
							<div>
							   <input type="text" name="city" placeholder="Enter city . . .">
							</div>
							<div>
								<input type="text" name="zipcode"  placeholder="Enter zipcode . . .">
							</div>
							<div>
								<input type="text" name="mail"  placeholder="Enter email . . .">
							</div>

		    		 </td>
		    		<td>

						<div>
							<input type="text" name="address"  placeholder="Enter address . . .">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">

							<option value="null">Select a Country</option>
							<option value="US">United Kingdom</option>

		        </select>
				   </div>

		          <div>
		          <input type="text" name="phone" placeholder="Enter phone . . .">
		          </div>

						  <div>
							<input type="password" name="password" placeholder="Enter password . . .">
						  </div>
		    	</td>
		    </tr>
		    </tbody></table>
		   <div class="search"><div><input type="submit" class="buysubmit" name="submit" value="Create Account"/></div></div>

			 <!-- <input type="submit" class="buysubmit" name="submit" value="Create Account"/><br> -->
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>
