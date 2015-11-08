<?php
error_reporting(0);
  function upload_spreadsheet($subject_code, $test_num, $SPREADSHEET_FILE) {
    $subject_code = rtrim($subject_code);
    $test_num = rtrim($test_num);

    $allowedExts = array('xls' ,'xlsx' ,'Excel5' , 'Excel2003XML' , 'Excel2007' ,'Excel' ,'Excel2010');
    $temp = explode(".", $SPREADSHEET_FILE["file"]["name"]);
    $extension = end($temp);
    $ext = pathinfo($SPREADSHEET_FILE["file"]["name"], PATHINFO_EXTENSION);

    $is_error = 1;
    $error_msg = "Invalid file format!";
    if( (($ext=="xls") || ($ext=="xlsx")) && in_array($extension, $allowedExts) ) {
      if ($SPREADSHEET_FILE["file"]["error"] > 0) {
        $error_msg = "Error: " . $SPREADSHEET_FILE["file"]["error"];
        $is_error = 1;
      }
      else {
        $excel_readers = array('Excel5' ,'Excel','Excel2003XML' , 'Excel2007' ,'Excel2010');
        define("UPLOAD_DIR", "uploads/");
        
        if (empty($SPREADSHEET_FILE["file"])) {
          $error_msg = "Empty file has been uploaded";
          $is_error = 1;
        }
        else {
          $temp_file = $SPREADSHEET_FILE["file"];
          if ($temp_file["error"] !== UPLOAD_ERR_OK) {
            $error_msg = "An error occurred during upload. Retry.";
            $is_error = 1;
          }
          else {
            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $temp_file["name"]);

            $i = 0;
            $parts = pathinfo($name);
            while (file_exists(UPLOAD_DIR . $name)) {
              $i++;
              $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
            }
                   
            $success = move_uploaded_file($temp_file["tmp_name"],UPLOAD_DIR . $name);
            if (!$success) { 
              $error_msg = "Unable to save file";
              $is_error = 1;
            }
            else {
              chmod(UPLOAD_DIR . $name, 0644);
              require_once('assets/Classes/PHPExcel.php');
              if($ext == "xls") {
                $reader = PHPExcel_IOFactory::createReader('Excel5');
              }
              else {
                $reader = PHPExcel_IOFactory::createReader('Excel2007');
              }
              $reader->setReadDataOnly(true);
                     
              $path = UPLOAD_DIR . $name;
              $excel = $reader->load($path);
                     
              $writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
              $writer->save('uploads/data.csv');

              function readCSV($csvFile) {
                $csvfilehandle = fopen($csvFile, 'r');
                while (!feof($csvfilehandle) ) {
                  $line_of_text[] = fgetcsv($csvfilehandle, 1024);
                }
                fclose($csvfilehandle);
                // unlink($csvFile);

                return $line_of_text;
              }
              $csvFile = 'uploads/data.csv';
              $data = readCSV($csvFile);

              // echo json_encode($data);
              // echo "string";

              $quiz_count = 0;
              $test_count = 0;
              $quiz_max = array();
              $test_max = array();
              $student_count = 0;
              $students  = array();
              foreach ($data as $key => $value) {
                if ($value[0] == "QUIZ") {
                  foreach ($value as $key1 => $value1) {
                    if ($value1[0] == "C" and $value1[1] == "O") {
                      $quiz_count++;
                    }
                  }
                }
                if ($value[0] == "TEST") {
                  foreach ($value as $key1 => $value1) {
                    if ($value1[0] == "C" and $value1[1] == "O") {
                      $test_count++;
                    }
                  }
                }
                if ($value[0] == "MAXIMUM MARKS") {
                  $quiz_max = $value;
                }
                if ($value[0] == "MAXIMUM MARKS") {
                  $test_max = $value;
                }
                if ($value[0] != false) {
                  $student_count++;
                }
              }
              $student_count = ($student_count - 5)/2;

              // echo $student_count . "<br><br>";

              for ($i=2; $i < 2+$student_count; $i++) {
                $students[$data[$i][0]]["quiz"] = $data[$i];
              }
              for ($i=2+$student_count+3; $i < 2+$student_count+3+$student_count; $i++) { 
                $students[$data[$i][0]]["test"] = $data[$i];
              }

              $name = 'marks/'. $subject_code . '_' . $test_num . '.txt';
              $myfile = fopen($name, 'w');
              fwrite($myfile, $subject_code . "\n");
              fwrite($myfile, $test_num . "\n");
              foreach ($students as $key => $value) {
                fwrite($myfile, $key . "\n");
                fwrite($myfile, $quiz_count . "\n");
                $i = 0;
                foreach ($value["quiz"] as $key1 => $value1) {
                  if ($i == 0) {
                    $i = 1;
                    continue;
                  }
                  if ($data[1][$i] == "" || $data[1][$i] == null || $data[1][$i] == " ") {
                    break;
                  }
                  fwrite($myfile, $value1 . " " . $data[1][$i] . " " . $data[0][$i] . "\n");
                  $i++;
                }
                fwrite($myfile, $test_count . "\n");
                $i = 0;
                foreach ($value["test"] as $key1 => $value1) {
                  if ($i == 0) {
                    $i = 1;
                    continue;
                  }
                  if ($data[2+$student_count+1][$i] == "" || $data[2+$student_count+1][$i] == null || $data[2+$student_count+1][$i] == " ") {
                    break;
                  }
                  fwrite($myfile, $data[2+$student_count+1][$i] . " " . $value1 . " " . $data[2+$student_count+2][$i] . " " . $data[2+$student_count][$i] . "\n");
                  $i++;
                }
              }
              // echo json_encode($students);
              fclose($myfile);
              unlink($path);

              $is_error = 0;
            }
          }
        }
      }
    }
    if ($is_error == 1) {
      echo '<div class="modal fade" id="student_spreadsheet_added" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
      echo '<h3 class="modal-title" id="myModalLabel">File Upload Failed!</h3>';
      echo '</div>';
      echo '<div class="modal-body">';

      echo '<h4>' . $error_msg . '</h4>';

      echo '</div>';
      echo '<div class="modal-footer">';
      echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    else {
      echo '<div class="modal fade" id="student_spreadsheet_added" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
      echo '<h3 class="modal-title" id="myModalLabel">File Upload Succesful!</h3>';
      echo '</div>';
      echo '<div class="modal-body">';

      echo '<h4>File successfully uploaded. Student data has been stored</h4>';

      echo '</div>';
      echo '<div class="modal-footer">';
      echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  }
?>