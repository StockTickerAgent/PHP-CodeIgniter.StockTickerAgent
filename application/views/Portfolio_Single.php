<div class="row">
  <div class="col-md-12">
    <h2>Recent Transactions</h2>
    <table>
      <thead>
        <td>Name</td>
        <td>Value</td>
        <td>Type</td>
        <td>Quantity</td>
      </thead>
      {stocks}
        <tr>
          <td>{Stock}</td>
          <td>{Cash}</td>
          <td>{Trans}</td>
          <td>{Quantity}</td>
        </tr>
      {/stocks}
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h2>Current Holdings</h2>
    <table>
      <thead>
        <td>Name</td>
        <td>Value</td>
        <td>Type</td>
        <td>Quantity</td>
      </thead>
      {currentHoldings}
        <tr>
          <td>{Stock}</td>
          <td>{Cash}</td>
          <td>{Trans}</td>
          <td>{Quantity}</td>
        </tr>
        {/currentHoldings}
    </table>
  </div>
</div>


