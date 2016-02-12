<h1>Stock Movements</h1>
<table>
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

<h1>Stock Transactions</h1>
<table>
  <thead>
    <td>Date - Time</td>
    <td>Player</td>
    <td>Stock</td>
    <td>Transaction</td>
    <td>Quantity</td>
  </thead>
  {stockTrans}
    <tr>
      <td>{DateTime}</td>
      <td>{Player}</td>
      <td>{Stock}</td>
      <td>{Trans}</td>
      <td>{Quantity}</td>
    </tr>
    {/stockTrans}
</table>

