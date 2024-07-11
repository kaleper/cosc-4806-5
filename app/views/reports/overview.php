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

<!-- JS Plugin for bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <p> <a class="link" href="/reports/index">Back to Reports Menu</a></p>
            </div>

            <!-- Will process all reminders from the past 7 days into an array to be used by the chart. -->
            <?php
                if (isset($data['reminders_past_week'])) {

                    // Increment days based on how many reminders were made on the day.
                    $days_of_week = [
                        'Sunday' => 0, 
                        'Monday' => 0, 
                        'Tuesday' => 0, 
                        'Wednesday' => 0, 
                        'Thursday' => 0, 
                        'Friday' => 0, 
                        'Saturday' => 0];
                    foreach (($data['reminders_past_week']) as $reminder) {
                        // Get the day of the week that reminder was created 
                        $day_of_week = date('l', strtotime($reminder['created_at'])); 
                        // Increment counter based on reminder count for the day
                        switch ($day_of_week) {
                            case 'Sunday': 
                                $days_of_week['Sunday']++; 
                                break;
                            case 'Monday': 
                                $days_of_week['Monday']++; 
                                break;
                            case 'Tuesday': 
                                $days_of_week['Tuesday']++; 
                                break;
                            case 'Wednesday': 
                                $days_of_week['Wednesday']++; 
                                break;
                            case 'Thursday': 
                                $days_of_week['Thursday']++; 
                                break;
                            case 'Friday': 
                                $days_of_week['Friday']++; 
                                break;
                            case 'Saturday': 
                                $days_of_week['Saturday']++; 
                                break;

                        }
                    }
                    
                    // Convert the PHP array to a JavaScript array (needed to use data in JS, can't use php array directly)
                    $days_of_week_json = json_encode(array_values($days_of_week));
                }
            ?>
            <!-- Overview text -->
            <div class="form row justify-content-center">
                <div class="col-12 col-sm-10 col-md-9 col-xl-8">
                    <div class="form-container text-center mt-5 mb-3 px-5 py-5">

                        <div>  
                            <!-- Canvas for the chart -->
                          <canvas id="myChart"></canvas>
                        </div>

                    <!--Chart script implementation from CDN -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            // Parse the PHP array in JavaScript
                            const daysOfWeekData = <?php echo $days_of_week_json; ?>;
                            
                            const ctx = document.getElementById('myChart');

                            // Create a chart instance
                            new Chart(ctx, {
                            type: 'bar',
                              options: {
                                  
                              },
                            data: {
                                
                              labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                              datasets: [{
                                label: '# Reminders',
                                // Use array counter data to populate graph
                                data: [daysOfWeekData[0], daysOfWeekData[1], daysOfWeekData[2], daysOfWeekData[3], daysOfWeekData[4], daysOfWeekData[5], daysOfWeekData[6]],
                                borderWidth: 1
                              }]
                            },
                            options: {
                                plugins: {
                                  title: {
                                      display: true,
                                      text: 'Number of Reminders Created Sitewide - Past Week'
                                  }
                                },
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php require_once 'app/views/templates/footer.php'?>