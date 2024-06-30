<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Reminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- **ADDRESSES CACHE ISSUE WHERE CSS DOESN'T LOAD** 
     -->
     <style>
      <?php include "app/views/css/update_reminder.css" ?>
    </style>

    <link rel="stylesheet" href="app/views/css/update_reminder.css"
    
    <!-- JS Pluigin -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once 'app/views/templates/navbar.php' ?>
    
    <div class="container main">
        <div class="row mt-4">
            <div class="col-lg-12">
                <p> <a class="link" href="/reminders/index">Back to All Reminders</a></p>
            </div>

            <!-- Form to create a reminder -->
            <div class="form row justify-content-center">
                <div class="col-12 col-sm-10 col-md-9 col-xl-8">
                    <div class="form-container text-center mt-5 mb-3 px-5 py-5">
                        <form action="/reminders/update_reminder" method="post">
                            <h1 class="header h2 fw-normal">Update Reminder</h1>
                            <fieldset class="container mt-4">
                                <div class="form-group mb-1">
                                    <label class="visually-hidden">Reminder</label>
                                    <!--Populates with previous reminder_information, if there is any, to be updated by user. Session variables saved from controller when user initially clicks the update button on a specific reminder -->
                                        <textarea class="form-control" name="update_reminder" required autofocus><?php echo isset($_SESSION['reminder_information']['subject']) ? $_SESSION['reminder_information']['subject'] : ''; ?>
                                        </textarea>
                                    
                                </div>
                                <!-- Save user ID-->
                                 <input type="hidden" name="id" value="<?php echo $_SESSION['reminder_information']['id']; ?>">
                                <div class="button mt-3">
                                    <button type="submit"name="update_reminder_button" class="btn btn-primary">Update</button>
                                </div> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>