<?php
  if (!isset($_SESSION['auth'])) {
    header('Location: /login');
  }
  // Will not display reports if user is not an admin
  $display_reports_tab = false;

  // Shows admin nav bar if user is an admin
  if ($_SESSION['auth'] == 'admin') {
    $display_reports_tab = true;
  }
    
?>
<head>
  <!DOCTYPE html>
  <html lang="en">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">
        <a class="navbar-brand ms-2 h1" href="/home"> <img src="/app/views/resources/images/logo.svg" width="30" height="30" alt="logo" class ='me-1'>
        Reminders</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reminders">Reminders</a>
          </li>
          <!-- Add reports to navigation bar if user is an admin -->
          <?php 
            if ($display_reports_tab) {
              echo "<li class='nav-item'>
                      <a class='nav-link' href='/reports'>Reports</a>
                    </li>";
            }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>