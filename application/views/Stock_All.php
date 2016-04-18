<div class="row">
    <div class="col-md-12">
      <div class="box-group">
        <h3>Stocks</h3>
        <table class="table table-striped">
          <thead>
            <td>Code</td>
            <td>Name</td>
            <td>Value</td>
          </thead>
          {stockList}
          <tr>
            <td>{Code}</td>
            <td><a href="/stocks/{Code}">{Name}</a></td>
            <td>{Value}</td>
          </tr>
          {/stockList}
        </table>
      </div>
    </div>
</div>