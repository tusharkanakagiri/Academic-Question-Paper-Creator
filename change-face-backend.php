<?php
error_reporting(0);
  function changeProfilePicture($PIC_FILE_DATA) {
    require_once("Connections.php");
    $A = new Db_Connect();
    session_start();
    
    $info = pathinfo($PIC_FILE_DATA['facefile']['name']);
    $ext = $info['extension']; // get the extension of the file

    $allowedExts = array('jpg','jpeg','png','bmp','tif');
    $temp = explode(".", $PIC_FILE_DATA["facefile"]["name"]);
    $extension = end($temp);
    
    if(in_array($extension, $allowedExts)==false) {
      return 0;
    }
    else {
      $newname = $_SESSION['username'].'.'.$ext;
      $target = 'assets/img/'.$newname;
      $_SESSION['profile'] = $target;
      if( move_uploaded_file( $PIC_FILE_DATA['facefile']['tmp_name'], $target ) ) {}
      else echo "Failed to upload file.<br>";

      $qree = 'Update login set profile = "'.$target.'" where username = "'.$_SESSION["username"].'";';
      $A->writeQuery($qree);

      return 1;
    }
  }
  function showProfilePicChangeStatusModal($is_success) {
    if ($is_success == 0) {
      echo '<div class="modal fade" id="profile_pic_updated" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
      echo '<h3 class="modal-title" id="myModalLabel">Failed!</h3>';
      echo '</div>';
      echo '<div class="modal-body">';

      echo '<h4>Invalid File Uploaded. Please Select an Image File</h4>';

      echo '</div>';
      echo '<div class="modal-footer">';
      echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    else {
      echo '<div class="modal fade" id="profile_pic_updated" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show>';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
      echo '<h3 class="modal-title" id="myModalLabel">Success!</h3>';
      echo '</div>';
      echo '<div class="modal-body">';

      echo '<h4>Profile Picture Successfully Updated</h4>';

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