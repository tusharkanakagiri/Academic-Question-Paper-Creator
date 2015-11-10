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
                      <a class="active" href="select-graph.php" >
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
            <div class="row">
              <?php
                $files = $_GET['filename'];
                $files = '{"111":' . $files . '}';
                $files = str_replace("'", '"', $files);
                $files = json_decode($files);
                $filenames = array();
                $count = 0;
                foreach ($files as $key => $value) {
                  foreach ($value as $key1 => $value1) {
                    $filenames[] = $value1;
                    $count++;
                  }
                }
                $aco1 = array(0,0); $aco2 = array(0,0); $aco3 = array(0,0); $aco4 = array(0,0);
                for ($i=0; $i < $count; $i++) {
                  $filename = $filenames[$i];
                  $filename = rtrim($filename);
                  $pathname = "marks/" . $filename;
                  $myarray = explode('_', $filename);

                  $cur_subject_code = strtoupper($myarray[0]);

                  $co_text = array();
                  if (!isset($co_text[0])) {
                    $co_pathname = "co/" . $cur_subject_code . ".txt";
                    $cofile = fopen($co_pathname, "r") or die("Unable to open file!!!!!!");
                    $co_text[] = fgets($cofile);
                    $co_text[] = fgets($cofile);
                    $co_text[] = fgets($cofile);
                    $co_text[] = fgets($cofile);
                  }

                  $test = explode('.', $myarray[1]);
                  $test = $test[0];

                  $myfile = fopen($pathname, "r") or die("Unable to open file!");
                  $co1=array(0,0);
                  $co2=array(0,0);
                  $co3=array(0,0);
                  $co4=array(0,0);

                  $subject = fgets($myfile);
                  $testx = fgets($myfile);

                  while(!feof($myfile)) {
                    $crap = fgets($myfile);
                    if( feof($myfile) ) break;
                    $nquiz = intval( fgets($myfile) );
                    for( $ii = 1; $ii <= $nquiz; ++$ii ) {
                      $line = fgets($myfile);
                      $line = explode( ' ', $line );
                      $line[0] = rtrim($line[0]);
                      $line[1] = rtrim($line[1]);
                      $line[2] = rtrim($line[2]);
                      if( $line[2] == 'CO1' ) {
                        $co1[0] += intval($line[0]);
                        $co1[1] += intval($line[1]);
                      }
                      if( $line[2] == 'CO2' ) {
                        $co2[0] += intval($line[0]);
                        $co2[1] += intval($line[1]);
                      }
                      if( $line[2] == 'CO3' ) {
                        $co3[0] += intval($line[0]);
                        $co3[1] += intval($line[1]);
                      }
                      if( $line[2] == 'CO4' ) {
                        $co4[0] += intval($line[0]);
                        $co4[1] += intval($line[1]);
                      }
                    }

                    $ntest = intval( fgets($myfile) );
                    for( $ii = 1; $ii <= $ntest; ++$ii ) {
                      $line = fgets($myfile);
                      $line = explode( ' ', $line );
                      $line[1] = rtrim($line[1]);
                      $line[2] = rtrim($line[2]);
                      $line[3] = rtrim($line[3]);
                      if( $line[3] == 'CO1' ) {
                        $co1[0] += intval($line[1]);
                        $co1[1] += intval($line[2]);
                      }
                      if( $line[3] == 'CO2' ) {
                        $co2[0] += intval($line[1]);
                        $co2[1] += intval($line[2]);
                      }
                      if( $line[3] == 'CO3' ) {
                        $co3[0] += intval($line[1]);
                        $co3[1] += intval($line[2]);
                      }
                      if( $line[3] == 'CO4' ) {
                        $co4[0] += intval($line[1]);
                        $co4[1] += intval($line[2]);
                      }
                    }
                  }
                  fclose($myfile);
                  $co1[2] = intval($co1[0]*100/$co1[1]);
                  $co2[2] = intval($co2[0]*100/$co2[1]);
                  $co3[2] = intval($co3[0]*100/$co3[1]);
                  $co4[2] = intval($co4[0]*100/$co4[1]);
                  $aco1[0] += $co1[0];
                  $aco1[1] += $co1[1];
                  $aco2[0] += $co2[0];
                  $aco2[1] += $co2[1];
                  $aco3[0] += $co3[0];
                  $aco3[1] += $co3[1];
                  $aco4[0] += $co4[0];
                  $aco4[1] += $co4[1];
                  $testx =  strval($i+1);
                  echo '<div class="col-lg-12 main-chart">';
                  if ($i == 0) {
                    echo '<h1>Subject ' . $subject . ' CO Attainment</h1>';
                  }
                  echo '<div class="row mt"><!--CUSTOM CHART START -->';

                  echo '<div class="border-head">';
                  echo '<h3>Test ' . $test . '</h3>';
                  echo '</div>';

                  echo '<div class="custom-bar-chart" style="margin-left:100px;">';
                  echo '<ul class="y-axis">';
                  echo '<li><span>100%</span></li>';
                  echo '<li><span>80%</span></li>';
                  echo '<li><span>60%</span></li>';
                  echo '<li><span>40%</span></li>';
                  echo '<li><span>20%</span></li>';
                  echo '<li><span>0</span></li>';
                  echo '</ul>';
                  echo "<div class=\"bar\">";
                  echo "<div class=\"title\">" . $co_text[0] . "</div>";
                  echo "<div class=\"value tooltips\" data-original-title=\"".$co1[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$co1[2]."%</div>";
                  echo "</div>";
                  echo "<div class=\"bar \">";
                  echo "<div class=\"title\">" . $co_text[1] . "</div>";
                  echo "<div class=\"value tooltips\" data-original-title=\"".$co2[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$co2[2]."%</div>";
                  echo "</div>";
                  echo "<div class=\"bar \">";
                  echo "<div class=\"title\">" . $co_text[2] . "</div>";
                  echo "<div class=\"value tooltips\" data-original-title=\"".$co3[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$co3[2]."%</div>";
                  echo "</div>";
                  echo "<div class=\"bar \">";
                  echo "<div class=\"title\">" . $co_text[3] . "</div>";
                  echo "<div class=\"value tooltips\" data-original-title=\"".$co4[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$co4[2]."%</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div><!--custom chart end-->";
                  echo "</div>";
                }
                $aco1[2] = intval($aco1[0]*100/$aco1[1]);
                $aco2[2] = intval($aco2[0]*100/$aco2[1]);
                $aco3[2] = intval($aco3[0]*100/$aco3[1]);
                $aco4[2] = intval($aco4[0]*100/$aco4[1]);
                echo '<div class="col-lg-12 main-chart">';
                echo '<div class="row mt"><!--CUSTOM CHART START -->';

                echo '<div class="border-head">';
                echo '<h3>Aggregate Marks</h3>';
                echo '</div>';

                echo '<div class="custom-bar-chart" style="margin-left:100px;">';
                echo '<ul class="y-axis">';
                echo '<li><span>100%</span></li>';
                echo '<li><span>80%</span></li>';
                echo '<li><span>60%</span></li>';
                echo '<li><span>40%</span></li>';
                echo '<li><span>20%</span></li>';
                echo '<li><span>0</span></li>';
                echo '</ul>';
                echo "<div class=\"bar\">";
                echo "<div class=\"title\">" . $co_text[0] . "</div>";
                echo "<div class=\"value tooltips\" data-original-title=\"".$aco1[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$aco1[2]."%</div>";
                echo "</div>";
                echo "<div class=\"bar \">";
                echo "<div class=\"title\">" . $co_text[1] . "</div>";
                echo "<div class=\"value tooltips\" data-original-title=\"".$aco2[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$aco2[2]."%</div>";
                echo "</div>";
                echo "<div class=\"bar \">";
                echo "<div class=\"title\">" . $co_text[2] . "</div>";
                echo "<div class=\"value tooltips\" data-original-title=\"".$aco3[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$aco3[2]."%</div>";
                echo "</div>";
                echo "<div class=\"bar \">";
                echo "<div class=\"title\">" . $co_text[3] . "</div>";
                echo "<div class=\"value tooltips\" data-original-title=\"".$aco4[2]."%\" data-toggle=\"tooltip\" data-placement=\"top\">".$aco4[2]."%</div>";
                echo "</div>";
                echo "</div>";
                echo "</div><!--custom chart end-->";
                echo "</div>";

              ?>
              <br>
              <br>
            </div><!-- /row -->
            <br><br>
            <div>
              <a href="select-graph.php">&lt; Return</a>
            </div>
          </div>
        </section>
      </section>

      <!--main content end-->
      <!--footer start-->
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
  

  </body>
</html>
