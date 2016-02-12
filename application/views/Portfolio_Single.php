<h1>Recent Transactions</h1>
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

<h1>Current Holdings</h1>
<table>
  <thead>
    <td>Name</td>
    <td>Value</td>
    <td>Quantity</td>
  </thead>
  {currentHoldings}
    <tr>
      <td>{Stock}</td>
      <td>{Cash}</td>
      <td>{Quantity}</td>
    </tr>
    {/currentHoldings}
</table>

