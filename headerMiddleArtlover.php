<?php
	require_once('startsession.php');
	require_once('OOClass.php');

	$ooClass = new OOClass();
?>
<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="#"><img src="images/home/logo.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							



								
								<?php
									 if ($ooClass->isUserLoggedIn()) {
								?>
								<li><a href="logout.php"  role="button" class="btn btn-warning pull-right" style="background-color: #CF0000"><i class="fa fa-power-off"></i>&nbsp Log Out</a></li>
								<?php
									}
								?>
							
						</div>
					</div>
				</div>
			</div>
</div><!--/header-middle-->