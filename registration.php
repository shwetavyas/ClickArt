<?php
  // Insert the page header
  $page_title = 'Registration Form';
  require_once('header.php');
  require_once('OOClass.php');
  require_once('appvars.php');
  
  define('GW_UPLOADPATH', 'image/');

  // Connect to the database
  
  $ooClass = new OOClass();
  $dbc = $ooClass->dbConnect();

  if (isset($_POST['submit'])) {
   
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $phone = $_POST['phone'];
    $photo = $_FILES['photo']['name'];
    $category = $_POST['category'];

    
    if (!empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $target = GW_UPLOADPATH.$photo;
      move_uploaded_file($_FILES['photo']['tmp_name'], $target);
      $query = "SELECT * FROM allusers WHERE email = '$email'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO allusers (firstname, lastname, email, password, phone, photo, category) VALUES ('$firstname', '$lastname', '$email', SHA('$password1'), '$phone', '$photo', '$category')";
        mysqli_query($dbc, $query);
        //echo "Query: ".$query;

        $query2 = "Select photo from allusers where email = '$email'";
        $photoResult = mysqli_query($dbc, $query2);
        $photoRow = mysqli_fetch_array($photoResult);

        //Registration confirmation email
        $subject = "Registration confirmation-ClickArt";
        $message = "Dear ".$firstname.",<br/><br/>Welcome to the world of art.<br/><br/><u><b>Below are 
        your registration information:</b></u><br/><br/>Email: ".$email."<br/>Password: ".$password1."<br/>Phone: ".$phone."<br/>
        Category: ".$category."<br/><br/><h4>Enjoy our services.</h4><br/><br/>
        <p>Copyright &copy;2015 IT354 Project.";
        $emailStatus = $ooClass->sendEmail($email, $subject, $message, $firstname);
        mysqli_close($dbc);
        //Confirm success with the user
        // $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/registrationSuccess2.php';
        // header('Location: ' . $home_url);
       // require_once('registrationSuccess.php');
        $_SESSION['email'] = $email;
        ?>
        <script>
          window.location.assign("./registrationSuccess.php");
        </script>
        <?php
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>


  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      
      <label for="firstname">Firstname:</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($firstname)) echo $firstname; ?>" /><br /><br/>

      <label for="lastname">Lastname:</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($lastname)) echo $lastname; ?>" /><br /><br/>

      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br /><br/>

      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br /><br/>
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br /><br/>

      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" value="<?php if (!empty($phone)) echo $phone; ?>" /><br /><br/>

      <label>Category:</label>
      <input type="radio" name="category"
      <?php if (isset($category) && $category=="artist") echo "checked";?>
      value="artist">Artist
      <input type="radio" name="category"
      <?php if (isset($category) && $category=="artlover") echo "checked";?>
      value="artlover">Art Lover
      
      <!--<input type="radio" name="category"
      <?php if (isset($category) && $category=="artexhibitor") echo "checked";?>
      value="artexhibitor">Art Exhibitor<br/><br/>--><br/><br/>

      <label for="photo">Photo:</label>
      <input type="file" id="photo" name="photo" /><br /><br/>
    </fieldset>
    <input type="submit" class="btn btn-success" value="Sign Up" style="color:black;font-weight: bold; font-size:25px; margin-left:200px" name="submit" />
  </form>

<?php
  // Insert the page footer
  require_once('footer.php');
?>