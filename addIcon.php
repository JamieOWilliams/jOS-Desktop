<?php
// Include config file
require_once 'config.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$header = mysqli_real_escape_string($link, $_REQUEST['header']);
$icon_link = mysqli_real_escape_string($link, $_REQUEST['icon_link']);

//Get username from session
session_start();
$username = $_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // attempt insert query execution
  $sql = "INSERT INTO icons (username, header, icon_link) VALUES ('$username', '$header', '$icon_link')";
  if(mysqli_query($link, $sql)){
      echo "Icon added successfully.";
  } else{
      echo "ERROR: Could not execute $sql. " . mysqli_error($link);
  }
  // close connection
  mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Desktop</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-kit.css" rel="stylesheet"/>
  <!-- <link href="assets/css/main.css" rel="stylesheet"/> -->
  <title>Add Icon</title>
  <style type="text/css">
      body {
        background-color: white;
      }
  </style>
</head>
<body>
<form id="addIconsForm" action="addIcon.php" method="post">
    <p>
        <label for="firstName">Header:<sup>*</sup></label>
        <input type="text" class="form-control" name="header" id="header">
    </p>
    <p>
        <label for="lastName">Link:</label>
        <input type="text" class="form-control" name="icon_link" id="icon_link">
    </p>
    <input type="submit" class="btn btn-primary add-icon" value="Add">
</form>
</body>

</html>
