<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD**  -->
<style>
  <?php include "app/views/css/home.css"?>
</style>
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
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>