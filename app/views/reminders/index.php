<?php require_once 'app/views/templates/header.php'?>
    
<!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD**  -->
<style>
  <?php include "app/views/css/reminders.css"?>
</style>
<link rel="stylesheet" href="app/views/css/reminders.css"
    
<!-- JS Pluigin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php
    if (isset($_SESSION['successful_reminder'])) {
        echo 
            "<div class='container main text-center'>" .
                "<div class='col-lg-12 mt-5'>" .
                    "<h3 class = 'text-success'>" . $_SESSION['successful_reminder'] . "</p>" .
                "</div>" .
            "</div>"
            ;
        unset($_SESSION['successful_reminder']);
    } else if (isset($_SESSION['successful_deletion']) && $_SESSION['successful_deletion']) {
        echo
            "<div class='container main text-center'>" .
                "<div class='col-lg-12 mt-5'>" .
                    "<h3 class = 'text-success'> Reminder deleted successfully!</p>" .
                "</div>" .
            "</div>"
            ;
        unset($_SESSION['successful_deletion']);
    }
?>

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <h3 class="reminders text-center">Reminders</h3>
                <p class="new-reminder-link text-center"> <a class="link " href="/reminders/create_reminder">Create a new reminder</a></p>
            </div>
        </div>
    </div>
</body>

   
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12">
                
                <?php

                    // Creates a table of reminders if there are reminders associate with the user 
                    if (!$data['reminders']) {
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
                                         <th> Date Created </th>
                                         <th> Completed? </th>
                                         <th colspan='2'> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>";
                    }
                    
                    foreach ($data['reminders'] as $reminder) {
                        echo "<tr class= 'text-center'>" .
                                "<td>" . $reminder['subject'] . "</td>" .
                                "<td>" . (new DateTime($reminder['created_at']))->format('M d, Y \a\t h:iA') . "</td>" .
                                    // If reminder is completed, display checkmark
                                    "<td>" .
                                        "<form action='/reminders/complete_reminder' method='post'>" .
                                            "<input type='hidden' name='id' value='" . $reminder['id'] . "'>" .
                                            "<input type='checkbox' name='completed' " . ($reminder['completed'] ? 'checked' : '') . " onchange='this.form.submit()'>" .
                                        "</form>" .
                                    "<td class='text-end'>" . 
                                        "<form action='/reminders/update_reminder' method='post'>
                                            <input type='hidden' name='id' value='" . $reminder['id'] . "'>
                                            <button type='submit' class='btn btn-success'>Update</button>
                                        </form>" .  
                                    "</td>" .
                                    "<td class='text-start'>" .    
                                        "<form action='/reminders/delete_reminder' method='post'>
                                            <input type='hidden' name='id' value='" . $reminder['id'] . "'>
                                            <button type='submit' class='btn btn-danger'>Delete</button>
                                        </form>"  . 
                                    "</td>" .
                             "</tr>";
                    }
                    echo "</tbody></table>";
                ?>
            </div>
        </div>
    </div>

<?php require_once 'app/views/templates/footer.php'?>