<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{pagetitle}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
</head>
<body>
  <div class="container">
    <header>
      {header}
    </header>

    <section>
      {content}
    </section>

    <footer>
      {footer}
    </footer>
  </div>

  <script src="/js/jquery-2.2.0.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>
