<?php
         if ($ooClass->isUserLoggedIn()==false) {
          require_once('homeContentNotLoggedIn.php');
        }
        else{
          require_once('homeContentLoggedIn.php');
        }
?>