 <div class="row">
    {player}
    <form class="form-horizontal" method="POST" action="/playerManagement/deletePlayerProcess">
        <h3>Deleting Player: {Player}</h3>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Player</label>
            <div class="col-sm-10">
                <input type="hidden" name="playerName" value="{Player}">
                <p>{Player}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Cash</label>
            <div class="col-sm-10">
                <!--<input type="password" class="form-control" id="inputPassword3" placeholder="Password">-->
                <p>{Cash}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Equity</label>
            <div class="col-sm-10">
                <p>{Equity}</p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="/playerManagement" class="button">Go Back</a>
                <button type="submit" class="btn btn-default">Delete</button>
            </div>
        </div>
    </form>
    {/player}
</div>