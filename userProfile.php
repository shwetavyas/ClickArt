<?php
require_once('startsession.php');
$page_title = 'Friends';
require_once('header.php');
require_once('connectvars.php');
require_once('OOClass.php');

 $ooClass = new OOClass();
  
  if(isset($_POST['submit'])){ 
    //setting the values of username and password
    $ooClass->setEmail($_POST['email']);
    $ooClass->setPassword($_POST['password']);

    //Connecting to the fbsql_database
    $dbc = $ooClass->dbConnect();

    //Authentication
    $ooClass->authentication3();

    
   
}




?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 


<?php
//define('GW_UPLOADPATH', 'image/');
	 if ($ooClass->isUserLoggedIn()) {


  		$dbc = $ooClass->dbConnect();
	 	
	 	$tempEmail = $_SESSION['email'];

  		$query = "Select * from allusers where email = '$tempEmail'";
  		$result = mysqli_query($dbc, $query);


  		$row = mysqli_fetch_array($result);
        if($row['category']=='artlover'){ 
            require_once('artlover.php'); //if the art lover has logged in then he will see the paintings published by various artists.
        }
        else if($row['category']=='artist'){
            require_once('artist.php');
          // echo 'Name: '.$row['firstname'].'<br />';
          // echo '<img src="'.GW_UPLOADPATH.$row['photo'].'" alt="photo"/>';
        }
  		


	}else{
    ?>

 <script>
    $(document).ready(function(){
      $("#myModalLoginBtn").click();
    });
  </script>

  <a href="#myModalLogin" id="myModalLoginBtn" data-toggle="modal"></a>

  <div id="myModalLogin" class="modal fade">
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
  </div>

  <?php
}
?>


<?php
require_once('footer.php');
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>