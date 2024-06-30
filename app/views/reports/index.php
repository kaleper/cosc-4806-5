<?php if ($_SESSION['auth'] != "admin") {
    header('Location: home');
    exit();
  }
?> 
<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD**  -->
<style>
  <?php include "app/views/css/reports.css"?>
</style>
<link rel="stylesheet" href="app/views/css/reports.css"

  <div class="container main">
    <div class="row mt-4 text-center">
        <div class="col-lg-12 ">
            <h4 class="">Reports</h4>      
              <!-- Informs user they have admin priviliges if logged in as admin -->
              <?php
                  if ($_SESSION['auth'] == 'admin') { 
                      echo "
                              <div>
                                  <p class='sm-text'>You can generate reports here. </p>
                              </div> 
                          "
                      ;      
                  } 
              ?> 
        </div>
            <div class="row">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-overview-list" data-bs-toggle="list" href="#list-overview" role="tab" aria-controls="list-overview">Overview</a>
                <a class="list-group-item list-group-item-action" id="list-viewAllReminders-list" data-bs-toggle="list" href="#list-viewAllReminders" role="tab" aria-controls="list-viewAllReminders">View All Reminders</a>
                <a class="list-group-item list-group-item-action" id="list-viewAllLogins-list" data-bs-toggle="list" href="#list-viewAllLogins" role="tab" aria-controls="list-viewAllLogins">View All Logins</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-overview" role="tabpanel" aria-labelledby="list-overview-list">High level overview here</div>
                <div class="tab-pane fade" id="list-viewAllReminders" role="tabpanel" aria-labelledby="list-viewAllReminderss-list">All reminder data</div>
                <div class="tab-pane fade" id="list-viewAllLogins" role="tabpanel" aria-labelledby="list-viewAllLogins-list">All login data</div>
              </div>
            </div>
            </div>
    </div>
  </div>
                      
                      
<?php require_once 'app/views/templates/footer.php'?>