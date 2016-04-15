<div id="stocks">
  <div class="row">
    <div class="col-sm-4 pull-right">
      <form method="GET" id="stock-select" action="stocks/getResult" class="form-inline pull-right">
        <select name="stockChoice" class="form-control">
          {stockList}
          <option value="{Name}">{Name}</option>
          {/stockList}
        </select>
        <input type="submit" value="Change" class="btn btn-default">
      </form>
    </div>
    <div class="col-sm-8">
      <h2><b>{title}</b></h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box-group">
        <h3>Stock Movements</h3>
        <table class="table table-striped">
          <thead>
            <td>Date - Time</td>
            <td>Code</td>
            <td>Action</td>
            <td>Amount</td>
          </thead>
          {stockMovements}
            <tr>
              <td>{Datetime}</td>
              <td>{Code}</td>
              <td>{Action}</td>
              <td>{Amount}</td>
            </tr>
          {/stockMovements}
        </table>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box-group">
        <h3>Stock Transactions</h3>
        <table class="table table-striped">
          <thead>
            <td>Date - Time</td>
            <td>Player's Name</td>
            <td>Stock</td>
            <td>Transaction</td>
            <td>Quantity</td>
          </thead>
          {stockTrans}
            <tr>
              <td>{DateTime}</td>
              <td><a href="/portfolio/{Player}">{Player}</a></td>
              <td>{Stock}</td>
              <td>{Trans}</td>
              <td>{Quantity}</td>
            </tr>
          {/stockTrans}
        </table>
      </div>
    </div>
  </div>
</div>

