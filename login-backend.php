<?php
error_reporting(0);
  function verifyLogin($LOGIN_CREDENTIALS) {
    require_once("Connections.php");
    $A = new Db_Connect();
    session_start();

    $uname    = $LOGIN_CREDENTIALS['uname'];
    $password = $LOGIN_CREDENTIALS['passwd'];

    if (isset($_SESSION['logged_in'])) {
      header('Location: home.php');
      die();
    }
    else {
      $query1 = "select * from login where username='" . $uname . "' and password='" . $password . "';";
      $var = $A->writeQuery($query1);

      $count = 0;
      $user_data = "";
      while($row = mysqli_fetch_array($var)) {
        $user_data = $row;
        $count = $count+1;
      }

      if ($count == 0) {
        session_destroy();
        echo '<div class="modal fade" id="login_attempt_result" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
        echo '<h3 class="modal-title" id="myModalLabel">Login Failed!</h3>';
        echo '</div>';
        echo '<div class="modal-body">';

        echo '<h4>Please check username and password!</h4>';

        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      else {
        $_SESSION['logged_in'] = 1;
        $_SESSION['name'] = $user_data['firstname'] . " " . $user_data['lastname'];
        $_SESSION['profile'] = $user_data['profile'];
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['firstname'] = $user_data['firstname'];
        $_SESSION['lastname'] = $user_data['lastname'];
        $_SESSION['first_time_on_home'] = 1;

        header("Location: home.php");
        die();
      }
    }
  }
?>