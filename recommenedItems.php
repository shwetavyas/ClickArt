<?php
require_once('OOClass.php');
?>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php
										$dbc = $ooClass->dbConnect();
										$query0 = "SELECT MAX(painting_id) AS pid FROM paintings";
										$data0 = mysqli_query($dbc, $query0);
										$row0 = mysqli_fetch_array($data0);
										$pid = $row0['pid'];
										for($i=0;$i<3;$i++){ 
											$tempPid = rand(1, $pid);
											$query = "SELECT price, paintingname, photo FROM paintings where painting_id = '$tempPid'";
											$data = mysqli_query($dbc, $query);
											$row = mysqli_fetch_array($data);
									?>
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<?php
																echo '<img src="collection/'.$row['photo'].'" alt="" />';
																echo '<p>'.$row['paintingname'].'</p>';
																echo '<h2>$'.$row['price'].'</h2>';
															?>
															
														</div>
														
													</div>
												</div>
											</div>
									<?php
										}
									?>
									
									
								</div>
								
									<div class="item">	
									<?php
										$dbc = $ooClass->dbConnect();
										$query0 = "SELECT MAX(painting_id) AS pid FROM paintings";
										$data0 = mysqli_query($dbc, $query0);
										$row0 = mysqli_fetch_array($data0);
										$pid = $row0['pid'];
										for($i=0;$i<3;$i++){ 
											$tempPid = rand(1, $pid);
											$query = "SELECT price, paintingname, photo FROM paintings where painting_id = '$tempPid'";
											$data = mysqli_query($dbc, $query);
											$row = mysqli_fetch_array($data);
									?>
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<?php
																echo '<img src="collection/'.$row['photo'].'" alt="" />';
																echo '<p>'.$row['paintingname'].'</p>';
																echo '<h2>$'.$row['price'].'</h2>';
															?>
															
														</div>
														
													</div>
												</div>
											</div>
									<?php
										}
									?>
									
									
								</div>



							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
</div>