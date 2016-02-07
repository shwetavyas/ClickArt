<?php
  // Insert the page header
  //require_once('startsession.php');
  require_once('OOClass.php');
  //require_once('appvars.php');
  
  

  // Connect to the database
  
  $ooClass = new OOClass();
  $dbc = $ooClass->dbConnect();

  if (isset($_POST['submit'])) {
   
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
   

    
    if (!empty($email)) {
     
        //Registration confirmation email
        $subject = "Thanks for your message-ClickArt";
        $message = "Dear ".$firstname.",<br/><br/>Welcome to the world of art.<br/><br/>
        One of our representative will get in touch with you soon. Below is the copy of your message.<br/><br/>
        ".$message."<br/></br>Thanks,<br/>Team ClickArt
        <p>Copyright &copy;2015 IT354 Project.</p>";
        $emailStatus = $ooClass->sendEmail($email, $subject, $message, $firstname);
        mysqli_close($dbc);
        
        ?>
        <script>
          window.location.assign("./contactUsSuccess.php");
        </script>
        <?php
        exit();
     
    }
    else {
      echo '<p class="error">You must enter email to submit this form.</p>';
    }
  }
  


?>























<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Contact Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/main.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="bootstrapContact/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesomeContact/css/font-awesome.min.css" />

    <script type="text/javascript" src="jsContact/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrapContact/js/bootstrap.min.js"></script>

</head>
<?php
    require_once('headerTopArtlover.php');
  ?>

<body>

 
<div class="container">

<div class="logo pull-left" style="margin-top:5px">
              <a href="home.php"><img src="images/home/logo.jpg" alt="" /></a>
              
        </div>

<!-- Contact Form - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<style>
    .header {
        font-family: 'Roboto', sans-serif;
  font-size: 30px;
  font-weight: 700;
        color:#FE980F;
        
        
    }

    span{
        font-size: 25px;
    }

    .bigicon {
        font-size: 35px;
        color: #FE980F;
    }
    body{
        background-color: black;
        color:#FE980F;
    }

    #contactForm{
        background-color: black;
        color:#FE980F;

    }
    
</style>

<!-- Contact Form - END -->

</div>
</body>

</html>

