<?php if ($_SESSION['auth'] != "admin") {
    header('Location: home');
    exit();
  }
?> 

<?php require_once 'app/views/templates/header.php'?>

<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD** -->
<style>
  <?php include "app/views/css/report_view_reminders.css" ?>
</style>

<link rel="stylesheet" href="app/views/css/report_view_reminders.css"

<!-- JS Pluigin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <p> <a class="link" href="/reports/index">Back to Reports Menu</a></p>
            </div>

            <!-- Form to create a reminder -->
            <div class="form row justify-content-center">
                <div class="col-12 col-sm-10 col-md-9 col-xl-8">
                    <div class="form-container text-center mt-5 mb-3 px-5 py-5">

                            
                                          <div>
                                              <h2 class='sm-text'>View Reminders By All Users </p>
                                          </div> 
                                
                            
                            
                        <?php

                            // Creates a table of reminders if there are reminders associate with the user 
                            if (!$data['reports']) {
                                echo
                                "<div class='container text-center'>" .
                                    "<div class='row mt-4'>" .
                                        "<div class='col-lg-12'>"  .
                                            "<h3 class='text'>" .
                                                "No reminders found." .
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
                                                 <th> Reminder </th>
                                                 <th> User ID </th>
                                                 <th> Date Created </th>
                                                 <th> Completed? </th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                            }

                            foreach ($data['reports'] as $report) {
                                echo "<tr class= 'text-center'>" .
                                        "<td>" . $report['subject'] . "</td>" .
                                        "<td>" . $report['user_id'] . "</td>" .
                                        "<td>" . (new DateTime($report['created_at']))->format('M d, Y \a\t h:iA') . "</td>" .
                                            // If reminder is completed, display checkmark
                                            "<td>" .
                                                    "<input type='hidden' name='id' value='" . $report['id'] . "'>" .
                                                    "<input type='checkbox' name='completed'" . ($report['completed'] ? ' checked' : '') . " disabled>" .

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