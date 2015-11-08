<?php
error_reporting(0);
  function logout() {
    session_start();
    session_destroy();
    $_SESSION = array();
    return 1;
  }
  function displayLogoutModal() {
    echo '<div class="modal fade" id="logout_modal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    echo '<h3 class="modal-title" id="myModalLabel">Success!</h3>';
    echo '</div>';
    echo '<div class="modal-body">';

    echo '<h4>Successfully Logged Out!</h4>';

    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
?>