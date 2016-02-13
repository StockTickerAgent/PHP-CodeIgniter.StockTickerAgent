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
                        <td><a href="/stocks/{Name}">{Name}</a></td>
                        <td>{Value}</td>
                    </tr>
                    {/stockList}
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box-group">
                <h3>Players</h3>
                <table class="table table-striped">
                    <thead>
                    <td>Player</td>
                    <td>Cash</td>
                    <td>Equity</td>
                    </thead>
                    {playerList}
                    <tr>
                        <td><a href="/portfolio/{Player}">{Player}</a></td>
                        <td>{Cash}</td>
                        <td>{Equity}</td>
                    </tr>
                    {/playerList}
                </table>
            </div>
        </div>
    </div>
</div>