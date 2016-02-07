<?php
require_once('connectvars.php');
	include("sendmail.php");

	class OOClass{

		private $dbc;
		private $email;
		private $password;
		private $error_msg;

		function setEmail($email){
            $this->email = $email;
        }

        function getEmail(){
           return $this->email;
        }

        function setPassword($password){
            $this->password = $password;
        }

        function getPassword(){
          return $this->password;
        }
		
		function dbConnect(){
          $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          $this->dbc = $dbc;
          return $dbc;          
        }


        function authentication(){
          if (!empty($this->email) && !empty($this->password)) {
            // Look up the username and password in the database
            $query = "SELECT firstname, email FROM allusers WHERE email = '$this->email' AND password = SHA('$this->password')";
            $data = mysqli_query($this->dbc, $query);

            if (mysqli_num_rows($data) == 1) {
              // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
              $row = mysqli_fetch_array($data);
              $_SESSION['email'] = $row['email'];
              

              

              $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/userProfile.php';
              header('Location: ' . $home_url);
              return true;
            }
            else {
              // The username/password are incorrect so set an error message
              $error_msg = 'Sorry, you must enter a valid username and password to log in.';
              $this->error_msg = $error_msg;
              return false;
            }
          }
          else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
            $this->error_msg = $error_msg;
            return false;
          }
    }

         function authentication2(){
          if (!empty($this->email) && !empty($this->password)) {
            // Look up the username and password in the database
            $query = "SELECT firstname, email FROM allusers WHERE email = '$this->email' AND password = SHA('$this->password')";
            $data = mysqli_query($this->dbc, $query);

            if (mysqli_num_rows($data) == 1) {
              // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
              $row = mysqli_fetch_array($data);
              $_SESSION['email'] = $row['email'];
              

              ob_start();

              // $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/addToCart.php';
              // header('Location: ' . $home_url);
              // return true;
            ?>
            <script>
                window.onload = function() {
                  window.location.assign("./artlover.php");
               }
            </script>
            <?php
            }
            else {
              // The username/password are incorrect so set an error message
              $error_msg = 'Sorry, you must enter a valid username and password to log in.';
              $this->error_msg = $error_msg;
              return false;
            }
          }
          else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
            $this->error_msg = $error_msg;
            return false;
          }
    }



      function authentication3(){
          if (!empty($this->email) && !empty($this->password)) {
            // Look up the username and password in the database
            $query = "SELECT firstname, email FROM allusers WHERE email = '$this->email' AND password = SHA('$this->password')";
            $data = mysqli_query($this->dbc, $query);

            if (mysqli_num_rows($data) == 1) {
              // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
              $row = mysqli_fetch_array($data);
              $_SESSION['email'] = $row['email'];
              

              ob_start();

              $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/userProfile.php';
               header('Location: ' . $home_url);
              // return true;
            ?>
            <script>
               // window.onload = function() {
                  //window.location.assign("./userProfile.php");
               //}
            </script>
            <?php
            }
            else {
              // The username/password are incorrect so set an error message
              $error_msg = 'Sorry, you must enter a valid username and password to log in.';
              $this->error_msg = $error_msg;
              return false;
            }
          }
          else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
            $this->error_msg = $error_msg;
            return false;
          }
    }

















    	 function printError(){
          return $this->error_msg;
        }

         function isUserLoggedIn(){
          if(isset($_SESSION['email'])){
            return true;
          }
          else{
            return false;
          }
        }

        function sendEmail($to, $subject, $message, $name){
       
		      $mailsend =   sendmail($to,$subject,$message,$name);

          $toNikunj = "nikunj.ratnaparkhi@gmail.com";
          $toShweta = "shwetavyas14@gmail.com";

          $mailsendNikunj =   sendmail($toNikunj,$subject,$message,$name);

          $mailsendShweta =   sendmail($toShweta,$subject,$message,$name);
		      if($mailsend==1){
		        echo '<p>You can verify your registration information in your mailbox.</p>';
		      }
		      else{
		        echo '<h2>There are some issue.</h2>';
            //echo "string1 ".$name;
		      }
        }

        function callingImage(){
          static $num = 1;
          $query = "Select photo from paintings where painting_id= '$num'";
          //$query = "Select photo from paintings where painting_id= '$num' and availability = 'yes'"; //Change this when the payment logic is complete
          $num = $num + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }

         function callingImageCheckout($temp){
          
          //print_r($temp);
         
             $query = "Select photo from paintings where painting_id= '$temp'";
             $data = mysqli_query($this->dbConnect(), $query);
             
             if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $pic = $row['photo'];
                return $pic;
             }
        }

         function callingImageDescCheckout($temp){
          
          //print_r($temp);
         
             $query = "Select painter from paintings where painting_id= '$temp'";
             $data = mysqli_query($this->dbConnect(), $query);
             
             if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $painter = $row['painter'];
                return $painter;
             }
        }

        function callingTypeCheckout($temp){
            $query = "Select paintingtype from paintings where painting_id= '$temp'";
             $data = mysqli_query($this->dbConnect(), $query);
             
             if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $paintingtype = $row['paintingtype'];
                return $paintingtype;
             }
        }


        function callingPriceCheckout($temp){
            $query = "Select price from paintings where painting_id= '$temp'";
             $data = mysqli_query($this->dbConnect(), $query);
             
             if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_array($data);
                $price = $row['price'];
                return $price;
             }
        }

        function callingImageCategoryAbstract($numCat){
          //static $numCat = 1;
          $query = "Select photo from paintings where painting_id= '$numCat' AND paintingtype = 'abstract'";
          //$numCat = $numCat + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }


         function callingImageCategoryAnimal($numCat3){
          //static $numCat = 1;
          $query = "Select photo from paintings where painting_id= '$numCat3' AND paintingtype = 'animals'";
          //$numCat = $numCat + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }


        function callingImageCategoryPhotography($numCat){
          //static $numCat = 1;
          $query = "Select photo from paintings where painting_id= '$numCat' AND paintingtype = 'photography'";
          //$numCat = $numCat + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }

        function callingImageCategoryFloral($numCat){
          //static $numCat = 1;
          $query = "Select photo from paintings where painting_id= '$numCat' AND paintingtype = 'floral'";
          //$numCat = $numCat + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }

        function callingImageCategoryLandscapes($numCat){
          //static $numCat = 1;
          $query = "Select photo from paintings where painting_id= '$numCat' AND paintingtype = 'landscapes'";
          //$numCat = $numCat + 1;
          $data = mysqli_query($this->dbConnect(), $query);
          if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $pic = $row['photo'];
            return $pic;
          }
         
        }




	}
?>