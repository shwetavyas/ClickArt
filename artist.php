<?php
  require_once('startsession.php');
  // Insert the page header
  $page_title = 'Artist Form';
  require_once('header.php');
  require_once('OOClass.php');
  require_once('appvars.php');
  
  define('GW_UPLOADPATH', 'collection/');

  // Connect to the database
  
  $ooClass = new OOClass();
  $dbc = $ooClass->dbConnect();

  if (isset($_POST['submit2'])) {
   
    
    $paintingname = $_POST['paintingname'];
    $paintingtype = $_POST['paintingtype'];
    $painter = $_POST['painter'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $photo = $_FILES['photo']['name'];
    $getExt = explode(".", $photo); // Split file name into an array using the dot
    $fileExt = end($getExt); 
     

    
    if (!empty($paintingname) && !empty($painter) && !empty($category)) {
      // Make sure someone isn't already registered using this username
      $target = GW_UPLOADPATH.$photo;
      move_uploaded_file($_FILES['photo']['tmp_name'], $target);

      include_once("ak_php_img_lib_1.0.php");
      //$target_file = "uploads/$fileName";
      $resized_file = "collection/resized_$photo";
      $photo = "resized_$photo";
      $wmax = 268;
      $hmax = 249;
      ak_img_resize($target, $resized_file, $wmax, $hmax, $fileExt);

      unlink($target);

      //$query = "SELECT * FROM allusers WHERE email = '$email'";
      //$data = mysqli_query($dbc, $query);
     // if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO paintings (paintingname, paintingtype, painter, publisher, category, price, availability, photo) VALUES ('$paintingname', '$paintingtype', '$painter', '$publisher', '$category', '$price', '$availability', '$photo')";
        mysqli_query($dbc, $query);
        //echo "Query: ".$query;
         $tempEmail = $_SESSION['email'];
         $query2 = "Select * from allusers where email = '$tempEmail'";
         $query2Result = mysqli_query($dbc, $query2);
         $row2 = mysqli_fetch_array($query2Result);

        //Registration confirmation email
        $subject = "Publication confirmation-ClickArt";
        $message = "Dear ".$row2['firstname'].",<br/><br/>Welcome to the world of art.<br/><br/><u><b>Your painting has been published for sale on ClickArt.</b></u><br/>
        <br/>Thanks for your using our services.<br/>
        <p>Copyright &copy;2015 IT354 Project.";

          // echo '<script language="javascript">';
          // echo 'alert("s1")';
          // echo '</script>';

        $emailStatus = $ooClass->sendEmail($tempEmail, $subject, $message, $row2['firstname']);
        
        mysqli_close($dbc);
        // Confirm success with the user
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/artistSuccess.php';
        header('Location: ' . $home_url);
        //echo "tempEmail ".$tempEmail;
        exit();
     // }
      //else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">Some error found.</p>';
        //$username = "";
      //}
    }
    else {
      echo '<p class="error">You must enter all of the data</p>';
    }
  }

  mysqli_close($dbc);
?>

<?php
  require_once('headerTopArtlover.php');
  
?>

<?php
      $ooClass = new OOClass();
    $dbc = $ooClass->dbConnect();
    $tempEmailPic = $_SESSION['email'];
     $query = "Select photo from allusers where email= '$tempEmailPic'";
     $data = mysqli_query($dbc, $query);
     if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $result = $row['photo'];
            echo '<img id="profilePic" src="image/'.$result.'" alt="" />';
     }  
?>

<style>
  #profilePic{
    position: absolute;
    top: 175px;
    right: 130px;
    width: 150px;
    height: 200px;
  }
</style>

 <link href="css/main.css" rel="stylesheet"> 
   
  
