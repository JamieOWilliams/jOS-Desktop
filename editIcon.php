<?php
// Include config file
require_once 'config.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$id = $_POST['id'];
$newHeader = $_POST['header'];
$newIcon_link = $_POST['link'];

//Get username from session
session_start();
$username = $_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // attempt insert query execution
  $sql = "UPDATE `icons` SET `header`='$newHeader',`icon_link`='$newIcon_link' WHERE id LIKE '$id'";
  if(mysqli_query($link, $sql)){
      echo "Icon changed successfully.";
  } else{
      echo "ERROR: Could not execute $sql. " . mysqli_error($link);
  }
  // close connection
  mysqli_close($link);
}
?>
