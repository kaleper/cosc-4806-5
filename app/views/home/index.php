<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD**  -->
<style>
  <?php include "app/views/css/home.css"?>
</style>
<link rel="stylesheet" href="app/views/css/home.css"

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <h4 class="greeting">Welcome, <?=$_SESSION['username']?></h1>
                <p id="date"> <span id ="date-label">Today's Date:</span> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>