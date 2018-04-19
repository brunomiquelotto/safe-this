<?php 

class OcurrencesController extends MainController {

    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('PrioritiesModel');
        $this->load_model('OcurrencesModel');
        $this->load_model('OcurrenceUpdateModel');
        $this->load_model('OcurrenceStatusModel');
        $this->load_model('OcurrencePriorityModel');
        $this->load_model('OcurrenceFileModel');
        $this->load_model('PlaceModel');
        $this->load_model('VwOcurrencesModel');
    }

    public function index() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->model->limit = 10;
        if ($parameters) {
            $this->model->limit = $parameters[0];
        }
        $this->title = 'Registro de Ocorrências';
        $this->model->edit_url = HOME_URI . '/Ocurrences/Edit/';
        $this->model->visualize_url = HOME_URI . '/Ocurrences/View/';
        $this->model->ocurrences = VwOcurrencesModel::stmt_limit('Order By Opening_Date DESC', $this->model->limit);
        $this->load_page('ocurrences/index.php');
    }

    public function view() {
        $parameters = (func_num_args() >= 1) ? func_get_arg(0) : array();
        if (!$parameters || !$parameters[0]) {
            $this->goto_page(HOME_URI . '/ocurrences/');
        }
        
        $id = $parameters[0];
        $this->model->ocurrence = OcurrencesModel::find($id);
        
        if (!$this->model->ocurrence) {
            $this->throw_404();
        }

        $this->model->ocurrence['Priority'] = $this->fill_priority($this->model->ocurrence['Ocurrence_Priority_Id']);
        $this->model->ocurrence['Place'] = $this->fill_place($this->model->ocurrence['Sector_Id']);
        $this->model->ocurrence['Pictures'] = $this->fill_pictures($this->model->ocurrence['Ocurrence_Id']);

        // debug_variable($this->model->ocurrence);
        // exit; 
        $this->load_page('ocurrences/view.php');
    }

    private function fill_priority($id) {
        $priority = OcurrencePriorityModel::find($id);
        if (!$priority) {
            return "";
        }
        return $priority['Description'];
    }

    private function fill_place($id) {
        $place = PlaceModel::find($id);
        if (!$place) {
            return "";
        }
        return $place['Name'];
    }

    private function fill_pictures($id) {
        $updates = OcurrenceUpdateModel::where('Ocurrence_Id = ' . $id);

        if (!$updates) {
            return array();
        }
       
        $updateIds = "";

        foreach ($updates as $update) {
            $updateIds .= $update['Ocurrence_Update_Id'] . ',';
        }

        $updateIds = substr($updateIds, 0, strlen($updateIds) -1);
        if (!$updateIds) {
            return array();
        }
        $files = OcurrenceFileModel::where('Ocurrence_Update_Id IN ('. $updateIds .')');
        debug_variable('Ocurrence_Update_Id IN ('. $updateIds .')');
        $pictures = array();
        foreach($files as $file) {
            $pictures[] = array(
                'src' => HOME_URI . '/views/_uploads/' . $id . '/' . $file['FileName'],
                'title' => $file['Title']
            );
        }

        return $pictures;
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
        if (!$results->id) {
            $this->goto_page(HOME_URI . '/ocurrences/create');
        }

        $id = $results->id;
        $statusData = array(
            "Ocurrence_Id" => $id,
            "Status_Feedback" => "A ocorrência foi registrada",
            "Ocurrence_Status_Id" => OcurrenceStatusModel::Statuses()->Waiting
        );
        $initial_status = new OcurrenceUpdateModel($statusData);
        $initial_status_result = $initial_status->save();
        if (!$initial_status_result->id) {
          $this->goto_page(HOME_URI . '/ocurrences/create');
        }

        $dirToSavePics = UP_ABSPATH . '/' . $id;
        $this->create_dir_if_no_exists($dirToSavePics);
        for ($i = 0; $i < count($_FILES['Image']['name']); $i++) {
            $this->save_file($initial_status_result->id, $_FILES['Image']['name'][$i], $_FILES['Image']['tmp_name'][$i], $dirToSavePics);
        }
        $this->goto_page(HOME_URI . '/ocurrences');
    }

    private function save_file($ocurrenceUpdateId, $fileName, $filePath, $dir) {
        $uniq = uniqid();
        $exploded = explode('.', $fileName);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' .$extension;
        $upload_file = $dir . '/'. $uploadFileName;
        if (!move_uploaded_file($filePath, $upload_file)) return;
        $fileData = array(
            'Title' => 'Imagem inserida pelo relator',
            'FileName' => $uploadFileName,
            'Ocurrence_Update_Id' => $ocurrenceUpdateId
        );
        $file = new OcurrenceFileModel($fileData);
        $file->save();
    }

    public function edit() {
        $this->ensure_is_logged();

        $this->title = 'Editando a ocorrencia';
        $this->load_page('ocurrences/edit.php');
    }
}


?>