<div class="container" id="myContainer">
  
  

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <div class="row">
      <h3 class="pull-left">Publish Your Paining</h3> 
      <a href="logout.php" id="loginId" role="button" class="btn btn-warning pull-right" style="background-color: #CF0000"><span class="glyphicon glyphicon-off"></span> Log out</a>
      </div>
      <hr>
      

      <label for="paintingname">Painting Name:</label>
      <input type="text" id="paintingname" name="paintingname" value="<?php if (!empty($paintingname)) echo $paintingname; ?>" /><br /><br/>

      <label>Painting Type:</label> <br>
      <div id="myRadio"> 
        <input type="radio" name="paintingtype"
        <?php if (isset($paintingtype) && $paintingtype=="abstract") echo "checked";?>
        value="abstract">Abstract <br>
        <input type="radio" name="paintingtype"
        <?php if (isset($paintingtype) && $paintingtype=="animals") echo "checked";?>
        value="animals">Animals <br>
        <input type="radio" name="paintingtype"
        <?php if (isset($paintingtype) && $paintingtype=="photography") echo "checked";?>
        value="photography">Photography<br/>
        <input type="radio" name="paintingtype"
        <?php if (isset($paintingtype) && $paintingtype=="floral") echo "checked";?>
        value="floral">Floral<br/>
        <input type="radio" name="paintingtype"
        <?php if (isset($paintingtype) && $paintingtype=="landscapes") echo "checked";?>
        value="landscapes">Landscapes<br/><br/>
      </div>



      <label for="painter">Painter:</label>
      <input type="text" id="painter" name="painter" value="<?php if (!empty($painter)) echo $painter; ?>" /><br /><br/>

      <label for="publisher">Publisher:</label>
      <input type="text" id="publisher" name="publisher" value="<?php if (!empty($publisher)) echo $publisher; ?>" /><br /><br/>

     <label>Category:</label>
      <input type="radio" name="category"
      <?php if (isset($category) && $category=="sell") echo "checked";?>
      value="sell">Sell
      <input type="radio" name="category"
      <?php if (isset($category) && $category=="donate") echo "checked";?>
      value="donate">Donate
      <!--<input type="radio" name="category"
      <?php if (isset($category) && $category=="bid") echo "checked";?>
      value="bid">Bid<br/><br/>-->

      
<br/>
       <label for="price">Price:</label>
      <input type="text" id="price" name="price" value="<?php if (!empty($price)) echo $price; ?>" /><br /><br/>

        <label>Availability:</label>
      <input type="radio" name="availability"
      <?php if (isset($availability) && $availability=="yes") echo "checked";?>
      value="yes">Yes
      <input type="radio" name="availability"
      <?php if (isset($availability) && $availability=="no") echo "checked";?>
      value="no">No<br/><br/>
     

     

      <label for="photo">Painting Sample:</label>
      <input type="file" id="photo" name="photo" /><br /><br/>
    </fieldset>
    <input type="submit" class="btn btn-success" value="PUBLISH" name="submit2" style="color:black;font-weight: bold; font-size:25px" />
  </form>

</div>







<style>
  
  body{
    background-color: black;
  }

  #myContainer{
     background-color: #A0A0A0;
    color: black;
    font-family: "Times New Roman", Times, serif;
    font-size: 17px;


    padding:30px 30px 20px 30px;
 
  
  text-transform:uppercase;
  text-shadow:#000 0px 1px 1px;

  }

  #myRadio, #photo{
    margin-top: 0px;
    padding-top: 0px;
    margin-left: 150px;

  }
</style>

<hr>
  <p class="pull-left" style="color:white">&nbsp &nbspCopyright &copy;2015 IT354 Project.</p>
          <p class="pull-right" style="color:white;margin-right:25px">Developed by <span>Nikunj <a href="http://www.linkedin.com/in/nikunjr" target="_blank"><i class="fa fa-linkedin"></i></a> and Shweta <a href="https://www.linkedin.com/in/svyas1" target="_blank"><i class="fa fa-linkedin"></i></a>&nbsp &nbsp &nbsp &nbsp &nbsp</span></p>

<?php
  // Insert the page footer
  require_once('footer.php');
?>