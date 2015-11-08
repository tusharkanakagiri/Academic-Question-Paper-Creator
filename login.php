<?php
error_reporting(0);
  session_start();
  if (isset($_POST['logged_out'])) {
    if ($_POST['logged_out'] == "1") {
      require("logout-backend.php");
      $has_logged_out = logout();
    }
  }
  if (isset($_SESSION['logged_in'])) {
      header("Location: home.php");
      die();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>RVCE Q Paper Creator</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>

  <body>

      <!-- *************************************************************************************************************
      MAIN CONTENT
      **************************************************************************************************************** -->

    <div id="login-page">
      <header class="header black-bg">
        <a href="" class="logo"><b>RVCE Q Paper Creator</b></a>
      </header>

      <div class="container">
        <form class="form-login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" onsubmit="return passHash();">
          <input type="hidden" name="login_attempt_made" value="1" />

          <h2 class="form-login-heading">sign in now</h2>
          <div class="login-wrap">
            <input type="text" class="form-control" placeholder="User ID" autofocus id="uname" name="uname" required>
            <br>
            <input type="password" class="form-control" placeholder="Password" id="prehashpass" name="prehashpass" required>
            <input type="hidden" id="passwd" name="passwd">
            <br>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            <hr>
          </div>
        </form>
      </div>
      <!--main content end-->
      <?php
        if (isset($_POST['login_attempt_made'])) {
          if ($_POST['login_attempt_made'] == "1") {
            require("login-backend.php");
            verifyLogin($_POST);
          }
        }
        if (isset($has_logged_out)) {
          displayLogoutModal();
        }
      ?>

      <br><br><br><br><br><br><br><br><br><br><br><br><br>

      <!--footer start-->
      <footer class="site-footer">
        <div class="text-center">
          2015 - Tushar Kanakagiri and Uttam Bhat
          <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
        </div>
      </footer>
      <!--footer end-->
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    <script src="assets/js/zabuto_calendar.js"></script>  
    <script type="text/javascript">
      $(document).ready(function () {
        $("#login_attempt_result").modal('show');
        $("#logout_modal").modal('show');
      });
    </script>
    <script src="assets/js/cryptojs/rollups/sha3.js"></script>
    <script type="text/javascript">
      function passHash() {
        var hashed_pass = String( CryptoJS.SHA3($("#prehashpass").val()) );
        $("#passwd").val(hashed_pass);
        return true;
      }
    </script>
  </body>
</html>