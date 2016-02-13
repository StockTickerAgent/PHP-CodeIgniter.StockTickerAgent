<div id="home">	
    <div class="row">
        <div class="col-md-12">
            <h2>Stocks</h2>
            <table>
                <thead>
                <td>Name</td>
                <td>Value</td>
                </thead>
                {stockList}
                <tr>
                    <td><a href="/stock/getResult?stockChoice={Name}">{Name}</a></td>
                    <td>{Value}</td>
                </tr>
                {/stockList}
            </table>
        </div>
  	 </div>
       
    <div class="row">
        <div class="col-md-12">
            <h2>Players</h2>
            <table>
                <thead>
                <td>Player</td>
                <td>Cash</td>
                </thead>
                {playerList}
                <tr>
                    <td><a href="/portfolio/{Player}">{Player}</a></td>
                    <td>{Cash}</td>
                </tr>
                {/playerList}
            </table>
        </div>
  	 </div>
       
        