<ul class="nav navbar-nav">
  <li class="<?php echo active_link('home'); ?>">
    <a href="/home">Home</a>
  </li>
  <li class="<?php echo active_link('Stock'); ?>">
    <a href="/stocks">Stocks</a>
  </li>
  <li class="<?php echo active_link('Portfolio'); ?>">
    <a href="/portfolio/{id}">Portfolio</a>
  </li>
</ul>
<div class="row">
  <div class="navbar-right">
    <p class="navbar-text">
      Logged in as (Guest) {username} - <a href="/logout">Logout</a>
    </p>
  </div>
</div>

