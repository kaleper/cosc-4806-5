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
            <h3 class="h3">Reports</h3>      
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
            <div class="row justify-content-center">
              <div class="col-6">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" href="/reports/overview">Overview</a>
                    <a class="list-group-item list-group-item-action" href="/reports/viewReminders">View All Reminders</a>
                    <a class="list-group-item list-group-item-action" href="/reports/viewLogins">View All Logins</a>
                </div>
              </div>
            
            </div>
    </div>
  </div>
  
                      
                      
<?php require_once 'app/views/templates/footer.php'?>