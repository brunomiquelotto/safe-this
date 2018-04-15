<?php 

class OcurrencesController extends MainController {
    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('OcurrencesModel');
        $this->load_model('PrioritiesModel');
        $this->load_model('OcurrenceUpdateModel');
        $this->load_model('OcurrenceStatusModel');
    }

    public function index() {
        $this->title = 'Registro de Ocorrências';
        $this->model->ocurrences = OcurrencesModel::all();
        $this->load_page('ocurrences/index.php');
    }

    public function create() {
        $this->title = "Nova Ocorrência";
        $this->model->ocurrences = VwSectorListInfoModel::all();
        $this->model->priorities = PrioritiesModel::all();
        $this->load_page('ocurrences/create.php');
    }

    public function save() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $data = $_POST;
        $id = $parameters[0];
        if ($id) { 
            $data['Ocurrence_Id'] = $id;
        }
        if (!OcurrencesModel::has_required_fields($data)) {
            $this->goto_page(HOME_URI . '/ocurrences/create');
        }
        $ocurrence = new OcurrencesModel($data);
        $results = $ocurrence->save();
        if ($results->id) {
            $id = $results->id;
            $statusData = array(
                "Ocurrence_Id" => $id,
                "Status_Feedback" => "A ocorrência foi registrada",
                "Ocurrence_Status_Id" => OcurrenceStatusModel::Statuses()->Waiting
            );
            $initial_status = new OcurrenceUpdateModel($statusData);
            $initial_status->save();
        }
        exit;
        $this->goto_page(HOME_URI . '/ocurrences/index');
    }
}


?>