<form method="POST" action="stock/getResult">
	<select name="stockChoice">
        {stockList}
        <option value="{Name}">{Name}</option>
        {/stockList}
    </select>
    <input type="submit">
</form>