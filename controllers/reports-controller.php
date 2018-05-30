<?php

class ReportsController extends MainController {

    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('VwOcurrencesModel');
        $this->load_model('VwOcurrencesUpdateModel');
        $this->load_model('OcurrenceStatusModel');
        $this->load_model('OcurrencesModel');
        $this->load_model('ShowResultsModel');
    }

    public function index() {
        $this->ensure_is_logged();
        $this->title = "Relatórios administrativos";
        $this->model = (object)array();
        $this->model->reports = VwSectorListInfoModel::all();
        $this->model->status = OcurrenceStatusModel::all();
        $this->model->showResults = VwOcurrencesUpdateModel::whereGroupByIndex();
        $this->load_page('reports/index.php');
    } 

    public function view() {
        $this->ensure_is_logged();
        $this->title = "Relatórios Administrativos";
        $this->model = (object)array();
        $this->model->reports = VwSectorListInfoModel::all();
        $this->model->status = OcurrenceStatusModel::all();

        if ($_POST){
            $query = null;
            if(!empty($_POST['Place']))
                $query =  "Place = '".$_POST['Place']."'";

            if ($query){ 
                $this->model->showResults = VwOcurrencesUpdateModel::whereGroupBy($query); 
            }else{
                $this->model->showResults = VwOcurrencesUpdateModel::whereGroupByIndex();
            }   
            $this->load_page('reports/index.php');
        }
    }

} 


?>