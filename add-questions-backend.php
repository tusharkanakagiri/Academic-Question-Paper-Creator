<?php
error_reporting(0);
  session_start();
  if (!isset($_SESSION['logged_in'])) {
      header("Location: login.php");
      session_destroy();
      exit();
  }
?>

<?php
    include "Connections.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
            if(isset($_POST['add-question-submit']))
                {

                	$subject_code=($_POST['subject_code']);
                    $q_chap=($_POST['add_q_chap']);
                    $q_marks=($_POST['add_q_marks']);
                    $q_co=($_POST['add_q_co']);
                    $q_lo=($_POST['add_q_lo']);
                    $q_q=($_POST['add_question']);

                    $servername = "localhost";
                    $username = "project";
                    $password = "project";
                    $dbname = "wp";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                     if (!$conn) {
	                        die("Connection failed: " . mysqli_connect_error());
	                    		 }
	                $sql = "INSERT INTO test (sl,subject,chapter,question,marks,co,lo,used)
							VALUES ('1','$subject_code','$q_chap','$q_q','$q_marks','$q_co','$q_lo','0');";

	                $result = mysqli_query($conn, $sql);

	                
	                mysqli_close($conn);
	            }
	        }

header("Location: add-questions.php"); /* Redirect browser */
exit();

?>

