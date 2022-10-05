<?php
include("config.php");

if (array_key_exists('delete_file', $_POST)) {
    $filename = $_POST['delete_file'];
    if (file_exists($filename)) {
      unlink($filename);
      if(isset($_POST['id'])){
        header("Location: show_profile.php?id=".$_POST['id']."\\");
      } 
      else header("Location: ./show_profile.php");
    } else {
      echo 'Could not delete '.$filename.', file does not exist';
    }
  }
include("config.php");
  session_start();

  $stmt = $con->prepare("DELETE FROM images WHERE url=?");
    $stmt->bind_param("s", $filename);
    if ($stmt->execute()) {
        $stmt->close();
    }
    else error404($con);

  $stmt = $con->prepare("DELETE FROM do_like WHERE url NOT IN (SELECT url FROM images)");
  if ($stmt->execute()) {
      $stmt->close();
  }
  else error404($con);

  include("tot_like.php");
?>