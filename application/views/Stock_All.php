<div id="stocks">
  <form method="GET" action="stock/getResult">
  	<select name="stockChoice">
          {stockList}
          <option value="{Name}">{Name}</option>
          {/stockList}
      </select>
      <input type="submit">
  </form>
</div>