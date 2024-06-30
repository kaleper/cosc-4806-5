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
          <div class="row mt-4">
              <div class="col-lg-12">
                  <h4 class="greeting">Reports</h4>      
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
          </div>
      </div>
  </body>




<?php require_once 'app/views/templates/footer.php'?>