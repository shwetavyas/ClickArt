<div class="row" id="myModal"> 
        <a href="#myModalLogin" id="loginId" role="button" class="btn btn-warning pull-right" style="background-color: #CF0000" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Log In</a>
           
            <div class="modal fade" id="myModalLogin"> <!--Start of modal -->
                <div class="modal-dialog"> <!-- Start of modal dialog -->
                  <div class="modal-content" id="myModalRegis2">
                   
                      
                      
                    
                    <div class="modal-body"> <!-- start of modal body-->
                     
                      <?php
                      require_once('userLogin.php');
                     ?>



                    </div> <!--end of modal body -->

                    
                  </div>
                </div> <!--End of modal dialog -->
            </div> <!-- End of modal-->
          


            <div class="pull-right">
              <span>&nbsp</span>
            </div>

           

            <a href="#myModalRegister" id="registerId" role="button" class="btn btn-warning pull-right" style="background-color: #CF0000" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Sign Up</a>

            <div class="modal fade" id="myModalRegister"> <!--Start of modal -->
                <div class="modal-dialog"> <!-- Start of modal dialog -->
                  <div class="modal-content" id="myModalRegis">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" style="color:red">Close</button>
                      <h4 class="modal-title" style="text-align:center">User Registration page</h4>
                    </div>
                    <div class="modal-body"> <!-- start of modal body-->
                     
                     <?php
                      require_once('registration.php');
                     ?>


                    </div> <!--end of modal body -->

                   
                  </div>
                </div> <!--End of modal dialog -->
            </div> <!-- End of modal-->

      </div>


<style>
  #myModalRegis, #myModalRegis2{
    background-color: #A0A0A0;
    color: black;
    font-family: "Times New Roman", Times, serif;
    font-size: 17px;


    padding:30px 0px 0px 0px;
 
  
  text-transform:uppercase;
  text-shadow:#000 0px 1px 1px;
  }

  #loginId, #registerId{
    font-family: "Times New Roman", Times, serif;
    font-size: 17px;
    text-transform:uppercase;
  }
</style>

