<?php
error_reporting(0);
  session_start();
  if (!isset($_SESSION['logged_in'])) {
      header("Location: login.php");
      session_destroy();
      exit();
  }
  if (isset($_POST['profile_picture_updated'])) {
    if ($_POST['profile_picture_updated'] == "1") {
      require("change-face-backend.php");
      $change_success = changeProfilePicture($_FILES);
    }
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
            <a href="settings.php" >
              <i class="fa fa-cogs"></i>
              <span>Settings</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="add-questions.php" >
              <i class="fa fa-cogs"></i>
              <span>Add Questions</span>
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
                      if (isset($_POST['profile_picture_updated'])) {
                        if ($_POST['profile_picture_updated'] == "1") {
                          showProfilePicChangeStatusModal($change_success);
                        }
                      }
                      if (isset($_POST['password_changed'])) {
                        if ($_POST['password_changed'] == "1") {
                          echo '<div class="modal fade" id="password_change_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                          echo '<div class="modal-dialog">';
                          echo '<div class="modal-content">';
                          echo '<div class="modal-header">';
                          echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
                          echo '<h3 class="modal-title" id="myModalLabel">Success!</h3>';
                          echo '</div>';
                          echo '<div class="modal-body">';

                          echo '<h4>Password Successfully Changed</h4>';

                          echo '</div>';
                          echo '<div class="modal-footer">';
                          echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                        }
                      }
                    ?>

                    <h1>Settings</h1>
                    <div class="row mt">
                    
                    <!-- PASS -->
                    <a href="change-password.php">
                      <div class="col-md-4 col-sm-4 mb">
                        <div class="green-panel pn donut-chart">
                          <div class="green-header">
                             <h5>Change Password</h5>
                          </div>
                          <div class="row">
                           <div class="col-sm-6 col-xs-6 goleft">
                           </div>
                          </div>
                          <br><br><br>
                            <img src="assets/img/stars.png"></img>
                        </div><!--/grey-panel -->
                      </div><!-- /col-md-4-->
                    </a>  

                    <a href="change-face.php">
                      <div class="col-md-4 col-sm-4 mb">
                        <div class="green-panel pn donut-chart">
                          <div class="green-header">
                             <h5>Change Profile Photo</h5>
                          </div>
                          <br>
                          <img src='<?php echo $_SESSION['profile']; ?>' class="img-circle" height="80">
                          <br><br><b><?php echo $_SESSION['name']; ?></b>
                        </div><!--/grey-panel -->
                      </div><!-- /col-md-4-->
                    </a> 
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
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  	<script src="assets/js/zabuto_calendar.js"></script>	

  	<script type="application/javascript">
        $(document).ready(function () {
            $("#profile_pic_updated").modal('show');
            <?php
              if (isset($_POST['password_changed'])) {
                if ($_POST['password_changed'] == "1") {
                  echo '$("#password_change_modal").modal("show");';
                }
              }
            ?>
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
