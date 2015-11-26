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
            <div class="col-lg-9 main-chart">
            <h3>Add Question</h3>
              <div class="row">
                  
                  <div class="form-panel">
                    <br>
                      <form class="form-horizontal style-form" method="post" action="add-questions-backend.php">
                          <input type="hidden" name="new_paper_created" value="1" />
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">&emsp;Subject Code</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="subject_code" id="subject_code" required/>
                              </div>
                          </div>
                          
                          
                          <h4 id="theory_heading">Question Parameters</h4>
                              <table class="table table-hover" id="add-question">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Chapter</th>
                                    <th>Total Marks</th>
                                    <th>Course Outcome</th>
                                    <th>Blooms Taxonomy</th>
                                  </tr>
                                </thead>
                                <tbody id="theory_table_body">
                                  <tr>
                                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 1</td>
                                    <td>
                                      <input type="number" min="1" max="10" name="add_q_chap" class="form-control" required>  
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                               <input type="checkbox" name="add_q_chap" value="1" checked="true" >
                                          </div>
                                      </div>
                                    
                                    </td>
                                    <td><input type="number" min="1" max="10" name="add_q_marks" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="add_q_co" id="add_q_co">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="add_q_lo" id="add_q_lo">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                    
                                      
                              <label class="col-sm-6 col-sm-6 control-label">&emsp;Question</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="add_question" id="subject_code" required/>
                              </div>
                          
                        
                                  
                                </tbody>
                              </table>
                              <div style="margin-left:40px;" >
                              <button type="submit" style="width:120px" class="btn btn-round btn-success" id="submit" name="add-question-submit">Submit</button>
                          </div>
                      </form>
                      </div><!-- form-panel -->
<!-- Deleting questions -->
    <br><br>
            <h3>Delete Question</h3>

            <div class="form-panel">
                    <br>
                      <form class="form-horizontal style-form" method="post" action="delete-question.php">
                          <input type="hidden" name="new_paper_created" value="1" />
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">&emsp;Subject Code</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="del_subject_code" id="subject_code" required/>
                              </div>
                          </div>
                          
                          
                          
                              <table class="table table-hover" id="add-question">
                                <thead>
                                  <tr>
                                    
                                  </tr>
                                </thead>
                                <tbody id="theory_table_body">
                                  <tr>
                                   <label class="col-sm-6 col-sm-6 control-label">&emsp;Question</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="del_question" id="subject_code" required/>
                              </div>
                                  </tr>
                                                                 
                                </tbody>
                              </table>
                              <div style="margin-left:40px;" >
                              <button type="submit" style="width:120px" class="btn btn-round btn-success" id="submit" name="delete-question-submit">Submit</button>
                          </div>
                      </form>
                      </div><!-- form-panel -->



                      
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
