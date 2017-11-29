<?php
//Initialise variables
$header = $link = "";
$header_err = $link_err = "";
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Desktop</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="logo.png">
  <!-- <link rel="icon" href="logo.ico" type="image/x-icon" /> -->
	<!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/material-kit.css" rel="stylesheet"/>
  <link href="assets/css/main.css" rel="stylesheet"/>
</head>

<body>
<p class="name-display lead">Welcome, <?php echo $_SESSION['username'] ?></p>
<!-- Navbar will come here -->
<nav class="navbar navbar-default navbar-transparent" role="navigation">
	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<!-- <a class="navbar-brand" href="#">jOS</a> -->
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<ul class="nav navbar-nav">
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons navIcons">settings</i>Settings <b class="caret"></b></a>
        			<ul class="dropdown-menu">
					  <li><a href="#" data-toggle="modal" data-target="#addIconModal"><i class="material-icons navIcons">add_box</i>Add</a></li>
            <li><a id="edit-icons"><i class="material-icons navIcons">mode_edit</i>Edit</a></li>
					  <li class="divider"></li>
					  <li><a href="#"><i class="material-icons navIcons">person</i>Profile Settings</a></li>
					  <li class="divider"></li>
				      <li><a href="logout.php"><i class="material-icons navIcons">exit_to_app</i>Logout</a></li>
        			</ul>
        		</li>
    		</ul>
    	</div>
	</div>
</nav>
<!-- end navbar -->

<div class="wrapper">
	<!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
	<div class="main">
		<!-- <div class="container"> -->

			<!-- here you can add your content -->
      <div id="iconCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

        </div>
        <ol class="carousel-indicators">
        </ol>
        <a class="carousel-control-prev" href="#iconCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#iconCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

		</div>
	<!-- </div> -->
</div>

<!-- Add Icon Modal -->
<div class="modal fade" id="addIconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add an icon</h4>
      </div>
      <div class="modal-body" style="height: 250px;">
        <iframe src="addIcon.php" height="100%" width="100%" seamless='seamless' frameBorder="0" scrolling="no"></iframe>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editIconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit an icon</h4>
      </div>
      <div class="modal-body">
        <form> <!--action="editIcon.php" method="post"-->
            <p>
                <label for="firstName">Header:<sup>*</sup></label>
                <input type="text" class="form-control" name="header" id="editHeader">
            </p>
            <p>
                <label for="lastName">Link:</label>
                <input type="text" class="form-control" name="icon_link" id="editIcon_link">
            </p>
            <input class="btn btn-primary editSave-icon" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
  <!-- jOS JS Files -->
  <script src="assets/js/update.js"></script>
  <!-- <script src="assets/js/editIcon.js"></script> -->
</html>
