<?php
// Include config file
require_once 'config.php';
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Get username from session
session_start();
$username = $_SESSION['username'];
// Attempt select query execution
$sql = "SELECT * FROM icons WHERE username LIKE '$username'";
if($result = mysqli_query($link, $sql)){
  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
      $rows[] = $r;
  }
  print json_encode($rows);
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>
