/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 4/17/16
 * Time: 2:08 AM
 */
<h3 class='{flag}' style="text-align: center">{message}</h3>
<hr>
<div class="row">
    <div class="col-md-2">
    </div>
    {currentPlayer}
    <div class="col-md-2">
        <img height="200" width="200" src='{avatar}'>
    </div>
    <div class="col-md-3" style="font-size: xx-large; margin-left: 2em;">
        <div class="row">
Name: <strong>{username}</strong>
        </div>
        <div class="row">
Cash:
        </div>
    </div>
    {/currentPlayer}
    <div class="col-md-3">
        <div class="row stocks" style="margin-top: 0px; text-align: center">
            <h4>GAME STATUS</h4>
            <div class="gameStatus">
                {gameStatus}
                round: {round}<br>
                {message}
                {/gameStatus}
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>

<hr>

<div class="row stock-status">
    <div class="col-md-7">
        <div class="row">
            <h4>Your Current Holdings</h4>
            <table style="width:100%">
                <tr>
                    <th>CODE</th>
                    <th>VALUE</th>
                    <th>SELL</th>
                </tr>
                {holdings}
                <tr>
                    <td>{stock}</td>
                    <td>{quantity}</td>
                    <td>
                        <form action='/games/sell' method="POST">
                            <input type="hidden" name="code" value='{stock}'>
                            <input type="hidden" name="token" value='{token}'>
                            <input type="number" name="quantity" style="width: 3em" min="1">
                            <button type="submit" name="submitButton" class="btn btn-warning" value="submit">Sell</button>
                        </form>
                    </td>
                </tr>
                {/holdings}
            </table>
        </div>
       <div class="row">
           <h4>Active Stocks</h4>
           <table style="width:100%">
               <tr>
                   <th>CODE</th>
                   <th>NAME</th>
                   <th>CATEGORY</th>
                   <th>VALUE</th>
                   <th>BUY</th>
               </tr>
               {stocks}
               <tr>
                   <td>{code}</td>
                   <td>{name}</td>
                   <td>{category}</td>
                   <td>{value}</td>
                   <td>
                       <form action='/games/buy' method="POST">
                           <input type="hidden" name="code" value='{code}'>
                           <input type="number" name="quantity" style="width: 3em" min="1">
                           <button type="submit" name="submitButton" class="btn btn-success" value="submit">Buy</button>
                       </form>
                   </td>
               </tr>
               {/stocks}
           </table>
       </div>
    </div>

    <div class="col-md-5">
        <h4>Market Trend</h4>
        <table style="width:100%">
            <tr>
                <th>seq</th>
                <th>datetime</th>
                <th>code</th>
                <th>action</th>
                <th>amount</th>
            </tr>
            {trend}
            <tr>
                <td>{seq}</td>
                <td>{datetime}</td>
                <td>{code}</td>
                <td>{action}</td>
                <td>{amount}</td>
            </tr>
            {/trend}
        </table>
    </div>
</div>

<script>
$(document).ready(function(){
    setInterval(function(){cache_clear()},20000);
});
    function cache_clear()
    {
        window.location.reload(true);
    }
</script>