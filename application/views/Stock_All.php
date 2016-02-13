<div id="stocks">
    <div class="col-md-2 col-sm-4 col-xs-3">
      <form method="GET" action="stocks/getResult" class="form-inline">
        <select name="stockChoice" class="form-control">
              {stockList}
              <option value="{Name}">{Name}</option>
              {/stockList}
          </select>
          <input type="submit" value="Change" class="btn btn-default">
      </form>
    </div>
</div>