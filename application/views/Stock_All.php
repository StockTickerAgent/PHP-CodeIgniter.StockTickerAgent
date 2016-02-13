<div id="stocks">
  <h1>Pick A Stock</h1>
  <form method="GET" action="stocks/getResult">
    <select name="stockChoice">
      {stockList}
      <option value="{Name}">{Name}</option>
      {/stockList}
    </select>
    <input type="submit">
  </form>
</div>