<?php

class Reminder {


    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      // Selects reminders only associated with logged in user
      $statement = $db->prepare("SELECT * from notes WHERE user_id = :userid");
      $statement->bindParam(':userid', $_SESSION['userid']);
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function create_reminder ($new_reminder) {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $db = db_connect();
          // var_dump($_SESSION['userid']);
          $statement = $db->prepare("INSERT INTO notes(subject, user_id) VALUES (:subject, :userid)");
          $statement->bindParam(':subject', $new_reminder);
          $statement->bindParam(':userid', $_SESSION['userid']);
          $statement->execute();

         // Save session variable to show to user on view that it was created successfully
          $_SESSION['successful_reminder'] = "Reminder created successfully!";
          header('Location: /reminders/index');
          die;
       }
    }

        // Used to prepopulate reminder update form with existing reminder info
      public function get_reminder_by_id($reminder_id) {
           $db = db_connect();
           $statement = $db->prepare("SELECT * FROM notes WHERE id = :id");
           $statement->bindParam(':id', $reminder_id);
           $statement->execute();
           return $statement->fetch(PDO::FETCH_ASSOC);
       }

        // Triggered when user updates reminder (submits form on update_reminder.php)
      public function update_reminder_text($reminder_id, $update_reminder_text) {
          $db = db_connect();
          $statement = $db->prepare("UPDATE notes SET subject = :subject WHERE id = :id");
          $statement->bindParam(':subject', $update_reminder_text);
          $statement->bindParam(':id', $reminder_id);
          return $statement->execute();
      }


     public function delete_reminder($reminder_id) {
          $db = db_connect();
          $statement = $db->prepare("DELETE FROM notes WHERE id = :id");
          $statement->bindParam(':id', $reminder_id);
          return $statement->execute();
      }

    public function complete_reminder($reminder_id) {
          $db = db_connect();
          $statement = $db->prepare("UPDATE notes SET completed = true WHERE id = :id");
          $statement->bindParam(':id', $reminder_id);
          return $statement->execute();
      }

    public function uncomplete_reminder($reminder_id) {
          $db = db_connect();
          $statement = $db->prepare("UPDATE notes SET completed = false WHERE id = :id");
          $statement->bindParam(':id', $reminder_id);
          return $statement->execute();
      }
}
?>
