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
        
          <p class="centered"><img src="<?php echo $_SESSION['profile']; ?>" class="img-circle" width="60"></p>
          <h5 class="centered" id="userloggedin"><?php echo $_SESSION['name']; ?></h5>
          
          <li class="mt">
            <a href="home.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
            </a>
          </li>

          <li class="sub-menu">
            <a class="active" href="create-paper.php" >
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
      <div class="col-lg-9 main-chart">
        <?php
          $test = $_GET['test'];
          $subject = $_GET['subject'];
          $excelFileName = 'excels/' . $subject . "_" . $test . ".xlsx";
          echo '<h3>File Upload For Subject '.$subject.' For Test '.$test.'</h3>';
        ?>
        <div class="row">

          <div class="form-panel">
            
            <form name="uploaderform" class="form-horizontal style-form" method="post" action="paper-select.php" enctype="multipart/form-data">
              <?php
                echo '<input type="hidden" name="subject" value="'.$subject.'" />';
                echo '<input type="hidden" name="test" value="'.$test.'" />';
                echo '<input type="hidden" name="spreadsheet_upload" value="1" />';
              ?>

              <div class="form-group">
                <label class="col-sm-4 col-sm-4 control-label">&emsp;Upload Excel Sheet with Marks</label>
                <div class="col-sm-5">
                  <input name="file" type="file" id="xlfile" class="file-input" required>
                </div>
              </div>
              
              <div class="showback" id="progress" style="display: none;">
                <div class="progress progress-striped active">
                  <div id="mother" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only"></span>
                  </div>
                </div>
              </div>

              <br>

              <div style="margin-left:40px;" >
                  <button type="button" id="boton" style="width:120px" class="btn btn-round btn-success" onclick="mysubmit()">Submit</button>
              </div>              

              <br><br>
              <div style="margin-left:20px;" id="returner">
                <a href="paper-select.php">&emsp;&lt; Return to previous page</a>
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
  function mysubmit() {
    if(document.getElementById("xlfile").value == "") {
      alert("Please select a file for upload!");
      return false;
    }
    document.getElementById("boton").style.display = 'none';
    document.getElementById("returner").style.display = 'none';
    document.getElementById("mother").setAttribute("aria-valuenow","0");
    document.getElementById("mother").setAttribute("style","width: 0%;");
    document.getElementById("progress").style.display = 'block';
    for(var i = 1; i <= 100; ++i ) {
      setTimeout(
        function() {
          document.getElementById("mother").setAttribute("aria-valuenow",i.toString());
          document.getElementById("mother").setAttribute("style","width: "+i.toString()+"%;");
        },
        100*i
      );
    }
    setTimeout(function(){document.forms["uploaderform"].submit();},1200);
  }
  </script>
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
