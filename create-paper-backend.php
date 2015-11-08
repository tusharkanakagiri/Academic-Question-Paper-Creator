<?php
error_reporting(0);
  function addPaper($PAPERDATA) {
    require_once('assets/Classes/PHPExcel.php');

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()->setCreator("RVCE");
    $objPHPExcel->getProperties()->setLastModifiedBy("RVCE");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
    $objPHPExcel->getProperties()->setDescription("Excel Template for Marks Upload");

    $objPHPExcel->setActiveSheetIndex(0);
    $letters = range('B', 'Z');

    require_once("Connections.php");
    $A = new Db_Connect();
    session_start();

    $filename = $PAPERDATA["subject_code"] . "_" . $PAPERDATA['test'];
    $pathname = "formats/" . $filename . ".txt";
    $myfile = fopen($pathname, "w") or die("Unable to open file!");

    $quiz_questions = intval($PAPERDATA['no_of_quiz']);

    fwrite($myfile, $PAPERDATA["subject_code"] . "\n");
    fwrite($myfile, $PAPERDATA['test'] . "\n");
    fwrite($myfile, strval($quiz_questions) . "\n");

    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'QUIZ');
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'MAXIMUM MARKS');
    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Student USN');
    $lc = 0;
    for ($i=1; $i <= $quiz_questions; $i++) {
      $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'1', $PAPERDATA['qco'.strval($i)]);
      $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'2', $PAPERDATA['qmark'.strval($i)]);
      $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'3', '0');
      $lc++;
      fwrite($myfile, $PAPERDATA['qmark'.strval($i)] . " " . $PAPERDATA['qco'.strval($i)] . "\n");
    }

    $qparts = array('a', 'b', 'c');
    $theory_questions = 0;

    for ($i=1; $i <= 5; $i++) {
      for ($j=0; $j < 3; $j++) { 
        if ($PAPERDATA['theory_present_' . strval($i) . $qparts[$j]] == "1") {
          $theory_questions += 1;
        }
      }
    }

    fwrite($myfile, strval($theory_questions) . "\n");
    $objPHPExcel->getActiveSheet()->SetCellValue('A4', 'TEST');
    $objPHPExcel->getActiveSheet()->SetCellValue('A5', 'QNO');
    $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'MAXIMUM MARKS');
    $objPHPExcel->getActiveSheet()->SetCellValue('A7', 'Student USN');
    $lc = 0;
    for ($i=1; $i <= 5; $i++) {
      for ($j=0; $j < 3; $j++) { 
        if ($PAPERDATA['theory_present_' . strval($i) . $qparts[$j]] == "1") {
          $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'4', $PAPERDATA['theory_co_'.strval($i).$qparts[$j]]);
          $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'5', strval($i).$qparts[$j]);
          $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'6', $PAPERDATA['theory_marks_'.strval($i).$qparts[$j]]);
          $objPHPExcel->getActiveSheet()->SetCellValue($letters[$lc].'7', '0');
          $lc++;
          fwrite($myfile, strval($i).$qparts[$j]." ".$PAPERDATA['theory_marks_'.strval($i).$qparts[$j]]." ".$PAPERDATA['theory_co_'.strval($i).$qparts[$j]]."\n");
        }
      }
    }

    $subject_code = $PAPERDATA['subject_code'];
    $subject_code = rtrim($subject_code);
    $test = $PAPERDATA['test'];
    $test = rtrim($test);
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $excelFileName = 'excels/' . $subject_code . "_" . $test . ".xlsx";
    $objWriter->save($excelFileName);

    fclose($myfile);

    echo '<div class="modal fade" id="new_paper_created" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
    echo '<h3 class="modal-title" id="myModalLabel">Success!</h3>';
    echo '</div>';
    echo '<div class="modal-body">';

    echo '<h4>Paper Format of Test ' . $test . ' In ' . $subject_code . ' Successfully Stored</h4>';

    echo '</div>';
    echo '<div class="modal-footer">';
    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
?>