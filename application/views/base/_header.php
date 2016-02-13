<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/home">Stocks Game</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/home">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="/stocks">Stocks</a></li>
        <li><a href="/portfolio">Portfolio</a></li>
      </ul>
      <div class="row">
        <form class="navbar-form navbar-right" role="login">
          <div class="form-group login-input col-xs-10 col-sm-7 col-md-7">
            <select name="playername" class="form-control pull-right">
              {playerList}
              <option value="{Player}">{Player}</option>
              {/playerList}
            </select>
          </div>
          <input type="submit" value="Login" class="btn btn-default col-xs-2 col-sm-5 col-md-5 pull-right">
          <!-- <input type="submit" value="Logout" class="btn btn-default col-xs-2"> -->
        </form>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
