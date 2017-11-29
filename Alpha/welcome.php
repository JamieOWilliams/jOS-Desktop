<?php
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
    <script src="https://d3js.org/d3.v4.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script charset="utf-8" src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </head>
  <body>
    <svg class="background-svg" height='36vh' id="canvas-1" preserveaspectratio="none" viewbox="0 0 100 100" width='100%'>
        <polygon fill="#E9E3E6" fill-opacity="1" id="poly-1" points="0,0 0,0 0,100 60,100"></polygon>
    </svg>
    <svg class="background-svg" height='36vh' id="canvas-2" preserveaspectratio="none" viewbox="0 0 100 100" width='100%'>
        <polygon fill="#B2B2B2" fill-opacity="1" id="poly-2" points="100,0 100,0 100,100 40,100"></polygon>
    </svg>
    <h1 class="display-1 text-center" style="position: absolute; left: 0; right: 0;">Hi, <b><?php echo $_SESSION['username']; ?></b>.</h1>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    <script type="text/javascript" src="js/clock.js"></script>
    <div class="sidebar">
      <img src="img/profile/profile.png" class="sidebar-icon profile-icon img-fluid d-block mx-auto" data-toggle="tooltip" data-placement="right" title="Login/Sign Up">
      <img src="img/sidebar/settings.svg" class="sidebar-icon settings-icon img-fluid d-block mx-auto" data-toggle="tooltip" data-placement="right" title="Settings">
      <img src="img/sidebar/colour.svg" class="sidebar-icon colour-icon img-fluid d-block mx-auto up-2" data-toggle="tooltip" data-placement="right" title="Randomise colour scheme!">
      <img src="img/sidebar/edit.png" class="sidebar-icon edit-icon img-fluid d-block mx-auto up-1" data-toggle="tooltip" data-placement="right" title="Edit icons">
    </div>
    <div class="modal" id="user-modal"  data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title">Login or Signup</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Login
                    </a>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <?php inlcude 'includes/login.php' ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Signup
                    </a>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <?php inlcude 'includes/register.php' ?>
                  </div>
                </div>
              </div>
            </div>
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
            <button type="button" class="btn btn-secondary icon-close" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="icon-container">
      <div class="icon mb-1" id="0">
        <img class="icon-img img-fluid d-block center" src="img/icons/reddit-icon.png">
        <div class="icon-heading-container" id="icon-0">
          <p class="lead icon-heading text-center">Reddit</p>
        </div>
      </div>
      <div class="icon mb-1" id="1">
        <img class="icon-img img-fluid d-block center" src="img/icons/facebook-icon.svg">
        <div class="icon-heading-container" id="icon-1">
          <p class="lead icon-heading text-center">Facebook</p>
        </div>
      </div>
      <div class="icon mb-1" id="2">
        <img class="icon-img img-fluid d-block center" src="img/icons/twitter-icon.png">
        <div class="icon-heading-container" id="icon-2">
          <p class="lead icon-heading text-center">Twitter</p>
        </div>
      </div>
      <div class="icon mb-1" id="3">
        <img class="icon-img img-fluid d-block center" src="img/icons/youtube-icon.png">
        <div class="icon-heading-container" id="icon-3">
          <p class="lead icon-heading text-center">YouTube</p>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/colour.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/edit-icons.js"></script>
    <script src="js/user.js"></script>
  </body>
</html>
