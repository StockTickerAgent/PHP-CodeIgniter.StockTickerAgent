 <div class="row">
    {ErrorMessage}
    {player}
    <form class="form-horizontal" method="POST" action="/playerManagement/editPlayerProcess" enctype="multipart/form-data">
        <h3>Editing Player: {Player}</h3>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="playerName" value="{Player}">
                <input type="hidden" name="prevPlayerName" value="{Player}">
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
            <label for="exampleInputFile" class="col-sm-2 control-label">Avatar Upload</label>
            <div class="col-sm-10">
                <input type="file" id="exampleInputFile" name="avatar">
                <p class="help-block">Image File: (1000 Max Size)</p>
            </div>
        </div>
        <div class="form-group">
            <label for="roles" class="col-sm-2 control-label">Roles</label>
            <div class="col-sm-10">
                <select name="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="/playerManagement" class="button">Go Back</a>
                <button type="submit" class="btn btn-default">Edit</button>
            </div>
        </div>
    </form>
    {/player}
</div>