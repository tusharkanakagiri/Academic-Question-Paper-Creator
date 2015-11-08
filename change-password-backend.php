<?php
error_reporting(0);
  require_once("Connections.php");
  $A = new Db_Connect();
  session_start();

  $oldpass  = $_POST['oldpass'];
  $newpass  = $_POST['newpass'];
  $conpass  = $_POST['conpass'];
  
  $sql = "select * from login where username='" . $_SESSION['username'] . "' and password='" . $oldpass . "';";
  $var = $A->writeQuery($sql);
  $count = 0;
  $user_data = "";
  while($row = mysqli_fetch_array($var)) {
    $user_data = $row;
    $count = $count+1;
  }

  if ($count == 0 || $newpass == $oldpass || $newpass != $conpass ) {
    echo json_encode("0");
  }
  else {
    $sql = 'DELETE FROM login WHERE username= "'. $_SESSION['username'].'";';
    $A->writeQuery($sql);
    $sql = 'INSERT INTO login VALUES ("'.$_SESSION['username'].'", "'.$newpass.'", "'.$_SESSION['firstname'].'", "'.$_SESSION['lastname'].'", "'.$_SESSION['profile'].'");';
    $A->writeQuery($sql);

    echo json_encode("1");
  }
?>