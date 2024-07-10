<?php if ($_SESSION['auth'] != "admin") {
    header('Location: home');
    exit();
  }
?> 

<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD** -->
<style>
  <?php include "app/views/css/report_view_logins.css" ?>
</style>

<link rel="stylesheet" href="app/views/css/report_view_logins.css"

<!-- JS Pluigin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                
                <p> <a class="link" href="/reports/index">Back to Reports Menu</a></p>
                <h3 class="h3 text-center">View Logins By All Users</h3>  
            </div>

            <!-- Form to view logins -->
            <div class="form row justify-content-center">
                <div class="col-12 col-sm-10 col-md-9 col-xl-8">
                    <div class="form-container text-center mt-5 mb-3 px-5 py-5">

                        <?php

                            // Creates a table of reminders if there are reminders associate with the user 
                            if (!$data['logins']) {
                                echo
                                "<div class='container text-center'>" .
                                    "<div class='row mt-4'>" .
                                        "<div class='col-lg-12'>"  .
                                            "<h3 class='text'>" .
                                                "No logins found." .
                                            "</h3 text>" .
                                        "</div>" .
                                    "</div>" .
                                "</div>"
                                ;

                            } else {
                                // Create table header
                                echo "<table class= 'table table-striped table-hover'>
                                        <thead>
                                            <tr class= 'table-dark text-center'>
                                                 <th> Attempt ID </th>
                                                 <th> User name </th>
                                                 <th> Time </th>
                                                 <th> Successful Attempt? </th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                            }

                            foreach ($data['logins'] as $logins) {
                                echo "<tr class= 'text-center'>" .
                                        "<td>" . $logins['attempt_id'] . "</td>" .
                                        "<td>" . $logins['username'] . "</td>" .
                                        "<td>" . (new DateTime($logins['time']))->format('M d, Y \a\t h:iA') . "</td>" .
                                        "<td>" . $logins['successful_attempt'] . 

                                     "</tr>";
                            }
                            echo "</tbody></table>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>