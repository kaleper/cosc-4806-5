<?php

class Reports extends Controller {

  public function index() {		
    $this->view('reports/index');
    
  }

  public function viewReminders() {
    $reports = $this->model('GenerateReports');
    $report_list = $reports->get_all_reports();

   
    
    $this->view('reports/viewReminders', ['reports' =>$report_list]);
  }

  public function overview() {

    $this->view('reports/overview');
  }

  public function viewLogins() {
    $reports = $this->model('GenerateReports');
    $report_list = $reports->get_all_logins();
 
    $this->view('reports/viewLogins', ['logins' => $report_list]);
  }
}

