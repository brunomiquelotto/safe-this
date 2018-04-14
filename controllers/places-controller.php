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
        $uniq = uniqid();
        $exploded = explode('.', $_FILES['Image']['name']);
        $extension = $exploded[count($exploded) - 1];
        $uploadFileName = $uniq . '.' .$extension;
        $upload_file = UP_ABSPATH . '/'. $uploadFileName;
        if (!move_uploaded_file($_FILES['Image']['tmp_name'], $upload_file)) {
            $this->goto_page(HOME_URI . '/places/create');
            exit;
        }
        if ($id) {
            $data['Sector_Id'] = $id;
        }
        $sector = new PlaceModel($data);
        $results = $sector->save();
        if ($results) {
            $sector_id = $results->id;
            $fileData = array(
                'Title' => 'Imagem do Setor',
                'FileName' => $uploadFileName,
                'Sector_Id' => $sector_id
            );
            $file = new PlaceFileModel($fileData);
            $file->save();
        }
        $this->goto_page(HOME_URI . '/places/index');
    }

    public function delete() {
        $this->ensure_is_logged();
        $parameters = (func_num_args() >= 1 ) ? func_get_arg(0) : array();
        $id = $parameters[0];
        if (!$id) {
            $this->throw_404();
            exit;
        }
        PlaceFileModel::delete_where('Sector_Id = ?', array($id));
        PlaceModel::delete($id);
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