<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  <script>
  		$(document).ready(function(){
  			$("#modalBtn").click();
  		});

  		function shopPage(){
  			window.location.assign("./artlover.php");
  		}

  		function addMore(){
  			window.location.assign("./userProfile.php");	
  		}
  </script>

</head>
<body>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" style="visibility: hidden" id="modalBtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="margin-left:150px">Painting Published Successfully</h4>
           <button type="button" onclick="shopPage()" style="margin-left:150px" class="btn btn-danger" data-dismiss="modal">Navigate to Shop</button>
           <button type="button" onclick="addMore()"  class="btn btn-warning" data-dismiss="modal">Add More</button>
        </div>
       
       
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
