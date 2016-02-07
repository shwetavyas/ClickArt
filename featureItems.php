<?php
require_once('startsession.php');
require_once('OOClass.php');

$ooClass = new OOClass();
  
  if(isset($_POST['submit'])){ 
    //setting the values of username and password
    $ooClass->setEmail($_POST['email']);
    $ooClass->setPassword($_POST['password']);

    //Connecting to the fbsql_database
    $dbc = $ooClass->dbConnect();

    //Authentication
   	$ooClass->authentication2();

   	$itemNo[]="";
   
}

function findImage(){ 
	$ooClass = new OOClass();
	$result = $ooClass->callingImage();
		echo '<img src="collection/'.$result.'" alt="" />';
  }

function findImagePrice(){
		  $ooClass = new OOClass();
		  $dbc = $ooClass->dbConnect();
          static $num2 = 1;
          $query = "Select * from paintings where painting_id= '$num2'";
          $num2 = $num2 + 1;
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $price = $row['price'];
            return $price;
          }
}

function findPaintingName(){
		  $ooClass = new OOClass();
		  $dbc = $ooClass->dbConnect();
          static $num2 = 1;
          $query = "Select * from paintings where painting_id= '$num2'";
          $num2 = $num2 + 1;
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $paintingname = $row['paintingname'];
            return $paintingname;
          }
}

function findPainter(){
		  $ooClass = new OOClass();
		  $dbc = $ooClass->dbConnect();
          static $num2 = 1;
          $query = "Select * from paintings where painting_id= '$num2'";
          $num2 = $num2 + 1;
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $painter = $row['painter'];
            return $painter;
          }
}

function findPublisher(){
		  $ooClass = new OOClass();
		  $dbc = $ooClass->dbConnect();
          static $num2 = 1;
          $query = "Select * from paintings where painting_id= '$num2'";
          $num2 = $num2 + 1;
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $publisher = $row['publisher'];
            return $publisher;
          }
}

?>
<link href="css/main.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<style>
	.modal{
    	width: 100%;
    	position: fixed;
    	text-align: center;
    	margin: 0px auto;
    	top: 0px;
    	left: 0px;
    	bottom: 0px;
    	right: 0px;
    	z-index: 1050;
    }
    .modal_wrapper{
    	display: table;
    	overflow: auto;
    	overflow-y: scroll;
    	height: 100%;
    	-webkit-overflow-scrolling: touch;
    	outline: 0;
    	text-align: center;
    	margin: 0px 100px;
    }
    .modal-dialog{
    	margin-top: 0px;
    	display: table-cell;
    	vertical-align: middle;
    	margin: 0px 20px;
    }

</style>

<script>
	var tempVal="";
</script>



<div class="features_items"><!--features_items-->
						<h2 class="title text-center nav nav-tabs">Features Items</h2>
						<?php
													$dbc = $ooClass->dbConnect();
													$query = "SELECT MAX(painting_id) AS pid , price, publisher, painter, paintingname FROM paintings";
													$data = mysqli_query($dbc, $query);
													$row = mysqli_fetch_array($data);
													for($i=1; $i<=$row['pid']; $i++){ 
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php
														findImage();
														$tempPrice = findImagePrice();
														$tempPaintingName = findPaintingName();
														$tempPainter = findPainter();
														$publisher = findPublisher();
														echo '<h2>$'.$tempPrice.'</h2>';
														echo '<p>'.$tempPaintingName.'</p>';
											?>
											
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<?php
														echo '<h2>$'.$tempPrice.'</h2>';
														echo '<p>'.$tempPaintingName.'</p>';
														echo '<p>Artist: '.$tempPainter.'</p>';
														echo '<p>Publisher: '.$publisher.'</p>';
												 
												?>
													<a href="#myModalLogin" data-toggle="modal" role="button" class="addCartBtn btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											
											


												
											</div>
										</div>
								</div>
								<!--<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>



						<a href="#confirmModalOpen" id="confirmModal" data-toggle="modal"></a>

						 <div class="modal fade" id="confirmModalOpen"> <!--Start of modal -->
						                <div class="modal-dialog"> <!-- Start of modal dialog -->
						                  <div class="modal-content">
						                   
						                    <div class="modal-body"> <!-- start of modal body-->
						                     
						                     <h3>Item is added to the cart.</h3>
						                     <!--<a href="#chatWindow" id="chatId"><img src="images/home/chat.jpg" alt="" /></a>-->
						                     <button type="button" class="btn btn-success" data-dismiss="modal">Add More</button>
											 <button type="button" onclick="finalCart()" class="btn btn-danger" data-dismiss="modal">Proceed to checkout</button>



						                    </div> <!--end of modal body -->

						                    
						                  </div>
						                </div> <!--End of modal dialog -->
						  </div> <!-- End of modal-->



<div id="myModalLogin" class="modal fade">
		<?php
			if (!($ooClass->isUserLoggedIn())) {
		?>
			<div class="modal_wrapper" >
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-body">
							&nbsp;
							 <?php
		                      require_once('userLogin.php');
		                     ?>
							
						</div>

						
					</div>
				</div>
			</div>
		<?php
			} else{ 
		?>
		<script>

				
                $(".addCartBtn").click(function(){
                	
                	<?php
                		global $itemNo;
                		$itemNo = $i;
                	?>
                	//alert("here1"+document.getElementById("confirmModal"));
                	//alert("here!"+<?=$itemNo ?>);
                	callModal(<?=$itemNo ?>);
                	exit(0);
                	//document.getElementById("confirmModal").click();
                	//exit(0);
                	
                });	

                function callModal(var1){ 
                	tempVal = tempVal+","+var1;
                	document.getElementById("confirmModal").click();
                }

                

                function finalCart(){
                	//alert("Final: "+tempVal);
                	
                  	window.location.assign("./checkout.php?item="+tempVal);
             	  
                }
                  
               
            
		</script>

		<?php
			}
		?>
</div>

						<?php
							}
						?>




</div><!--features_items-->







