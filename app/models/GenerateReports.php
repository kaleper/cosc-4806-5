<?php

class GenerateReports {

    public function __construct() {

    }

    public function get_all_reports () {
      $db = db_connect();
      // Selects reminders only associated with logged in user
      $statement = $db->prepare("SELECT * from notes");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }
}