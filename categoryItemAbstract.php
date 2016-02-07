<?php
require_once('OOClass.php');

function findImagePriceCategoryAbstract($num2){
		  $ooClass = new OOClass();
		  $dbc = $ooClass->dbConnect();
         // static $num2 = 1;
          $query = "Select * from paintings where painting_id= '$num2' AND paintingtype = 'abstract'";
         // $num2 = $num2 + 1;
          $data = mysqli_query($dbc, $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $price = $row['price'];
            if(!empty($price)){
            	//return $price;
	?>		<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center"> 
						<?php  
							//findImageCategory();    
							$result = $ooClass->callingImageCategoryAbstract($num2);
							if(!empty($result)){ 
								echo '<img src="collection/'.$result.'" alt="" />';
								//echo "string ".$result;
							}     	
			            	echo '<h2>Price: $'.$price.'</h2>';
							//echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
						?>
						</div>
											
					</div>
				</div>
			</div>
			<?php
            }
          }
}


?>

<div class="tab-pane fade active in" id="tshirt" >
							<?php
								$dbc = $ooClass->dbConnect();
								$query = "SELECT MAX(painting_id) AS pid , price, publisher, painter, paintingname FROM paintings";
								$data = mysqli_query($dbc, $query);
								$row = mysqli_fetch_array($data);
								for($i=1; $i<=$row['pid']; $i++){ 
									findImagePriceCategoryAbstract($i);
								}
							?>
</div>