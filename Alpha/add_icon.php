<?php

?>
<!DOCTYPE html>

<form action="add_icon.php" method="get">
  <div class="form-group">
      <label>Header:<sup>*</sup></label>
      <input type="text" name="username"class="form-control" value="">
      <span class="help-block"><?php echo $header_err; ?></span>
  </div>
  <div class="form-group">
      <label>Link:<sup>*</sup></label>
      <input type="text" name="username"class="form-control" value="">
      <span class="help-block"><?php echo $link_err; ?></span>
  </div>
</form>
