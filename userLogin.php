<div class="myformLogin">
  <button class="close" onclick="revertMe()" data-dismiss="modal" style="color:red">Close</button>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
                      <h1 style="text-align:center">Log In</h1>
                      <hr>
                      <fieldset>
                        <div class="row">
                          <div class="col-sm-2">
                          </div>
                          <div class="form-group col-sm-8">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br />
                          </div>
                        </div>
                        <div class="row">
                         <div class="col-sm-2">
                         </div>
                        <div class="form-group col-sm-8">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" name="password" />
                          </div>
                        </div>
                      </fieldset>
                      <hr>
                      <input type="submit" style="color:black;font-weight: bold; font-size:25px; margin-left:220px" class="btn btn-success" value="Log In" name="submit" />
</form>
</div>

<style>
  .myformLogin, h1{
    background-color: #A0A0A0;
    color: black;
    font-family: "Times New Roman", Times, serif;
    font-size: 17px;


    
 
  
  text-transform:uppercase;
  text-shadow:#000 0px 1px 1px;
    
  }

h1{
  font-size: 37px;
}
</style>

<script>  
  function revertMe(){
    window.location.assign("./home.php");
  }
</script>
