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

  <title>RVCE C.O. Manager</title>

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
        <a href="home.php" class="logo"><b>RVCE C.O. Manager</b></a>
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
          
            <p class="centered"><img src="<?php echo $_SESSION['profile']; ?>" class="img-circle" width="60"></p>
            <h5 class="centered" id="userloggedin"><?php echo $_SESSION['name']; ?></h5>
            
            <li class="mt">
              <a href="home.php">
                <i class="fa fa-dashboard"></i>
                <span>Home</span>
              </a>
            </li>

            <li class="sub-menu">
              <a class="active" href="paper-select.php" >
                <i class="fa fa-tasks"></i>
                <span>Add Student Marks</span>
              </a>
            </li>

            <li class="sub-menu">
              <a href="select-graph.php" >
                <i class="fa fa-bar-chart-o"></i>
                <span>View CO Attainment</span>
              </a>
            </li>
            
            <li class="sub-menu">
              <a href="settings.php" >
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
        <div class="col-lg-9 main-chart">
          <?php
            $filename = $_GET['filename'];
            $myfile = fopen("formats/".$filename, "r");
            $subject = fgets($myfile);
            $test = fgets($myfile);
            echo '<h3>Marks Of Subject '.$subject.' For Test '.$test.'</h3>';
          ?>
          <div class="row">
            <div class="form-panel">
              <br>
              <form class="form-horizontal style-form" method="get" action="<?php echo 'excels/'.$subject."_".$test.".xlsx"; ?>" >
                <div class="form-group">
                  <div class="col-sm-10">
                  <h4 style="display: inline-block;">Download XLSX Template for this paper: &emsp;</h4>
                    <button type="submit" class="btn btn-theme03"><i class="fa fa-book"></i> Get Template </button>
                  </div>
                </div>
              </form>
              <form name="maupload" class="form-horizontal style-form" method="GET" action="file-upload.php">
                <div class="form-group">
                  <div class="col-sm-10">
                  <h4 style="display: inline-block;">Upload marks file: &emsp;</h4>
                    &emsp;<button type="submit" class="btn btn-theme03"><i class="fa fa-book"></i> Upload file &gt; </button>
                    <?php
                      echo '<input type="hidden" name="subject" value="'.$subject.'" />';
                      echo '<input type="hidden" name="test" value="'.$test.'" />';
                    ?>
                  </div>
                </div>
              </form>

              <form name="maform" class="form-horizontal style-form" method="post" action="paper-select.php" onsubmit="return validate()">
                <div class="form-group">
                  <div class="col-sm-10">
                    <h4 style="display: inline-block;">Enter student marks:</h4>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">&emsp;Student USN</label>
                  <div class="col-sm-10">
                    <input type="text" name="usn" class="form-control" style="width:200px;"  required/>
                  </div>
                </div>
                <?php
                  echo '<input type="hidden" name="subject" value="'.$subject.'" />';
                  echo '<input type="hidden" name="test" value="'.$test.'" />';
                  echo '<input type="hidden" name="student_marks_stored" value="1" />';
                ?>


                <table class="table table-hover">
                <h4>Quiz Marks</h4>
                <hr>
                  <thead>
                    <tr>
                      <th>Question Number</th>
                      <th>Course Outcome</th>
                      <th>Total Marks</th>
                      <th>Marks Obtained</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $quiz_questions = intval(fgets($myfile));
                      for ($i=1; $i <= $quiz_questions; $i++) {
                        $line = fgets($myfile);
                        $line = explode(" ", $line);
                        echo '<tr>';
                        echo '<td>'.strval($i).'</td>';
                        echo '<td>'.$line[1].'</td>';
                        echo '<td>'.$line[0].'</td>';
                        echo '<td><input type="number" min="0" max="'.$line[0].'" name="quiz_marks_'.strval($i).'" class="form-control" required/></td>';
                        echo '<td><input type="hidden" name="quiz_co_'.strval($i).'" value="'.$line[1].'" /></td>';
                        echo '<td><input type="hidden" name="quiz_max_'.strval($i).'" value="'.$line[0].'" /></td>';
                      }
                    ?>
                  </tbody>
                </table>

                <table class="table table-hover">
                <h4>Theory Marks</h4>
                <hr>
                  <thead>
                    <tr>
                      <th>Question Number</th>
                      <th>Course Outcome</th>
                      <th>Total Marks</th>
                      <th>Marks Obtained</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $theory_questions = intval(fgets($myfile));
                      for ($i=1; $i <= $theory_questions; $i++) {
                        $line = fgets($myfile);
                        $line = explode(" ", $line);
                        echo '<tr>';
                        echo '<td>'.$line[0].'</td>';
                        echo '<td>'.$line[2].'</td>';
                        echo '<td>'.$line[1].'</td>';
                        echo '<td><input type="number" min="0" max="'.$line[1].'" name="theory_marks_'.$line[0].'" class="form-control" required/></td>';
                        echo '<td><input type="hidden" name="theory_co_'.$line[0].'" value="'.$line[2].'" /></td>';
                        echo '<td><input type="hidden" name="theory_max_'.$line[0].'" value="'.$line[1].'" /></td>';
                      }
                    ?>
                  </tbody>
                </table>
                <div style="margin-left:40px;" >
                  <button type="submit" style="width:120px" class="btn btn-round btn-success">Submit</button>
                </div>
                <br><br>
                <div style="margin-left:20px;" >
                  <a href="paper-select.php">&lt; Return to previous page</a>
                </div>
                <br>
              </form>
            </div>
        </div><!-- /row -->
        </div>
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
          2014 - Aditya Muttur and Vishnu V Narayan
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
    

    <script>
      function validate() {
        var usn = document.forms["maform"]["usn"].value;
        var usnreg = /1RV\d\d[A-Z]{2}\d{3}/;
        if( usn.match(usnreg)){}
        else {
          alert("Invalid USN format");
          return false;
        }
      }
    </script>
  </body>
</html>
