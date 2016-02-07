<?php
require_once('startsession.php');
require_once('header.php');
require_once('OOClass.php');

	$ooClass = new OOClass();
?>
<!--/head-->
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
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1 class="myCaro"><span>Click</span>Art</h1>
									<h2>Bring the art to your home.</h2>
								</div>
								<div class="col-sm-6">
									<img src="images/home/carousal1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1 class="myCaro"><span>Click</span>Art</h1>
									<h2>Bring the art to your office.</h2>
								</div>
								<div class="col-sm-6">
									<img src="images/home/carousal2.jpeg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1 class="myCaro"><span>Click</span>Art</h1>
									<h2>Bring the art anywhere.</h2>
								</div>
								<div class="col-sm-6">
									<img src="images/home/carousal3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				

				<div class="col-sm-3">
					<div >
						<h2 class="title text-center nav nav-tabs">Category</h2>
						
							<div id="myCat"><!--category-productsr-->
							
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#abstract">
											ABSTRACT
										</a>
									</h4>
								</div>
								
							


							<br/>
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#animals">
											ANIMALS
										</a>
									</h4>
								</div>
								
							
							<br/>
							
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#photography">
											PHOTOGRAPHY
										</a>
									</h4>
								</div>
								
							

							<br/>

							
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#floral">
											FLORAL
										</a>
									</h4>
								</div>
								
							
							<br/>

							
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#landscape">
											LANDSCAPE
										</a>
									</h4>
								</div>
								
							

						
					</div>
					
						
						
						
						
					
					</div>
				</div>







				
				<div class="col-sm-9 padding-right">
					<?php
						require_once('featureItems.php');
					?>
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Abstract</a></li>
								<li><a href="#blazers" data-toggle="tab">Animals</a></li>
								<li><a href="#sunglass" data-toggle="tab">Photography</a></li>
								<li><a href="#kids" data-toggle="tab">Floral</a></li>
								<li><a href="#poloshirt" data-toggle="tab">Landscapes</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<?php
								require_once('categoryItemAbstract.php');
							?>
							<?php
								require_once('categoryItemAnimal.php');
							?>
							<?php
								require_once('categoryItemPhotography.php');
							?>
							<?php
								require_once('categoryItemFloral.php');
							?>
							<?php
								require_once('categoryItemLandscapes.php');
							?>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center nav nav-tabs">recommended items</h2>
						<?php
							require_once('recommenedItems.php');
						?>
					
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<hr>

	 <p class="pull-left" style="color:white">&nbsp &nbspCopyright &copy;2015 IT354 Project.</p>
          <p class="pull-right" style="color:white;margin-right:40px">Developed by <span>Nikunj <a href="http://www.linkedin.com/in/nikunjr" target="_blank"><i class="fa fa-linkedin"></i></a> and Shweta <a href="https://www.linkedin.com/in/svyas1" target="_blank"><i class="fa fa-linkedin"></i></a>&nbsp &nbsp&nbsp </span></p>
	
<style>
      html, body{
        background-color: black;
      }

      #myCat{
		width: 125px;
		margin-left: 70px;
      }

      .myCaro{
      	background-color: black;
      	font-family: Georgia, Times, 'Times New Roman', serif;
      }
      

</style>
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
