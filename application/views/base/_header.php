<div class="row">
  <div class="col-md-8">
    <h1>Stocks Game</h1>
  </div>
  <div class="col-md-4">
    <nav id="main">
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><a href="/home">Home</a></li>
        <li role="presentation"><a href="/stock">Stocks</a></li>
        <li role="presentation"><a href="/portfolio">Portfolio</a></li>
        <li role="presentation">
        <form method="POST" action="">
            <select>
              {playerList}
              <option value="{Player}">{Player}</option>
              {/playerList}
            </select>
            <input type="submit">
        </form>
        </li>
      </ul>
    </nav>
  </div>
</div>