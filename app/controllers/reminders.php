<?php

class Reminders extends Controller {

    public function index() {		
      $reminder = $this->model('Reminder');
      $list_of_reminders = $reminder->get_all_reminders();
      $this->view('reminders/index', ['reminders' => $list_of_reminders]);
     
    }

  public function create_reminder() {		

    // Get reminder from create_reminders form
    $new_reminder = $_REQUEST['reminder'];

    $reminder = $this->model('Reminder');
    $successful_reminder_creation= $reminder->create_reminder($new_reminder); 
    $this->view('reminders/create_reminder'); 
  }

  public function update_reminder() {
    // Checks if user either navigated to update_reminder OR submitted a form on update_reminder
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Connection to model
        $reminder = $this->model('Reminder');

      // User updated a new reminder and posted to server
        if (isset($_POST['update_reminder_button']) && isset ($_POST['update_reminder']) && isset($_POST['id'])) {
          // Save reminder ID and the text that was posted to the form
          $reminder_id = $_POST['id'];
          $update_reminder_text = $_POST['update_reminder'];

          // Use model function to update reminder
          $successful_update = $reminder-> update_reminder_text($reminder_id, $update_reminder_text);
          // Unset reminder_information saved when user clicked updatee & redirect back
          if ($successful_update) {
            unset( $_SESSION['reminder_information']);
            header('location: /reminders/index');
            exit();
          } else {
            //TODO: add error message using this variable and style it
            $this ->view('reminders/update_reminder', ['error' => 'Failed to update reminder.']);
          }

          // Triggered when user clicks update reminder button on index page, saves the id of the reminder to be updated
        } else {
          if (isset($_POST['id'])) {
            $reminder_information = $reminder ->get_reminder_by_id($_POST['id']);
            // Session variable to be used in update_reminder.php to get id and specific reminder info
            $_SESSION['reminder_information'] = $reminder_information;
            // Populates screen with the pre-updated reminder info
            $this->view('reminders/update_reminder', ['reminder_information' => $reminder_information]);
          }
          else {
            // Redirect back to index if id not set, accounts for any bugs
            header('location: /reminders/index');
            exit();
          }
        }
          
        } else {
      // request not post, redirects to prevent any blank screens
          header('Location: /reminders/index');
          exit();
        }      
    }
    public function delete_reminder() {

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['id'])) {
         $reminder = $this->model('Reminder');

          $successful_deletion = $reminder->delete_reminder($_POST['id']);

          
          if ($successful_deletion) {
            $_SESSION['successful_deletion'] = true;
            // Repass all the reminders after deleting a reminder
            $this->view('reminders/index', [ 'reminders' => $reminder->get_all_reminders()]);
                        
            // Don't know why I can't get this passed into view, always turns out undefined -> need to resort to session variables as a result
                                            // 'successful_deletion_msg' => true]);
            exit();
          }
      
        
      }
    }

  public function complete_reminder() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

       $reminder = $this->model('Reminder');


      //  Mark as completed (check)
      if (isset ($_POST['id']) && $_POST['completed'] == true) {
      
          $successful_completion = $reminder->complete_reminder($_POST['id']);
  
          if ($successful_completion) {
            
            // Repass all the reminders after deleting a reminder
            $this->view('reminders/index', [ 'reminders' => $reminder->get_all_reminders()]);
            
          }
  
        // Mark as uncompleted (uncheck)
      } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['id']) && $_POST['completed'] == false) {
        $successful_uncompletion = $reminder->uncomplete_reminder($_POST['id']);
  
          if ($successful_uncompletion) {
    
            // Repass all the reminders after deleting a reminder
            $this->view('reminders/index', [ 'reminders' => $reminder->get_all_reminders()]);
            
          }
      exit();
      }
    }
  }
}