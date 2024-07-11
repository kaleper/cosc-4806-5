<?php

class GenerateReports {

    public function __construct() {

    }

    public function get_all_reports () {
      $db = db_connect();
      // Selects all reminders regardless of user logged in
      $statement = $db->prepare("SELECT * from notes");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get_all_logins () {
      $db = db_connect();
      // Selects all logins 
      $statement = $db->prepare("SELECT * from login_log");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get_reminders_past_week () {
      $db = db_connect();
      // Selects all reminders from the past 7 days
      $statement = $db->prepare(" SELECT * FROM notes WHERE created_at >= CURDATE() - INTERVAL 7 DAY ORDER BY created_at");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
}