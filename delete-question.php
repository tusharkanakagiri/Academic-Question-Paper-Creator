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
            if(isset($_POST['delete-question-submit']))
                {

                	$subject_code=($_POST['del_subject_code']);
                    
                    $q_q=($_POST['del_question']);

                    $servername = "localhost";
                    $username = "project";
                    $password = "project";
                    $dbname = "wp";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                     if (!$conn) {
	                        die("Connection failed: " . mysqli_connect_error());
	                    		 }
	                $sql = "DELETE FROM test 
                          WHERE question='$q_q' AND subject='$subject_code'";
                          

	                $result = mysqli_query($conn, $sql);

	                
	                mysqli_close($conn);
	            }
	        }

header("Location: add-questions.php"); /* Redirect browser */
exit();

?>

