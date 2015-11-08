<?php
error_reporting(0);
  function show_marks_modal($STUDENT_DATA) {
    $subject = $STUDENT_DATA['subject'];
    $subject = rtrim($subject);
    $test = $STUDENT_DATA['test'];
    $test = rtrim($test);

    $filename = $subject."_".$test;
    $pathname = "marks/" . $filename . ".txt";
    $qmarks_obtained = 0;
    $tmarks_obtained = 0;
    if (!file_exists($pathname)) {
      $myfile = fopen($pathname, "w") or die("Unable to open file!");
      fwrite($myfile, $subject . "\n");
      fwrite($myfile, $test . "\n");
      fclose($myfile);
    }
    $to_write = "";

    $to_write = $to_write . $STUDENT_DATA['usn'] . "\n";

    $count = 0;
    for ($i=1; $i <= 15; $i++) {
      if (isset($STUDENT_DATA['quiz_marks_' . strval($i)]) and isset($STUDENT_DATA['quiz_co_'.strval($i)])) {
        $count++;
      }
    }
    $to_write = $to_write . strval($count) . "\n";
    for ($i=1; $i <= 15; $i++) {
      if (isset($STUDENT_DATA['quiz_marks_' . strval($i)]) and isset($STUDENT_DATA['quiz_co_'.strval($i)])) {
        $to_write = $to_write . $STUDENT_DATA['quiz_marks_'.strval($i)] . " " . rtrim($STUDENT_DATA['quiz_max_'.strval($i)]) . " ";
        $to_write = $to_write . rtrim($STUDENT_DATA['quiz_co_'.strval($i)]) . "\n";
        $qmarks_obtained += intval($STUDENT_DATA['quiz_marks_'.strval($i)]);
      }
    }

    $count = 0;
    $qparts = array('a', 'b', 'c');
    for ($i=1; $i <= 5; $i++) {
      for ($j=0; $j < 3; $j++) { 
        if (isset($STUDENT_DATA['theory_marks_' . strval($i) . $qparts[$j]])) {
          $count++;
        }
      }
    }
    $to_write = $to_write . strval($count) . "\n";
    for ($i=1; $i <= 5; $i++) {
      for ($j=0; $j < 3; $j++) { 
        if (isset($STUDENT_DATA['theory_marks_' . strval($i) . $qparts[$j]])) {
          $to_write = $to_write . strval($i) . $qparts[$j] . " " . $STUDENT_DATA['theory_marks_'.strval($i).$qparts[$j]];
          $to_write = $to_write . " " . rtrim($STUDENT_DATA['theory_max_'.strval($i).$qparts[$j]]);
          $to_write = $to_write . " " . rtrim($STUDENT_DATA['theory_co_'.strval($i).$qparts[$j]]) . "\n";
          $tmarks_obtained += intval($STUDENT_DATA['theory_marks_'.strval($i).$qparts[$j]]);
        }
      }
    }
    file_put_contents($pathname, $to_write, FILE_APPEND | LOCK_EX);

    echo '<div class="modal fade" id="single_student_added" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    echo '<h3 class="modal-title" id="myModalLabel">Marks Successfully Stored</h3>';
    echo '</div>';
    echo '<div class="modal-body">';

    echo '<h4>Test ' . $test . ' Marks Of ' . $STUDENT_DATA['usn'] . ' In ' . $subject . '</h4>';
    echo '<h5>Quiz: ' . $qmarks_obtained . ' / 15</h5>';
    echo '<h5>Theory: ' . $tmarks_obtained . ' / 50</h5>';

    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
?>