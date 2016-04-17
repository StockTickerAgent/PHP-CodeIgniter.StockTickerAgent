<div id="portfolio">
  <div class="row">
    <div class="col-sm-4 pull-right">
      <form method="GET" id="user-select" action="/portfolio/getResult" class="form-inline pull-right">
        <select name="playerChoice" class="form-control">
            {playerList}
                <option value="{id}">{Player}</option>
            {/playerList}
        </select>
          <input type="submit" value="Change" class="btn btn-default">
      </form>
    </div>
    <div class="col-sm-8">
      <h2><b>{name}</b></h2>
      <p class="lead">Current Cash: {cash} <small>(Assuming the players database Cash value is the final amount after all the transactions)</small></p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box-group">
        <h3>Recent Transactions</h3>
        <table class="table table-striped">
          <thead>
            <td>Name</td>
            <td>Value</td>
            <td>Type</td>
            <td>Quantity</td>
          </thead>
          {stocks}
            <tr>
              <td><a href="/stocks/{Stock}">{Stock}</a></td>
              <td>{Cash}</td>
              <td>{Trans}</td>
              <td>{Quantity}</td>
            </tr>
          {/stocks}
        </table>
      </div><!-- .box-group -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box-group">
        <h3>Current Holdings</h3>
        <table class="table table-striped">
          <thead>
            <td>Name</td>
            <td>Quantity</td>
          </thead>
          {currentHoldings}
            <tr>
              <td><a href="/stocks/{Stock}">{Stock}</a></td>
              <td>{Quantity}</td>
            </tr>
            {/currentHoldings}
        </table>
      </div>
    </div>
  </div>
</div>


