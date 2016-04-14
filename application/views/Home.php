<div id="home">
  <div class="row">
    <div class="col-md-6">
        
      <div class="box-group">
        <h3>Stocks</h3>
        <table class="table table-striped">
          <thead>
          <td>Name</td>
          <td>Value</td>
          </thead>
          {stockList}
          <tr>
            <td><a href="/stocks/{Code}">{Name}</a></td>
            <td>{Value}</td>
          </tr>
          {/stockList}
        </table>
      </div>
      
      <div class="box-group">
        <h3>Recent Transactions</h3>
        <table class="table table-striped">
          <thead>
            <td>Datetime</td>
            <td>Agent</td>
            <td>Player</td>
            <td>Stock</td>
            <td>Transaction</td>
            <td>Quantity</td>
          </thead>
          {transactionList}
          <tr>
            <td>{Datetime}</td>
            <td>{Agent}</td>
            <td>{Player}</td>
            <td>{Stock}</td>
            <td>{Trans}</td>
            <td>{Quantity}</td>
          </tr>
          {/transactionList}
        </table>
      </div>
    </div>

    <div class="col-md-6">
        
      <div class="box-group">
        <h3>Players</h3>
        <table class="table table-striped">
          <thead>
            <td>Avatar</td>
            <td>Player</td>
            <td>Cash</td>
            <td>Equity</td>
          </thead>
          {playerList}
          <tr>
            <td><img class="avatarDashBoard" src="./data/avatar/{Avatar}"></td>
            <td><a href="/portfolio/{Player}">{Player}</a></td>
            <td>{Cash}</td>
            <td>{Equity}</td>
          </tr>
          {/playerList}
        </table>
      </div>
      
      <div class="box-group">
        <h3>Recent Movements</h3>
        <table class="table table-striped">
          <thead>
            <td>Date Time</td>
            <td>Code</td>
            <td>Action</td>
            <td>Value</td>
          </thead>
          {movementsList}
          <tr>
            <td>{Datetime}</td>
            <td>{Code}</td>
            <td>{Action}</td>
            <td>{Amount}</td>
          </tr>
          {/movementsList}
        </table>
      </div>
    </div>
  </div>
</div>