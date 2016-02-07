<?php
require_once('startsession.php');
  require_once('OOClass.php');
   $ooClass = new OOClass();
			
            if ($ooClass->isUserLoggedIn()) {
              // Delete the session vars by clearing the $_SESSION array
              $_SESSION = array();

             

              // Destroy the session
              session_destroy();
            }

            // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
            setcookie('user_id', '', time() - 3600);
            setcookie('username', '', time() - 3600);

            // Redirect to the home page
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home.php';
            header('Location: ' . $home_url);
  

?>