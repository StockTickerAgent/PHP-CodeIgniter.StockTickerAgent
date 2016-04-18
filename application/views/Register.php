<div class="row">
  <?php
  if (isset($ErrorMessage)) {
  ?>
  <div class="col-md-6 col-md-offset-3">
    <p class="bg-danger">
      <span class="text-danger"><b>{ErrorMessage}</b></span>
    </p>
  </div>
  <?php
  }
  ?>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" method="POST" action="/register" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="confirmPassword" id="password" placeholder="Confirm Password">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile" class="col-sm-2 control-label">Avatar Upload</label>
        <div class="col-sm-10">
            <input type="file" id="exampleInputFile" name="avatar">
            <p class="help-block">Image File: (1000 Max Size)</p>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Register</button>
        </div>
      </div>
    </form>
  </div>
</div>