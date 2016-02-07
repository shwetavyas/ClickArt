<?php
require_once('startsession.php');
require_once('OOClass.php');

$ooClass = new OOClass();
$totalPrice = 0;
$itemVal;

$temp;

if(isset($_REQUEST['item'])){
	 if(isset($_SESSION['item'])){ 
			$_SESSION['item'] = $_SESSION['item'].$_REQUEST['item'];
			$itemVal = $_SESSION['item'];
			$temp = explode(',', $itemVal);
	}
	else{
		$_SESSION['item'] = $_REQUEST['item'];
		$itemVal = $_SESSION['item'];
		$temp = explode(',', $itemVal);
	}
	//$this->itemVal = $itemVal;
	//echo "string: ".$itemVal;
}
else{
	if(isset($_SESSION['item'])){ 
		$itemVal = $_SESSION['item'];
		$temp = explode(',', $itemVal);
	}
	else{
		$itemVal = "";
		$temp = "";
	}
}

function findImage($tempVal){ 
	$ooClass = new OOClass();
	$result = $ooClass->callingImageCheckout($tempVal);

	if($result!="")
		echo '<img src="collection/'.$result.'" alt="" />';
}

function findDesc($tempVal){
	$ooClass = new OOClass();
	$result = $ooClass->callingImageDescCheckout($tempVal);

	echo '<h4 style="color:#FE980F">'.$result.'</h4>';
}

function findType($tempVal){
	$ooClass = new OOClass();
	$result = $ooClass->callingTypeCheckout($tempVal);

	echo '<h4 style="color:#FE980F">'.$result.'</h4>';
}

function findPrice($tempVal){
	$ooClass = new OOClass();
	$result = $ooClass->callingPriceCheckout($tempVal);
	global $totalPrice;
	$totalPrice = $totalPrice + $result;
	if($result!="")
		echo '<h4 style="color:#FE980F">$'.$result.'</h4>';
}

function findTotalPrice(){
	global $totalPrice;
	$_SESSION['finalPrice'] = $totalPrice;
	echo '<h2 style="color:#FE980F">  &nbsp &nbsp$'.$totalPrice.'</h2>';

}




?>

<!DOCTYPE html>
<html lang="en">


	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<header id="header"><!--header-->
		<?php
			require_once('headerTopArtlover.php');
		?>
		<?php
			require_once('headerMiddleArtlover.php');
		?>
		<?php
			require_once('headerBottomArtlover.php');
		?>
	</header><!--/header-->


<body>
	

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="artlover.php">Shop</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
				<h2 class="title text-center nav">Step1</h2>
				<div class="review-payment">
				<h2 style="color:#FE980F">Review Your Order</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Painter</td>
							<td class="description">Catagory</td>
							<td class="total">Price</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						for($j=1;$j<count($temp);$j++){ 
					?>
						<tr>
							<td class="cart_product">
								<!--<a href=""><img src="images/cart/one.png" alt=""></a>-->
								<?php
									findImage($temp[$j]);
								?>
							</td>
							<td class="cart_description">
								<?php
									findDesc($temp[$j]);
								?>
							</td>

							<td class="cart_description">
								<?php
									findType($temp[$j]);
								?>
							</td>
							
							
							<td class="cart_total">
								<?php
									findPrice($temp[$j]);
								?>
							</td>
							
						</tr>

					<?php
						}
					?>
						
						<tr>
							
							<td colspan="2">
								<table>
									<tr>
										<td><h2 style="color:#FE980F">Total Cost: </h2></td>
										<td><span><?php findTotalPrice() ?></span></td>
										
									</tr>
									
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
				
			<br>
			<h2 class="title text-center nav">Step2</h2>
			
<div><!--recommended_items-->
						<h3 style="color:#FE980F">Please enter your billing address in the below fields</h3>
				</div>
			
			



			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p style="color:#FE980F">Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p style="color:#FE980F">Special Note</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							
						</div>	
					</div>					
				</div>
			</div>
			<br>
			<h2 class="title text-center nav">Step3</h2>
			<?php
				require_once('payment.php');
			?>
		</div>
	</section> <!--/#cart_items-->

	

	
		
	<hr>	
		
		
					 <p class="pull-left" style="color:white">&nbsp &nbspCopyright &copy;2015 IT354 Project.</p>
          <p class="pull-right" style="color:white">Developed by <span>Nikunj <a href="http://www.linkedin.com/in/nikunjr" target="_blank"><i class="fa fa-linkedin"></i></a> and Shweta <a href="https://www.linkedin.com/in/svyas1" target="_blank"><i class="fa fa-linkedin"></i></a>&nbsp &nbsp&nbsp </span></p>
				
	
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

<style>
	body{
		background-color: black;
	}
</style>
</html>