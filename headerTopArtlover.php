<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="header_top" id="myHeaderTop"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="googlemaps.php"><i class="fa fa-map-marker"></i> Near You</a></li>
								<li><a href="contactUs.php"><i class="fa fa-envelope"></i> Contact Us &nbsp<i class="fa fa-phone"></i> </a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="userProfile.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#" onclick="finalCart2()"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="#" onclick="openChat()"><i class="fa fa-weixin"></i>Live Chat<i class="fa fa-refresh fa-spin"></i></a></li>
							</ul>
						</div>
					</div>
				</div> 
			</div> 
</div><!--/header_top-->

<script>
	function finalCart2(){
                	//alert("Final: "+tempVal);
                	if(typeof tempVal === 'undefined'){ 
						tempVal = ""                  		
                  	}
                  	
                  	window.location.assign("./checkout.php?item="+tempVal);

             	  
    }

    function openChat(){
      var myWindow = window.open("http://127.0.0.1:8080/", "", "width=800, height=800");
    }
</script>


