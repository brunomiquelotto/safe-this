<?php

class ReportsController extends MainController {

    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('VwOcurrencesModel');
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
        $this->model->showResults = VwOcurrencesModel::whereGroupByIndex();
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
            if(!empty($_POST['Sector_Id']))
                $query =  "Place_Id = '".$_POST['Sector_Id']."'";

            if ($query){ 
                $this->model->showResults = VwOcurrencesModel::whereGroupBy($query); 
            }else{
                $this->model->showResults = VwOcurrencesModel::whereGroupByIndex();
            }   
            $this->load_page('reports/index.php');
        }
    }

} 


?>