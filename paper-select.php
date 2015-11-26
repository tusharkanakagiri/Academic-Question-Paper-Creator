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
                          <span>Modify Questions</span>
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
                        include "Connections.php";

                            if ($_SERVER["REQUEST_METHOD"] == "POST")
                                {
                                if(isset($_POST['question-submit']))
                                    {
                                        $subject_code=($_POST['subject_code']);
                                        $test_number=($_POST['test']);

/* ----------------------     Taking Quiz Related Parameters ----------------------------------  */

                                        $quiz_chapter_1=($_POST['qchapter1']);
                                        $quiz_marks_1=($_POST['qmark1']);
                                        $quiz_co_1=($_POST['qco1']);
                                        $quiz_lo_1=($_POST['qlo1']);

                                        $quiz_chapter_2=($_POST['qchapter2']);
                                        $quiz_marks_2=($_POST['qmark2']);
                                        $quiz_co_2=($_POST['qco2']);
                                        $quiz_lo_2=($_POST['qlo2']);

                                        $quiz_chapter_3=($_POST['qchapter3']);
                                        $quiz_marks_3=($_POST['qmark3']);
                                        $quiz_co_3=($_POST['qco3']);
                                        $quiz_lo_3=($_POST['qlo3']);

                                        $quiz_chapter_4=($_POST['qchapter4']);
                                        $quiz_marks_4=($_POST['qmark4']);
                                        $quiz_co_4=($_POST['qco4']);
                                        $quiz_lo_4=($_POST['qlo4']);

                                        $quiz_chapter_5=($_POST['qchapter5']);
                                        $quiz_marks_5=($_POST['qmark5']);
                                        $quiz_co_5=($_POST['qco5']);
                                        $quiz_lo_5=($_POST['qlo5']);

                                        $quiz_chapter_6=($_POST['qchapter6']);
                                        $quiz_marks_6=($_POST['qmark6']);
                                        $quiz_co_6=($_POST['qco6']);
                                        $quiz_lo_6=($_POST['qlo6']);

                                        $quiz_chapter_7=($_POST['qchapter7']);
                                        $quiz_marks_7=($_POST['qmark7']);
                                        $quiz_co_7=($_POST['qco7']);
                                        $quiz_lo_7=($_POST['qlo7']);

                                        $quiz_chapter_8=($_POST['qchapter8']);
                                        $quiz_marks_8=($_POST['qmark8']);
                                        $quiz_co_8=($_POST['qco8']);
                                        $quiz_lo_8=($_POST['qlo8']);

                                        $quiz_chapter_9=($_POST['qchapter9']);
                                        $quiz_marks_9=($_POST['qmark9']);
                                        $quiz_co_9=($_POST['qco9']);
                                        $quiz_lo_9=($_POST['qlo9']);

                                        $quiz_chapter_10=($_POST['qchapter10']);
                                        $quiz_marks_10=($_POST['qmark10']);
                                        $quiz_co_10=($_POST['qco10']);
                                        $quiz_lo_10=($_POST['qlo10']);

                                        $quiz_chapter_11=($_POST['qchapter11']);
                                        $quiz_marks_11=($_POST['qmark11']);
                                        $quiz_co_11=($_POST['qco11']);
                                        $quiz_lo_11=($_POST['qlo11']);

                                        $quiz_chapter_12=($_POST['qchapter12']);
                                        $quiz_marks_12=($_POST['qmark12']);
                                        $quiz_co_12=($_POST['qco12']);
                                        $quiz_lo_12=($_POST['qlo12']);

                                        $quiz_chapter_13=($_POST['qchapter13']);
                                        $quiz_marks_13=($_POST['qmark13']);
                                        $quiz_co_13=($_POST['qco13']);
                                        $quiz_lo_13=($_POST['qlo13']);

                                        $quiz_chapter_14=($_POST['qchapter14']);
                                        $quiz_marks_14=($_POST['qmark14']);
                                        $quiz_co_14=($_POST['qco14']);
                                        $quiz_lo_14=($_POST['qlo14']);

                                        $quiz_chapter_15=($_POST['qchapter15']);
                                        $quiz_marks_15=($_POST['qmark15']);
                                        $quiz_co_15=($_POST['qco15']);
                                        $quiz_lo_15=($_POST['qlo15']);

                                        
/* ----------------------     Taking Theory Related Parameters ----------------------------------  */

                                        $theory_chapter_1=($_POST['theory_chapter_1a']);
                                        $theory_marks_1=($_POST['theory_marks_1a']);
                                        $theory_co_1=($_POST['theory_co_1a']);
                                        $theory_lo_1=($_POST['theory_lo_1a']);

                                        $theory_chapter_2=($_POST['theory_chapter_1b']);
                                        $theory_marks_2=($_POST['theory_marks_1b']);
                                        $theory_co_2=($_POST['theory_co_1b']);
                                        $theory_lo_2=($_POST['theory_lo_1b']);

                                        $theory_chapter_3=($_POST['theory_chapter_1c']);
                                        $theory_marks_3=($_POST['theory_marks_1c']);
                                        $theory_co_3=($_POST['theory_co_1c']);
                                        $theory_lo_3=($_POST['theory_lo_1c']);

                                        $theory_chapter_4=($_POST['theory_chapter_2a']);
                                        $theory_marks_4=($_POST['theory_marks_2a']);
                                        $theory_co_4=($_POST['theory_co_2a']);
                                        $theory_lo_4=($_POST['theory_lo_2a']);

                                        $theory_chapter_5=($_POST['theory_chapter_2b']);
                                        $theory_marks_5=($_POST['theory_marks_2b']);
                                        $theory_co_5=($_POST['theory_co_2b']);
                                        $theory_lo_5=($_POST['theory_lo_2b']);

                                        $theory_chapter_6=($_POST['theory_chapter_2c']);
                                        $theory_marks_6=($_POST['theory_marks_2c']);
                                        $theory_co_6=($_POST['theory_co_2c']);
                                        $theory_lo_6=($_POST['theory_lo_2c']);

                                        $theory_chapter_7=($_POST['theory_chapter_3a']);
                                        $theory_marks_7=($_POST['theory_marks_3a']);
                                        $theory_co_7=($_POST['theory_co_3a']);
                                        $theory_lo_7=($_POST['theory_lo_3a']);

                                        $theory_chapter_8=($_POST['theory_chapter_3b']);
                                        $theory_marks_8=($_POST['theory_marks_3b']);
                                        $theory_co_8=($_POST['theory_co_3b']);
                                        $theory_lo_8=($_POST['theory_lo_3b']);

                                        $theory_chapter_9=($_POST['theory_chapter_3c']);
                                        $theory_marks_9=($_POST['theory_marks_3c']);
                                        $theory_co_9=($_POST['theory_co_3c']);
                                        $theory_lo_9=($_POST['theory_lo_3c']);

                                        $theory_chapter_10=($_POST['theory_chapter_4a']);
                                        $theory_marks_10=($_POST['theory_marks_4a']);
                                        $theory_co_10=($_POST['theory_co_4a']);
                                        $theory_lo_10=($_POST['theory_lo_4a']);

                                        $theory_chapter_11=($_POST['theory_chapter_4b']);
                                        $theory_marks_11=($_POST['theory_marks_4b']);
                                        $theory_co_11=($_POST['theory_co_4b']);
                                        $theory_lo_11=($_POST['theory_lo_4b']);

                                        $theory_chapter_12=($_POST['theory_chapter_4c']);
                                        $theory_marks_12=($_POST['theory_marks_4c']);
                                        $theory_co_12=($_POST['theory_co_4c']);
                                        $theory_lo_12=($_POST['theory_lo_4c']);

                                        $theory_chapter_13=($_POST['theory_chapter_5a']);
                                        $theory_marks_13=($_POST['theory_marks_5a']);
                                        $theory_co_13=($_POST['theory_co_5a']);
                                        $theory_lo_13=($_POST['theory_lo_5a']);

                                        $theory_chapter_14=($_POST['theory_chapter_5b']);
                                        $theory_marks_14=($_POST['theory_marks_5b']);
                                        $theory_co_14=($_POST['theory_co_5b']);
                                        $theory_lo_14=($_POST['theory_lo_5b']);

                                        $theory_chapter_15=($_POST['theory_chapter_5c']);
                                        $theory_marks_15=($_POST['theory_marks_5c']);
                                        $theory_co_15=($_POST['theory_co_5c']);
                                        $theory_lo_15=($_POST['theory_lo_5c']);

/* End of Theory Parameters */

/* Start of querying questions */

//Establish connection
                                        $servername = "localhost";
                                        $username = "project";
                                        $password = "project";
                                        $dbname = "wp";

                                        $conn = mysqli_connect($servername, $username, $password, $dbname);


                                        require_once 'PHPWord.php';
                                        $PHPWord = new PHPWord();
                                        $document = $PHPWord->loadTemplate('Template.docx');


                                          $document->setValue('subject_code', $subject_code);
                                          $document->setValue('test_number', $test_number);

                                          $today_date=date("Y/m/d");

                                          $document->setValue('today_date', $today_date);

                                        for($x=1;$x<=15;$x++)
{
                                          $qchap ="quiz_chapter_".$x;
                                          $qco = "quiz_co_".$x;
                                          $qlo = "quiz_lo_".$x;
                                          $qmarks = "quiz_marks_".$x;
                                          $qqchap=$$qchap;
                                          $qqco=$$qco;
                                          $qqlo=$$qlo;
                                          $qqmarks=$$qmarks;


                                          $qmd="qm_";
                                          $qcod="qco_";
                                          $qlod="qlo_";

                                          $document->setValue($qmd.$x, $qqmarks);
                                          $document->setValue($qcod.$x, $qqco);
                                          $document->setValue($qlod.$x, $qqlo);


                                          $paper_user=$_SESSION['name'];
                                          $arr = explode(' ',trim($paper_user));
                                          $fname=$arr[0];

                                        if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                            }
                                        $sql = "SELECT question
                                        FROM questions
                                        WHERE subject='$subject_code' AND co='$qqco' AND lo='$qqlo' AND marks='$qqmarks' AND chapter='$qqchap'
                                        ORDER BY RAND() 
                                        LIMIT 1";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                //echo "Question " ."$x".": ". $row["question"]. "<br>";
                                                $qd="q_";
                                                $final_qq = $row["question"];

                                                $document->setValue($qd.$x, $final_qq);
                                                
                                            }
                                        } else {
                                            //echo "0 results";
                                          $qd="q_";
                                          $document->setValue($qd.$x, '');
                                        }

}
                                        for($x=1;$x<=15;$x++)
                                        { 
                                          $tchap ="theory_chapter_".$x;
                                          $tco = "theory_co_".$x;
                                          $tlo = "theory_lo_".$x;
                                          $tmarks = "theory_marks_".$x;
                                          $ttchap=$$tchap;
                                          $ttco=$$tco;
                                          $ttlo=$$tlo;
                                          $ttmarks=$$tmarks;


                                          $tmd="tm_";
                                          $tcod="tco_";
                                          $tlod="tlo_";

                                          

                                        if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                            }
                                        $sql = "SELECT question
                                        FROM questions
                                        WHERE subject='$subject_code' AND co='$ttco' AND lo='$ttlo' AND marks='$ttmarks' AND chapter='$ttchap'
                                        ORDER BY RAND() 
                                        LIMIT 1";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                

                                                $td="t_";
                                                $final_tq = $row["question"];

                                                $document->setValue($td.$x, $final_tq);
                                                $document->setValue($tmd.$x, $ttmarks);
                                          $document->setValue($tcod.$x, $ttco);
                                          $document->setValue($tlod.$x, $ttlo);

                                            }
                                        } else {
                                            //echo "0 results";
                                          $qd="t_";
                                          $document->setValue($qd.$x, '');
                                          $document->setValue($tmd.$x, '');
                                          $document->setValue($tcod.$x, '');
                                          $document->setValue($tlod.$x, '');

                                        }
                                        }

                                        $file_name='papers/dbms/'.$paper_user.'.docx';
                                        $document->save('papers/dbms/'.$paper_user.'.docx');
                                        


    // Querying the professor incharge
                                          
                                          $sql = "SELECT incharge
                                          FROM professors
                                          WHERE firstname='$fname'" ;
                                          
                                          $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                
                                                $incharge = $row["incharge"];
                                                
                                            }
                                        } else {
                                            //echo "0 results";
                                        }


// Querying ID of the professor creating the paper

                                        $sql = "SELECT id
                                          FROM professors
                                          WHERE firstname='$fname'" ;
                                          
                                          $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                
                                                $prof_id=$row["id"];
                                                
                                            }
                                        } else {
                                            //echo "0 results";
                                        }


// Adding file(filename)  
                                       
                                       
                                        $prof_id=$prof_id-1;
                                        $nfil='file'.$prof_id;

                                        $sql = "UPDATE `professors` SET `$nfil`='$file_name' WHERE username='$incharge'" ;

                                        $result = mysqli_query($conn, $sql);

                                          

// Close Connection
                                        mysqli_close($conn);

                                          
                                    }
                                }

                      ?>
<div class="col-lg-9 main-chart">
<h1> Your paper has been created </h1>
<?php echo('<h3><a href="'.$file_name.'">Click here</a> to Download Paper</h3>'); ?>
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
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#single_student_added").modal('show');
            $("#student_spreadsheet_added").modal('show');
            $("#new_paper_created").modal('show');
            $("#add_co_data").modal('show');
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
