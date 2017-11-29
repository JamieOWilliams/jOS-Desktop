<?php
// Include config file
require_once 'config.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id = $_POST["id"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // attempt insert query execution
  $sql = "DELETE FROM icons WHERE id LIKE '$id'";
  if(mysqli_query($link, $sql)){
      // echo "Icon deleted successfully.";
  } else{
      echo "ERROR: Could not execute $sql. " . mysqli_error($link);
  }
}
?>
