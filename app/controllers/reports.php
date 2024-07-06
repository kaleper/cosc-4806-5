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
    $reports = $this->model('GenerateReports');
    $report_list = $reports->get_all_reports();



    $this->view('reports/overview', ['reports' =>$report_list]);
  }
}

