<div class="row">
  <div class="col-md-5">
    <h4><a href="/home">Stocks Game</a></h4>
  </div>
  <div class="col-md-4">
    <nav id="main">
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><a href="/home">Home</a></li>
        <li role="presentation"><a href="/stock">Stocks</a></li>
        <li role="presentation"><a href="/portfolio">Portfolio</a></li>
        <li role="presentation"></li>
      </ul>
    </nav>
  </div>
  <div class="col-md-3">
    <form id="login" class="form-inline" method="POST" action="/login">
      <div class="form-group">
        <select name="playername" class="form-control">
          {playerList}
          <option value="{Player}">{Player}</option>
          {/playerList}
        </select>
      </div>
      <input type="submit" value="Login" class="btn btn-default">
    </form>
  </div>
</div>