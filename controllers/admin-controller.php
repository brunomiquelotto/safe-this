<?php

class AdminController extends MainController
{
    public $use_permission_system = true;

    public function __construct() {
        parent::__construct();
        $this->load_model('OcurrencesModel');
        $this->load_model('UserModel');
        $this->load_model('PlaceModel');
        $this->load_model('VwOcurrencesModel');
    }

    public function index() {
        $this->ensure_is_logged();
        $this->title = 'Admin Panel';
        $this->model->ocurrences = OcurrencesModel::where('Closing_Date IS NULL');
        $this->model->users = UserModel::all();
        $this->model->places = PlaceModel::all();
        $this->model->ocurrencesInfo = VwOcurrencesModel::orderByWithLimit('Opening_Date','DESC', 5);
        $this->model->ocurrences = count($this->model->ocurrences);
        $this->model->places = count($this->model->places);
        $this->model->users = count($this->model->users);
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->load_page('admin/index.php');
    }
}