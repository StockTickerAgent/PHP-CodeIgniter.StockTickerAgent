<div class="row">
  <div class="col-md-6">
    <h1>Stocks Game</h1>
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
  <div class="col-md-2">
    <form method="POST" action="/login">
      <select name="playername">
        {playerList}
        <option value="{Player}">{Player}</option>
        {/playerList}
      </select>
      <input type="submit">
    </form>
  </div>
</div>