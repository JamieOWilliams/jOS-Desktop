<?php
//Old bootstrap login form
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

//Old bootstrap register formValid<form>
  <label id="inputWarningEmpty" style="color: red;">A field is empty</label><br>
  <label id="inputWarningPassword" style="color: red;">Passwords do not match</label>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="name" class="form-control" id="inputName" aria-describedby="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="inputPasswordConfirm">Confirm password</label>
    <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirm password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      I accept the terms and conditions.
    </label>
  </div>
  <button id="signup-submit"  data-backdrop="static" type="submit" class="btn btn-primary">Submit</button>
</form>

?>

<!-- Temp CSS  -->

.icon {

  border-radius: 10%;
  text-decoration: none;
}

.icon-anchor {
  text-decoration: none;
  border: none;
}

.icon:hover {
  transition: all 0.25s;
  background-color: rgba(240,240,240, 1);
  border: none;
}

.icon .icon-img {
  width: 64px;
  height: 64px;
  margin: 0 auto;
  display: inline-block;
  transition: all 0.2s;
}

.icon .icon-heading {
  color: white;
  margin: 0 auto 10px;
  text-align: center;
  text-decoration: none;
}

.icon-placeholder {
  color: black;
  text-decoration: none;
  background-color: rgba(240,240,240, 0.8);
  padding: 15px;
  border-radius: 50%;
  border-bottom: 0;
  display: inline-block;
  margin: 0 auto;
  text-align: center;
}

.icon .icon-heading-container .form-control {
  width: 100px;
  margin-top: 10px;
}

iconHTML += '<img class="icon-img img-fluid d-block center" src="img/icons/reddit-icon.png">';
