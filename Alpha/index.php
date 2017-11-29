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

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/d3/d3.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  </head>
  <body>
    <input type="hidden" id="hdnSession" data-value="@Request.RequestContext.HttpContext.Session["username"]">
    <svg class="background-svg" height='36vh' id="canvas-1" preserveaspectratio="none" viewbox="0 0 100 100" width='100%'>
        <polygon fill="#E9E3E6" fill-opacity="1" id="poly-1" points="0,0 0,0 0,100 60,100"></polygon>
    </svg>
    <svg class="background-svg" height='36vh' id="canvas-2" preserveaspectratio="none" viewbox="0 0 100 100" width='100%'>
        <polygon fill="#B2B2B2" fill-opacity="1" id="poly-2" points="100,0 100,0 100,100 40,100"></polygon>
    </svg>
    <h1 class="display-1 text-center username-display" style="position: absolute; left: 0; right: 0;">Hi, <?php echo $_SESSION['username']; ?></h1>
    <script src="js/clock.js" type="text/javascript"></script>
    <div class="sidebar">
      <img src="img/profile/profile.png" class="sidebar-icon profile-icon img-fluid d-block mx-auto" data-toggle="tooltip" data-placement="right" title="Login/Sign Up">
      <img src="img/sidebar/settings.svg" class="sidebar-icon settings-icon img-fluid d-block mx-auto up-1" data-toggle="tooltip" data-placement="right" title="Settings">
      <img src="img/sidebar/colour.svg" class="sidebar-icon colour-icon img-fluid d-block mx-auto" data-toggle="tooltip" data-placement="right" title="Randomise colour scheme!">
      <img src="img/sidebar/edit.png" class="sidebar-icon edit-icon img-fluid d-block mx-auto up-2" data-toggle="tooltip" data-placement="right" title="Edit icons">
      <img src="img/sidebar/add.png" class="sidebar-icon add-icon img-fluid d-block mx-auto up-3" data-toggle="tooltip" data-placement="right" title="Add icon">
    </div>
    <div class="modal" id="user-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Profile Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <form action="logout.php" method="get">
              <input type="submit" class="btn btn-primary" value="Sign Out" >
            </form>
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="add-icon-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Icon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height: 375px;">
            <iframe src="icon.php" height="100%" width="100%" seamless='seamless' frameBorder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="settings-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="edit-modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Icon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Icon name</label>
                <input type="email" class="form-control" id="iconName" aria-describedby="emailHelp" placeholder="Icon name...">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Link</label>
                <input type="password" class="form-control" id="iconLink" placeholder="Icon link...">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image link</label>
                <input type="password" class="form-control" id="iconImgLink" placeholder="Icon image link...">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary icon-save">Save changes</button>
            <button type="button" class="btn btn-primary icon-add">Add</button>
            <button type="button" class="btn btn-secondary icon-close" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="icon-container"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/colour.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/edit-icons.js"></script>
    <script src="js/user.js"></script>
    <script src="js/update.js"></script>
  </body>
</html>
