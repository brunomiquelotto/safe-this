<?php

class ReportsController extends MainController {
    
    public function index() {
        $this->ensure_is_logged();
        $this->title = "Relatórios administrativos";
        $this->model = (object)array();
        $this->model->showResults = false;
        $this->load_page('reports/index.php');
    }

    public function view() {
        $this->ensure_is_logged();
        $this->title = "Relatórios Administrativos";
        $this->model = (object)array();
        $this->model->showResults = true;
        $this->load_page('reports/index.php');
    }
}

?>