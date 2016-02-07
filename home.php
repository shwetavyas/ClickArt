<?php
require_once('OOClass.php');

  // Start the session
  session_start();
  //Making the instance of LogMeIn class
  $ooClass = new OOClass();
  
  if(isset($_POST['submit']) && !isset($_POST['phone'])){ 
    //setting the values of username and password
    $ooClass->setEmail($_POST['email']);
    $ooClass->setPassword($_POST['password']);

    //Connecting to the fbsql_database
    $dbc = $ooClass->dbConnect();

    //Authentication
    $ooClass->authentication();
  }
     
    //  if ($ooClass->isUserLoggedIn()==false) {
    // echo '<p style="font-weight: bold;color: #FF0000">' . $ooClass->printError() . '</p>';
?>

   
    
   
    <link href="css/main.css" rel="stylesheet"> 

  <style>
    #chatNowId{
       visibility: hidden;
    }

    #shopNowId{
      margin-left: 70px;
    }

    #chatNowModalDialog{
      width: 20%;
    }
  </style>

<script>
    var IDLE_TIMEOUT = 15; //seconds
    var myFlag = 0;
    var _idleSecondsCounter = 0;
    document.onclick = function() {
        _idleSecondsCounter = 0;
    };
    document.onmousemove = function() {
        _idleSecondsCounter = 0;
    };
    document.onkeypress = function() {
        _idleSecondsCounter = 0;
    };
    window.setInterval(CheckIdleTime, 1000);

    function CheckIdleTime() {
        _idleSecondsCounter++;
        if ((_idleSecondsCounter >= IDLE_TIMEOUT && myFlag == 0)) {
            //alert("Time expired!");
            myFlag = 1;
            $("#chatNowId").click();
        }
    }


    function openChat(){
      var myWindow = window.open("http://127.0.0.1:8080/", "", "width=800, height=800");
    }
</script>

  <?php
    require_once('headerTopArtlover.php');
  ?>
   <div class="container"> 

 

        <div class="row"> 
          <?php
            // $page_title = 'Home';
             require_once('header.php');
              
              //require_once('headerTopArtlover.php');
//             require_once('headerMiddleArtlover.php');
          ?>
        </div>
        



        <div class="logo pull-left" style="margin-top:5px">
              <a href="home.php"><img src="images/home/logo.jpg" alt="" /></a>
              <a href="artlover.php" id="shopNowId"><img src="images/home/shopnow.jpg" alt="" /></a>
        </div>
      
    

  <?php
    require_once('homeContent.php');
  ?>
  <iframe src="./carousel/coolcarousel.html" width="1200" height="600" align="middle" style="border:none">
      
    </iframe>
    
  </div>
  

   <a href="#chatNowModal" id="chatNowId" data-toggle="modal"></a>

 <div class="modal fade" id="chatNowModal"> <!--Start of modal -->
                <div class="modal-dialog" id="chatNowModalDialog"> <!-- Start of modal dialog -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" align="center">Need Support?</h4>
                    </div>
                    <div class="modal-body"> <!-- start of modal body-->
                     <p align="center">Connect with the community</p>
                     <!--<a href="#chatWindow" id="chatId"><img src="images/home/chat.jpg" alt="" /></a>-->
                     <button onclick="openChat()"><img src="images/home/chat.jpg" alt="" /></button>



                    </div> <!--end of modal body -->

                    <div class="modal-footer">
                       <p align="center">Click above to Chat.</p>
                    </div>
                  </div>
                </div> <!--End of modal dialog -->
  </div> <!-- End of modal-->
<hr>
          <p class="pull-left" style="color:white">&nbsp &nbspCopyright &copy;2015 IT354 Project.</p>
          <p class="pull-right" style="color:white">Developed by <span>Nikunj <a href="http://www.linkedin.com/in/nikunjr" target="_blank"><i class="fa fa-linkedin"></i></a> and Shweta <a href="https://www.linkedin.com/in/svyas1" target="_blank"><i class="fa fa-linkedin"></i></a>&nbsp &nbsp&nbsp </span></p>

   <style>
      html, body{
        background-color: black;
      }
    </style>

  <?php
  // Insert the page footer
 // require_once('footer.php');
?>

