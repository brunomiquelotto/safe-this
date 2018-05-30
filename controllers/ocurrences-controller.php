<?php 

class OcurrencesController extends MainController {

    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('PrioritiesModel');
        $this->load_model('OcurrencesModel');
        $this->load_model('OcurrenceUpdateModel');
        $this->load_model('OcurrenceStatusModel');
        $this->load_model('OcurrenceStatusFlowModel');
        $this->load_model('OcurrencePriorityModel');
        $this->load_model('OcurrenceFileModel');
        $this->load_model('PlaceModel');
        $this->load_model('VwOcurrencesModel');
        $this->load_model('VwOcurrencesUpdateModel');
        $this->load_model('UserModel');
    }

    public function index() {
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $this->model->limit = 10;
        if ($parameters) {
            $this->model->limit = $parameters[0];
        }
        $this->title = 'Registro de Ocorrências';
        $this->model->update_url = HOME_URI . '/ocurrences/update/';
        $this->model->visualize_url = HOME_URI . '/ocurrences/view/';

        $this->model->ocurrences = VwOcurrencesUpdateModel::stmt_limit('',$this->model->limit);



        if(isset($_POST['btnFiltro']) && isset($_POST['txtChoose']))
        {
            $choose = $_POST['txtChoose'];

            switch ($_POST['Choose']) {
                case 1:
                if(is_numeric($choose)){
                    $this->model->ocurrences = VwOcurrencesUpdateModel::where('Id = '. $choose);
                }                
                break;
                case 2:
                $this->model->ocurrences = VwOcurrencesUpdateModel::where("Place LIKE '%".$choose."%'");
                break;
                case 3:
                $this->model->ocurrences = VwOcurrencesUpdateModel::where("Status LIKE '%".$choose."%'");
                break;
                case 4:
                $this->model->ocurrences = VwOcurrencesUpdateModel::where("Priority LIKE '%".$choose."%'");
                break;
            }
        }

        $this->load_page('ocurrences/index.php');
    }

    public function view() {
        $this->title = 'Visualizar ocorrencia';
        $parameters = (func_num_args() >= 1) ? func_get_arg(0) : array();
        if (!$parameters || !$parameters[0]) {
            $this->goto_page(HOME_URI . '/ocurrences/');
        }
        
        $id = $parameters[0];
        $this->model->ocurrence = OcurrencesModel::find($id);
        $this->model->updates = OcurrenceUpdateModel::where('Ocurrence_Id = '. $id );
        
        if (!$this->model->ocurrence) {
            $this->throw_404();
        }
        $ocurrenceStatus = end($this->model->updates)['Ocurrence_Status_Id'];
        $this->model->actions = $this->fill_actions($ocurrenceStatus);
        $this->model->ocurrence['Priority'] = $this->fill_priority($this->model->ocurrence['Ocurrence_Priority_Id']);
        $this->model->ocurrence['Place'] = $this->fill_place($this->model->ocurrence['Sector_Id']);
        $this->model->ocurrence['Pictures'] = $this->fill_pictures($this->model->ocurrence['Ocurrence_Id']);
        $this->model->updates = OcurrenceUpdateModel::Where("Ocurrence_Id = ".$id);
        $this->model->priorities = OcurrencePriorityModel::all();
        $this->model->users = UserModel::all();
        $this->model->status = OcurrenceStatusModel::all();
        
      
        $this->load_page('ocurrences/view.php');
    }

    public function create() {
        $this->title = "Nova Ocorrência";
        $this->model->places = VwSectorListInfoModel::all();
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
            "Ocurrence_Status_Id" => OcurrenceStatusModel::Statuses()->Waiting,
            'Ocurrence_Priority_Id' => $data['Ocurrence_Priority_Id']
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
        $this->set_message('Ocorrência registrada com sucesso', 'success');
        $this->goto_page(HOME_URI . '/ocurrences');
    }

    public function update() {
        $this->ensure_is_logged();
        
        $parameters = (func_num_args() >= 1) ? func_get_arg(0) : array();
        if (!$parameters || !$parameters[0] || !$parameters[1]) {
            $this->goto_page(HOME_URI . '/ocurrences/');
        }
        $ocurrenceId = $parameters[0];
        $statusId = $parameters[1];

        $this->model->priorities = PrioritiesModel::all();
        $ocurrence =  OcurrencesModel::find($ocurrenceId);
        if (!$ocurrence) {
            $this->throw_404();
        }
        $this->model->ocurrence = $ocurrence;
        $this->model->statusTransition = OcurrenceStatusFlowModel::find($statusId);
        if (!$this->model->statusTransition) {
            $this->throw_404();
        }

        $this->model->updates = OcurrenceUpdateModel::where('Ocurrence_Id = '. $ocurrenceId);
        $this->currentStatus = end($this->model->updates);
        $this->model->users = UserModel::all();

        $this->model->update = array(
            'Status_Feedback' => $this->model->statusTransition['Default_Message'],
            'Responsible' => $this->currentStatus['Responsible'],
            'Priority' => $this->currentStatus['Ocurrence_Priority_Id'],
            'Next_Status' => $this->model->statusTransition['Next_Status']
        );

        $this->title = 'Atualizando a ocorrencia';
        $this->load_page('ocurrences/update.php');
    }

    public function UpdateStatus() {
        $this->ensure_is_logged();
        
        $parameters = (func_num_args() >= 1) ? func_get_arg(0) : array();
        if (!$parameters || !$parameters[0]) {
            $this->goto_page(HOME_URI . '/ocurrences/');
        }
        $ocurrenceId = $parameters[0];
        $ocurrence = OcurrencesModel::find($ocurrenceId);
        if (!$ocurrence) {
            $this->throw_404();
        }
        $data = $_POST;
        $data['Ocurrence_Id'] = $ocurrenceId;
        $updateStatus = new OcurrenceUpdateModel($data);
        $updateStatusResult = $updateStatus->save();
        $dirToSavePics = UP_ABSPATH . '/' . $ocurrenceId;
        $this->create_dir_if_no_exists($dirToSavePics);
        for ($i = 0; $i < count($_FILES['Image']['name']); $i++) {
            $this->save_file($updateStatusResult->id, $_FILES['Image']['name'][$i], $_FILES['Image']['tmp_name'][$i], $dirToSavePics, "Imagem inserida pelo moderador");
        }
        $this->set_message('Ocorrência atualizada', 'success');
        $this->goto_page(HOME_URI . '/ocurrences/view/' . $ocurrenceId);
    }

    private function fill_actions($current_status) {
        $results = OcurrenceStatusFlowModel::where('Current_Status = '. $current_status);
        if (!$results) {
            return array();
        }
        $url = HOME_URI . '/ocurrences/Update/' . $this->model->ocurrence['Ocurrence_Id'] . '/';
        for($i = 0; $i < count($results); $i++) {
            $results[$i]["Url"] = $url . $results[$i]['OcurrenceStatusFlowId'];
        }
        return $results;
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
    private function fill_status($id) {
        $status = OcurrenceStatusModel::find($id);
        if (!$status) {
            return "";
        }
        return $status['Description'];
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
        $pictures = array();
        foreach($files as $file) {
            $pictures[] = array(
                'src' => HOME_URI . '/views/_uploads/' . $id . '/' . $file['FileName'],
                'title' => $file['Title']
            );
        }

        return $pictures;
    }

    private function save_file($ocurrenceUpdateId, $fileName, $filePath, $dir, $text = "Imagem inserida pelo Relator") {
        $uniq = uniqid();
        $exploded = explode('.', $fileName);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' . $extension;
        $upload_file = $dir . '/'. $uploadFileName;
        if (!move_uploaded_file($filePath, $upload_file)) return;
        $fileData = array(
            'Title' => $text,
            'FileName' => $uploadFileName,
            'Ocurrence_Update_Id' => $ocurrenceUpdateId
        );
        $file = new OcurrenceFileModel($fileData);
        $file->save();
    }
}


?>