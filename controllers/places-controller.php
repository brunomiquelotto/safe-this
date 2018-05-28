<?php

class PlacesController extends MainController {
    public $use_permission_system = false;

    public function __construct() {
        parent::__construct();
        $this->load_model('VwSectorListInfoModel');
        $this->load_model('PlaceModel');
        $this->load_model('PlaceFileModel');
    }

    public function index() {
        $this->ensure_is_logged();
        $this->title = 'Lugares';
        $this->model->places = VwSectorListInfoModel::all();
        $this->load_page('places/index.php');
    }

    public function create() {
        $this->ensure_is_logged();
        $this->load_page('places/create.php');
    }

    public function save() {
        $this->ensure_is_logged();
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        $data = $_POST;
        if ($id) {
            $data['Sector_Id'] = $id;
            $this->update($data);
        } else {
            $this->insert($data);
        }
        $this->set_message('Salvo com sucesso', 'success');
        $this->goto_page(HOME_URI . '/places/index');
    }

    private function insert($data) {
        $sector = new PlaceModel($data);
        $results = $sector->save();
        if (!$results) {
            $this->set_message('Falha ao salvar', 'error');
            return;
        }
        $this->save_files($results->id);
    }

    private function update($data) {
        $sector = new PlaceModel($data);
        $results = $sector->save();
        if (!$results){
            $this->set_message('Falha ao salvar', 'error');
        }
            return;
        if (!$_FILES['Image']) return;

        $files = PlaceFileModel::where('Sector_Id = ' . $data['Sector_Id']);
        foreach($files as $file) {
            $fileName = UP_ABSPATH . '/' . $file['FileName'];
            if(!file_exists($fileName)) continue;
            unlink($fileName);
        }
        PlaceFileModel::delete_where('Sector_Id = ?', array($data['Sector_Id']));
        $this->save_files($data['Sector_Id']);
    }

    private function save_files($id) {
        $uniq = uniqid();
        $exploded = explode('.', $_FILES['Image']['name']);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' .$extension;
        $upload_file = UP_ABSPATH . '/'. $uploadFileName;
        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $upload_file)) return;
        $sector_id = $id;
        $fileData = array(
            'Title' => 'Imagem do Setor',
            'FileName' => $uploadFileName,
            'Sector_Id' => $sector_id
        );
        $file = new PlaceFileModel($fileData);
        $file->save();
    }

    public function delete() {
        $this->ensure_is_logged();
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        if (!$id) {
            $this->throw_404();
            exit;
        }
        $files = PlaceFileModel::where('Sector_Id = ' . $id);
        foreach($files as $file) {
            unlink(UP_ABSPATH . '/' . $file['FileName']);
        }
        PlaceFileModel::delete_where('Sector_Id = ?', array($id));
        PlaceModel::delete($id);
        $this->set_message('Local Deletado', 'warning');
        $this->goto_page(HOME_URI. '/places/index');
    }

    public function edit() {
        $this->ensure_is_logged();
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        
        if (!$id) {
            $this->throw_404();
            exit;
        }
        
        $place = PlaceModel::find($id);
        
        if (!$place) {
            $this->throw_404();
            exit;
        }

        $placeFile = PlaceFileModel::where('Sector_Id = ' . $place['Sector_Id']);
        if ($placeFile) {
            $placeFile = $placeFile[0];
            $placeFile['Source'] = HOME_URI . '/views/_uploads/' . $placeFile['FileName'];
            $place['Image'] = $placeFile;
        }
        $this->model->place = $place;
        $this->title = 'Editando Local';
        $this->load_page('places/edit.php');
    }
}