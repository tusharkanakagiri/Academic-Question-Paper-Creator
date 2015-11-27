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
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina" >

    <title>RVCE Question Paper Creatorr</title>

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
            <h3>New Test Paper</h3>
              <div class="row">
                  
                  <div class="form-panel">
                    <br>
                      <form class="form-horizontal style-form" method="post" action="paper-select.php">
                          <input type="hidden" name="new_paper_created" value="1" />
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">&emsp;Subject Code</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" name="subject_code" id="subject_code" required/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">&emsp;Test Number</label>
                              <div class="col-sm-3">
                                <select class="form-control" name="test" id="test" required>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                </select>
                              </div>
                          </div>

                          <h4>Paper Format</h4>
                            <div class="form-group">
                                <label class="col-sm-3 col-sm-3 control-label">&emsp;Quiz Questions</label>
                                <div class="col-sm-3">
                                  <select class="form-control" name="no_of_quiz" id="no_of_quiz">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                  </select>
                                </div>
                            </div>

                            <h4 id="quiz_paper_heading">Quiz Paper Format</h4>
                              <table class="table table-hover" id="quiz_questions">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Chapter</th>
                                    <th>Total Marks</th>
                                    <th>Course Outcome</th>
                                    <th>Blooms Taxonomy</th>
                                  </tr>
                                </thead>
                                <tbody id="quiz_table_body">
                                </tbody>
                              </table>

                            <h4 id="theory_heading">Theory Paper Format</h4>
                              <table class="table table-hover" id="theory_questions">
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
                                    <td>1a</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_1a" class="form-control" required>  
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                               <input type="checkbox" name="theory_present_1a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1a" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_1a" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>1b</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_1b" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_1b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1b" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_1b" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>1c</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_1c" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_1c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1c" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_1c" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>2a</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_2a" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2a" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_2a" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>2b</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_2b" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2b" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_2b" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>2c</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_2c" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2c" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_2c" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>3a</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_3a" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_3a" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_3a" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>3b</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_3b" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_3b" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_3b" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>3c</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_3c" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3c" class="form-control"></td>
                                   <td>
                                      <select class="form-control" name="theory_co_3c" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_3c" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>4a</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_4a" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4a" class="form-control" required></td>
                                    
                                     <td>
                                      <select class="form-control" name="theory_co_4a" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_4a" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>4b</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_4b" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_4b" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_4b" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>4c</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_4c" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_4c" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_4c" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>5a</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_5a" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5a" class="form-control" required></td>
                                   <td>
                                      <select class="form-control" name="theory_co_5a" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_5a" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>5b</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_5b" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5b" class="form-control"></td>
                                   <td>
                                      <select class="form-control" name="theory_co_5b" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_5b" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>5c</td>
                                    <td>
                                      <input type="number" min="0" max="10" name="theory_chapter_5c" class="form-control" required> 
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_5c" id="theory_co_1a">
                                        <option value="CO-1">CO-1</option>
                                        <option value="CO-2">CO-2</option>
                                        <option value="CO-3">CO-3</option>
                                        <option value="CO-4">CO-4</option>
                                      </select>
                                    </td>
                                    <td>
                                      <select class="form-control" name="theory_lo_5c" id="theory_lo_1b">
                                        <option value="LO-1">LO-1</option>
                                        <option value="LO-2">LO-2</option>
                                        <option value="LO-3">LO-3</option>
                                        <option value="LO-4">LO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                </tbody>
                              </table>

                          <div style="margin-left:40px;" >
                              <button type="submit" style="width:120px" class="btn btn-round btn-success" id="submit" name="question-submit">Submit</button>
                          </div>
                      </form>
                      <br><br>
                      <div style="margin-left:20px;" >
                        <a href="home.php">&lt; Return to previous page</a>
                      </div>
                      <br>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="assets/js/chart-master/Chart.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    
    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>
    
    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>
    
    <script src="assets/js/form-component.js"></script>    

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
    <script type="text/javascript">
      $(document).ready(function() {
        $("#subject_code").prop("selectedIndex", -1);
        $("#test").prop("selectedIndex", -1);
        $("#no_of_quiz").prop("selectedIndex", -1);
        console.log("set default dropdown value to -1");
        $("#quiz_questions").hide();
        $("#quiz_paper_heading").hide();
        $("#submit").hide();
        $("#theory_questions").hide();
        $("#theory_heading").hide();

        $("#no_of_quiz").change(function() {
          $("#quiz_questions").show();
          $("#quiz_paper_heading").show();
          $("#quiz_table_body").html("");
          var row = "<tr><td>"; "</td><td></td><td></td>";
          var questions = parseInt($($(this)).val());
          for (var i = 1; i <= questions; i++) {
            var r16 = "<tr><td>" + i.toString() + "</td>";
            var r17 = '<td><input type="number" min="1" max="10" name="qchapter'+ i.toString() + '" class="form-control" required></td>';
            var r1 = "<td>" + i.toString() + "</td>";
            var r2 = '<td><input type="number" min="1" max="2" name="qmark'+ i.toString() + '" class="form-control" required></td>';
            var r3 = '<td><select name="qco'+ i.toString() + '" class="form-control" required>';
            var r4 = '<option value="CO-1">CO-1</option>';
            var r5 = '<option value="CO-2">CO-2</option>';
            var r6 = '<option value="CO-3">CO-3</option>';
            var r7 = '<option value="CO-4">CO-4</option>';
            var r8 = '</select></td>';

            
            var r10 = '<td><select name="qlo'+ i.toString() + '" class="form-control" required>';
            var r11 = '<option value="LO-1">LO-1</option>';
            var r12 = '<option value="LO-2">LO-2</option>';
            var r13 = '<option value="LO-3">LO-3</option>';
            var r14 = '<option value="LO-4">LO-4</option>';
            var r15 = '</select></td></tr>';
            $($("#quiz_table_body")).append(r16+r17+r2+r3+r4+r5+r6+r7+r8+r10+r11+r12+r13+r14+r15);
          };
          console.log(questions);

          $("#theory_questions").show();
          $("#theory_heading").show();
          $("#submit").show();
        });
      });
    </script>
    <script>
        //custom select box
        $(function(){
            $('select.styled').customSelect();
        });

    </script>

  </body>
</html>
