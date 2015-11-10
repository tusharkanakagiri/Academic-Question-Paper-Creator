<?php
error_reporting(0);
  session_start();
  if (!isset($_SESSION['logged_in'])) {
      header("Location: login.php");
      session_destroy();
      exit();
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

    <title>RVCE Question Paper Creator</title>

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
    <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>

        <!--logo start-->
        <a href="home.php" class="logo"><b>RVCE Question Paper Creator</b></a>
        <!--logo end-->

        <form action="login.php" method="POST">
          <div class="top-menu">
            <ul class="nav pull-right top-menu">
              <li>
                <input type="hidden" name="logged_out" value="1" />
                <button class="logout" type="submit">Logout</button>
              </li>
            </ul>
          </div>
        </form>
      </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered">
                    <img src='<?php echo $_SESSION['profile']; ?>' class="img-circle" width="60"></p>
                  <h5 class="centered" id="userloggedin"><?php echo $_SESSION['name']; ?></h5>
                    
                  <li class="mt">
                      <a href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="create-paper.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Create Paper</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="select-graph.php" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Review Papers</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="settings.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Settings</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
            <div class="row">
              <div class="col-lg-9 main-chart">
                <?php
                  echo '<div class="modal fade" id="password_change_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                  echo '<div class="modal-dialog">';
                  echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                  echo '<h3 class="modal-title" id="myModalLabel">Invalid Details!</h3>';
                  echo '</div>';
                  echo '<div class="modal-body">';

                  echo '<h4>Please Enter Valid New And Old Password</h4>';

                  echo '</div>';
                  echo '<div class="modal-footer">';
                  echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                ?>
                <h1>Reset Password</h1>
                <div class="row">                
                  <div class="form-panel">
                  <br>
                  <form class="form-horizontal style-form" id="change_password_form" method="POST" action="#">
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">&emsp;Old Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="oldpass" id="oldpass" class="form-control" style="width:200px;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">&emsp;New Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="newpass" id="newpass" class="form-control" style="width:200px;">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">&emsp;Reenter</label>
                      <div class="col-sm-10">
                        <input type="password" name="conpass" id="conpass" class="form-control" style="width:200px;">
                      </div>
                    </div>

                    <div style="margin-left:40px;" >
                      <button type="submit" style="width:120px" class="btn btn-round btn-success">Submit</button>
                    </div>

                    <br><br>
                    <div style="margin-left:20px;" >
                      <a href="settings.php">&lt; Return to previous page</a>
                    </div>
                    <br>
                  </form>
                  <div id="emptyform"></div>
                </div>
          
              </div><!-- /row -->
          <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  </div>
                  <div class="col-lg-3 ds">
                    
                        <!-- CALENDAR-->
                        <h3>Calendar</h3>
                        <div><br></div>
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start--><br><br><br><br><br><br><br><br>
      <footer class="site-footer">
          <div class="text-center">
              2015 - Tushar Kanakagiri and Uttam Bhat
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/cryptojs/rollups/sha3.js"></script>
    <script src="assets/js/cryptojs/rollups/md5.js"></script>
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
    <script src="assets/js/zabuto_calendar.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
          $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
          action: function () {
            return myDateFunction(this.id, false);
          },
          action_nav: function () {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [
          ]
        });
        $("#change_password_form").submit(function() {
          var oldpass_val = String( CryptoJS.SHA3( $("#oldpass").val() ) );
          var newpass_val = String( CryptoJS.SHA3( $("#newpass").val() ) );
          var conpass_val = String( CryptoJS.SHA3( $("#conpass").val() ) );

          $.ajax({
            type: "POST",
            url: "change-password-backend.php",
            dataType: "JSON",
            data: { oldpass: oldpass_val, newpass: newpass_val, conpass: conpass_val }
          })
          .done(function(data) {
            if (data == "1") {
              var htmlcontent = '<form action="settings.php" method="POST" id="redirecter"><input type="hidden" name="password_changed" value="1" /></form>';
              $("#emptyform").html(htmlcontent);
              $("#redirecter").submit();
            }
            else {
              $("#password_change_modal").modal('show');
              $("#oldpass").val("");
              $("#newpass").val("");
              $("#conpass").val("");

              return false;
            }
          });
          return false;
        });
      });
      function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }
    </script>
  </body>
</html>