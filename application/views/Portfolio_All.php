<div id="portfolio">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Choose a Portfolio</h3>
      <p class="lead">Please select a player from the list provided below to view their stock portfolio.</p>
        <div class="box-group">
          <table id="player-list" class="table table-striped">
              <thead>
              <td>Player's Name</td>
              <td>Cash</td>
              <td>Equity</td>
              </thead>
              {playerList}
              <tr>
                  <td><a href="/portfolio/{id}">{Player}</a></td>
                  <td>{Cash}</td>
                  <td>{Equity}</td>
              </tr>
              {/playerList}
          </table>
        </div>
    </div>
  </div>
</div>



