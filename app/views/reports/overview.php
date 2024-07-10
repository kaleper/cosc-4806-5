<?php if ($_SESSION['auth'] != "admin") {
    header('Location: home');
    exit();
  }
?> 

<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD** -->
<style>
  <?php include "app/views/css/report_overview.css" ?>
</style>

<link rel="stylesheet" href="app/views/css/report_overview.css"

<!-- JS Pluigin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <p> <a class="link" href="/reports/index">Back to Reports Menu</a></p>
            </div>

            <!-- Overview text -->
            <div class="form row justify-content-center">
                <div class="col-12 col-sm-10 col-md-9 col-xl-8">
                    <div class="form-container text-center mt-5 mb-3 px-5 py-5">

                        <p> Chart to be implemented!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>