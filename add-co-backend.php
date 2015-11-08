<?php
    error_reporting(0);
  function addCOData($PAPERDATA) {
    session_start();

    $subject_code = $PAPERDATA['subject'];
    $subject_code = rtrim($subject_code);

    $pathname = "co/" . $subject_code . ".txt";
    $myfile = fopen($pathname, "w") or die("Unable to open file!");

    fwrite($myfile, $PAPERDATA['co1'] . "\n");
    fwrite($myfile, $PAPERDATA['co2'] . "\n");
    fwrite($myfile, $PAPERDATA['co3'] . "\n");
    fwrite($myfile, $PAPERDATA['co4'] . "\n");

    fclose($myfile);

    echo '<div class="modal fade" id="add_co_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    echo '<h3 class="modal-title" id="myModalLabel">Success!</h3>';
    echo '</div>';
    echo '<div class="modal-body">';

    echo '<h4>Required CO Mapping Successfully Stored</h4>';

    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
?>
