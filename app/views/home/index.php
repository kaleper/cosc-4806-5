<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD**  -->
<style>
  <?php include "app/views/css/home.css"?>
</style>
<script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
      })
    }
</script>
<link rel="stylesheet" href="app/views/css/home.css"
    
    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3 class="greeting text-center">Welcome, <?= $_SESSION['username'] ?> </h3>      

                    <!-- Informs user they have admin priviliges if logged in as admin -->
                    <?php
                        if ($_SESSION['auth'] == 'admin') { 
                            echo "
                                    <div>
                                        <p class='sm-text text-center'>You have administrator privileges. </p>
                                    </div> 
                                "
                            ;      
                        } 
                    ?> 
                <p id="date" class= "text-center"> <span id ="date-label ">Today's Date:</span> <?= date("F jS, Y"); ?></p>

                <div class="row justify-content-center">
                    <div id="carousel" class="carousel carousel-dark slide" style="max-width: 800px;">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="app/views/resources/images/sticky_note.jpg" class="d-block w-100" alt="Sticky Note">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Set Reminders</h5>
                            <p>Forgetting things? Add reminders to keep your life organized.</p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="app/views/resources/images/eraser.jpg" class="d-block w-100" alt="Eraser">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Update and Delete Reminders</h5>
                            <p>Make changes to reminders, check reminders off, and delete them as you finish tasks</p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="app/views/resources/images/reports.jpg" class="d-block w-100" alt="Reports">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>View Reports</h5>
                            <p>As an administrator of this site, view all reminders and login history of users.</p>
                          </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>