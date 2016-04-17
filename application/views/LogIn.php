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
  <?php
  if ($this->session->flashdata('success')) {
  ?>
  <div class="col-md-6 col-md-offset-3">
    <p class="bg-success">
      <span class="text-success"><b><?php echo $this->session->flashdata('success'); ?></b></span>
    </p>
  </div>
  <?php
  }
  ?>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="form-horizontal" method="POST" action="/login">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Log in</button>
        </div>
      </div>
    </form>
  </div>
</div>