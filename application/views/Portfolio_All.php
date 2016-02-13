<div id="portfolio">
  <h1>Pick A Player</h1>
  <form method="GET" action="portfolio/getResult">
    <select name="playerChoice">
      {playerList}
      <option value="{Player}">{Player}</option>
      {/playerList}
    </select>
    <input type="submit">
  </form>
</div>



